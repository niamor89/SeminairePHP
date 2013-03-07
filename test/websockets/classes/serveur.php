#!/php -q
<?php  /*  >php -q server.php */
ini_set('default_socket_timeout', 10);
include_once('WebSocketHandshake.class.php');

error_reporting(E_ALL);
set_time_limit(0);
ob_implicit_flush();

$master  = WebSocket('localhost',11345);
$sockets = array($master);
$users   = array();
$debug   = true;

while(true){
	$changed = $sockets;
	$expect = $sockets;
	socket_select($changed,$write=NULL,$expect,0,1000000);

	foreach($changed as $socket){
		if($socket==$master){
			$client=socket_accept($master);
			if($client<0){ console("socket_accept() failed"); continue; }
			else{
				socket_set_option($client,SOL_SOCKET, SO_KEEPALIVE, 1) or die('Can not set keepalive');
				connect($client);
			}
		}
		else{
			$bytes = @socket_recv($socket,$buffer,2048,0);
			if($bytes==0){ disconnect($socket); }
			else{
				$user = getuserbysocket($socket);
				if(!$user->handshake){ dohandshake($user,$buffer); }
				else{ process($user,$buffer); }
			}
		}
	}
}

//---------------------------------------------------------------

/**
 * Unmask a received payload
 * @param $payload
 */
function unmask($payload) {
    $length = ord($payload[1]) & 127;
 
    if($length == 126) {
        $masks = substr($payload, 4, 4);
        $data = substr($payload, 8);
    }
    elseif($length == 127) {
        $masks = substr($payload, 10, 4);
        $data = substr($payload, 14);
    }
    else {
        $masks = substr($payload, 2, 4);
        $data = substr($payload, 6);
    }
 
    $text = '';
    for ($i = 0; $i < strlen($data); ++$i) {
        $text .= $data[$i] ^ $masks[$i%4];
    }
    return $text;
}

/**
 * Encode a text for sending to clients via ws://
 * @param $text
 */
function encode($text) {
    // 0x1 text frame (FIN + opcode)
    $b1 = 0x80 | (0x1 & 0x0f);
    $length = strlen($text);
 
    if($length > 125 && $length < 65536)
        $header = pack('CCS', $b1, 126, $length);
    elseif($length >= 65536)
        $header = pack('CCN', $b1, 127, $length);
	
    return $header.$text;
}

function process($from,$msg){
	console("< ".$from->label." (".$from->userId.") : \n\t".$msg);


	$msg = unwrap($msg);
	$msg = json_decode($msg,true);

	switch($msg['action']){
		case "ctrl/chat/out"  		  : onCtrlChatOut($from,  $msg['msg']); 		 break;

		default                 	  : onActionError($from, $msg);				 	 break;
	}

}

function send($to,$msg){
	say('> '.$to->label.' ('.$to->userId.") :\n\t".$msg);
	$msg = wrap($msg);
	return socket_write($to->socket,$msg,strlen($msg));
}

function broadcast($msg, $excludeUser=''){
	say(">> ");
	global $users;

	foreach($users as $user){
		if($excludeUser){
			if($user->id!=$excludeUser->id) send($user, $msg);
		}else 							    send($user, $msg);
	}
}

function WebSocket($address,$port){
	$master=socket_create(AF_INET, SOCK_STREAM, SOL_TCP)     or die("socket_create() failed");
	socket_set_option($master, SOL_SOCKET, SO_REUSEADDR, 1)  or die("socket_option() failed");
	socket_bind($master, $address, $port)                    or die("socket_bind() failed");
	socket_listen($master,20)                                or die("socket_listen() failed");
	echo "Server Started : ".date('Y-m-d H:i:s')."\n";
	echo "Master socket  : ".$master."\n";
	echo "Listening on   : ".$address." port ".$port."\n\n";
	return $master;
}

function connect($socket){
	global $sockets,$users;
	$user = new User();
	$user->id = uniqid();
	$user->socket = $socket;
	array_push($users,$user);
	array_push($sockets,$socket);
	console($socket." CONNECTED!");
}

function disconnect($socket){
	global $sockets,$users;
	$found=null;
	$n=count($users);
	for($i=0;$i<$n;$i++){
		if($users[$i]->socket==$socket){ $found=$i; break; }
	}
	if(!is_null($found)){ array_splice($users,$found,1); }
	$index = array_search($socket,$sockets);
	socket_close($socket);
	console($socket." DISCONNECTED!");
	if($index>=0){ array_splice($sockets,$index,1); }
}

function dohandshake($user,$buffer){
	console("\nRequesting handshake...");
	console($buffer);
	list($resource,$host,$origin) = getheaders($buffer);
	console("Handshaking...");

	$handshake = WebSocketHandshake($buffer);
	socket_write($user->socket,$handshake,strlen($handshake));

	$user->handshake=true;
	console($handshake);
	console("Done handshaking...");
	return true;
}

function getheaders($req){
	$r=$h=$o=null;
	if(preg_match("/GET (.*) HTTP/"   ,$req,$match)){ $r=$match[1]; }
	if(preg_match("/Host: (.*)\r\n/"  ,$req,$match)){ $h=$match[1]; }
	if(preg_match("/Origin: (.*)\r\n/",$req,$match)){ $o=$match[1]; }
	return array($r,$h,$o);
}

function getuserbysocket($socket){
	global $users;
	$found=null;
	foreach($users as $user){
		if($user->socket==$socket){ $found=$user; break; }
	}
	return $found;
}


/**
 * 		Processing functions from javascript
 */


function onCtrlChatOut($from, $msg){
	$msg = json_decode($msg);
	if($msg->message==='demo.stop'){
		$msg->message='WebSockets server is going down...';
		broadcast('{"action": "ws/chat/in", "msg":'.json_encode($msg).'}');
		die();
	}
	broadcast('{"action": "ws/chat/in", "msg":'.json_encode($msg).'}');
}

function onActionError($client, $msg){
	send($client, '{"action":"error", "msg":"'.$msg.'"}');
}
/**
 * 		Usefull functions
 */

function     say($msg=""){ echo $msg."\n"; }
function    wrap($msg=""){ return chr(0).$msg.chr(255); }
function  unwrap($msg=""){ return substr($msg,1,strlen($msg)-2); }
function console($msg=""){ global $debug; if($debug){ echo $msg."\n"; } }

class User{
	var $id;
	var $socket;
	var $handshake;
	var $userId=null;   // From GUI
}



?>