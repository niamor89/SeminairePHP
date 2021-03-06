<?php
/**
 * Simple server class which manage WebSocket protocols
 * @author Sann-Remy Chea <http://srchea.com>
 * @license This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * @version 0.1
 */
class Server {
	
	/**
	 * The address of the server
	 * @var String
	 */
	private $address;
	
	/**
	 * The port for the master socket
	 * @var int
	 */
	private $port;
	
	/**
	 * The master socket
	 * @var Resource
	 */
	private $master;
	
	/**
	 * The array of sockets (1 socket = 1 client)
	 * @var Array of resource
	 */
	private $sockets;
	
	/**
	 * The array of connected clients
	 * @var Array of clients
	 */
	private $clients;
	
	/**
	 * If true, the server will print messages to the terminal
	 * @var Boolean
	 */
	private $verboseMode;
	
	/**
	 * Numéro de la session/partie
	 * @var Boolean
	 */
	private $session;
	
	public $ressources;
	public $usedSprite;
	public $gotConnection;
	
	/**
	 * Server constructor
	 * @param $address The address IP or hostname of the server (default: 127.0.0.1).
	 * @param $port The port for the master socket (default: 5001)
	 */
	function Server($address = '127.0.0.1', $port = 5001, $verboseMode = false, $session) {
		$this->console("Server starting...");
		$this->address = $address;
		$this->port = $port;
		$this->verboseMode = $verboseMode;
		$this->session = $session;
		/***************** GAME ENV *******************/
		//RESSOURCES
		$this->ressources[] = new Ressource(1,8,8,array(13,31));
		$this->ressources[] = new Ressource(1,2,2,array(13,31));
		$this->ressources[] = new Ressource(1,4,10,array(13,31));
		$this->ressources[] = new Ressource(1,6,9,array(13,31));
		$this->ressources[] = new Ressource(2,15,4,array(16,15));
		$this->ressources[] = new Ressource(2,18,8,array(16,15));
		$this->ressources[] = new Ressource(2,20,10,array(16,15));
		$this->ressources[] = new Ressource(2,15,15,array(16,15));
		
		
		$this->usedSprite=0;
		$this->gotConnection=0;
		/**********************************************/

		// socket creation
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);

		if (!is_resource($socket))
			$this->console("socket_create() failed: ".socket_strerror(socket_last_error()), true);

		if (!socket_bind($socket, $this->address, $this->port))
			$this->console("socket_bind() failed: ".socket_strerror(socket_last_error()), true);

		if(!socket_listen($socket, 20))
			$this->console("socket_listen() failed: ".socket_strerror(socket_last_error()), true);
		$this->master = $socket;
		$this->sockets = array($socket);
		$this->console("Server started on {$this->address}:{$this->port}");
	}

	/**
	 * Create a client object with its associated socket
	 * @param $socket
	 */
	private function connect($socket) {
		$this->console("Creating client...");
		$client = new Client(uniqid(), $socket);
		$this->clients[] = $client;
		$this->sockets[] = $socket;
		$this->console("Client #{$client->getId()} is successfully created!");
	}

	/**
	 * Do the handshaking between client and server
	 * @param $client
	 * @param $headers
	 */
	private function handshake($client, $headers) {
		$this->console("Getting client WebSocket version...");
		if(preg_match("/Sec-WebSocket-Version: (.*)\r\n/", $headers, $match))
			$version = $match[1];
		else {
			$this->console("The client doesn't support WebSocket");
			return false;
		}
		
		$this->console("Client WebSocket version is {$version}, (required: 13)");
		if($version == 13) {
			// Extract header variables
			$this->console("Getting headers...");
			if(preg_match("/GET (.*) HTTP/", $headers, $match))
				$root = $match[1];
			if(preg_match("/Host: (.*)\r\n/", $headers, $match))
				$host = $match[1];
			if(preg_match("/Origin: (.*)\r\n/", $headers, $match))
				$origin = $match[1];
			if(preg_match("/Sec-WebSocket-Key: (.*)\r\n/", $headers, $match))
				$key = $match[1];
			
			$this->console("Client headers are:");
			$this->console("\t- Root: ".$root);
			$this->console("\t- Host: ".$host);
			$this->console("\t- Origin: ".$origin);
			$this->console("\t- Sec-WebSocket-Key: ".$key);
			
			$this->console("Generating Sec-WebSocket-Accept key...");
			$acceptKey = $key.'258EAFA5-E914-47DA-95CA-C5AB0DC85B11';
			$acceptKey = base64_encode(sha1($acceptKey, true));

			$upgrade = "HTTP/1.1 101 Switching Protocols\r\n".
					   "Upgrade: websocket\r\n".
					   "Connection: Upgrade\r\n".
					   "Sec-WebSocket-Accept: $acceptKey".
					   "\r\n\r\n";
			
			$this->console("Sending this response to the client #{$client->getId()}:\r\n".$upgrade);
			socket_write($client->getSocket(), $upgrade);
			$client->setHandshake(true);
			$this->console("Handshake is successfully done!");
			return true;
		}
		else {
			$this->console("WebSocket version 13 required (the client supports version {$version})");
			return false;
		}
	}

	/**
	 * Disconnect a client and close the connection
	 * @param $socket
	 */
	private function disconnect($client) {
		$this->console("Disconnecting client #{$client->getId()}");
		
		foreach($this->clients as $cl)
		{
			$this->send($cl, array("CHARACTER_D",$client->character));
		}	
		$i = array_search($client, $this->clients);
		$j = array_search($client->getSocket(), $this->sockets);
		
		if($j >= 0) {
			array_splice($this->sockets, $j, 1);
			socket_close($client->getSocket());
			$this->console("Socket closed");
		}
		
		if($i >= 0)
			array_splice($this->clients, $i, 1);
		$this->console("Client #{$client->getId()} disconnected");
		
		if($this->gotConnection && count($this->clients)==0)
		{
			ExecSQL('DELETE FROM t_serveur WHERE pid_server='.getmypid());
			exit();
		}
	}

	/**
	 * Get the client associated with the socket
	 * @param $socket
	 * @return A client object if found, if not false
	 */
	private function getClientBySocket($socket) {
		foreach($this->clients as $client)
			if($client->getSocket() == $socket) {
				$this->console("Client found");
				return $client;
			}
		return false;
	}
	
	/**
	 * Do an action
	 * @param $client
	 * @param $action
	 */
	private function action($client, $action) {
		$action = json_decode($this->unmask($action));
		$this->console("Performing action: ".$action[0]);
		if($action[0] == 'PONG') {
			sleep(2);
			$this->send($client, array("PING"));
		}
		else if($action[0] == 'MAP') {
			$map = GetRow('SELECT url_carte FROM t_partie INNER JOIN t_carte ON t_partie.t_carte_id_carte=t_carte.id_carte WHERE id_partie='.$this->session.';');
			$this->console("Sending Map: ".$map['url_carte']);
			//$map=__DIR__.'\\maps\\'.$map['url_carte'];
			//$map = fread(fopen($map, "r"), filesize($map));
			$this->send($client, array("MAP",$map['url_carte']));
		}
		else if($action[0] == 'CHARACTER') {
			//$name = GetRow('SELECT psuedo_joueur FROM t_joueur WHERE 
			$c=new Character($client->getId());
			$c->Sprite=($this->usedSprite?20:21);
			$c->X=($this->usedSprite?5:6);
			$client->setCharacter($c);
			$this->console("Sending Character....");
			$this->send($client, array("CHARACTER",$client->getCharacter()));
			foreach($this->clients as $cl)
			{
				$this->send($client, array("CHARACTER_U",$cl->getCharacter()));
				$this->send($cl, array("CHARACTER_U",$c));
			}	
		}
		else if($action[0] == 'RES') {
			$this->console("Sending Ressources....");
			$this->send($client, array("RES",$this->ressources));
		}
		else if($action[0] == 'MOV') {
			$dir = ($action[1]=='LEFT'?4:($action[1]=='TOP'?1:($action[1]=='RIGHT'?2:($action[1]=='BOTTOM'?3:-1))));
			$c=$client->getCharacter();
			if(!$dir) $this->console("Invalide Move : ".$action[1]);
			else if(move($c,$dir)) {
				$this->console("Can Move : ".$action[1]);				
				foreach($this->clients as $cl)
				{
					$this->send($cl, array("CHARACTER_U",$c));
				}			
			}
			else $this->console("Can't Move : ".$action[1]);
		}
	}
	
	/**
	 * Run the server
	 */
	public function run() {
		$this->console("Start running...");	
		$this->console('PID : '.getmypid());
		$this->console('SESSION : '.$this->session);	
		// BEFORE RUNNING =============
		ExecSQL('DELETE FROM t_serveur WHERE pid_server='.getmypid().';');
		$this->console('ADD SERVER : '.InsertTable('t_serveur',array('pid_server'=>getmypid(),'T_Partie_id_Partie'=>$this->session)));
		$this->console(print_r(PDO_Err(true),true));
		// END OF BEFORE RUNNING =============
		while(true) {
			$changed_sockets = $this->sockets;
			@socket_select($changed_sockets, $write = NULL, $except = NULL, 1);
			foreach($changed_sockets as $socket) {
				if($socket == $this->master) {
					if(($acceptedSocket = socket_accept($this->master)) < 0) {
						$this->console("Socket error: ".socket_strerror(socket_last_error($acceptedSocket)));
					}
					else {
						$this->connect($acceptedSocket);
					}
				}
				else {
					$this->console("Finding the socket that associated to the client...");
					$client = $this->getClientBySocket($socket);
					if($client) {
						$this->console("Receiving data from the client");
						$bytes = @socket_recv($socket, $data, 2048, 0);
						$this->console("Header :-------------------\n$data\n------------------------------------------------");
						if(!$client->getHandshake()) {
							$this->console("Doing the handshake");
							if($this->handshake($client, $data)){
								/**************** CLIENT READY TO COMMUNICATE ****************/
								//Implementer vérification de la partie et des droits du client
								//Implementer vérification du admin et GOD_MODE
								$this->send($client, array("READY"));
								$this->usedSprite = ($this->usedSprite?0:1);
								$this->gotConnection=true;
								//$this->send($client, array("PING"));
								/**************************************************************/
								//$this->startProcess($client);
							}							
						}
						elseif($bytes === 0) {
							$this->disconnect($client);
						}
						else {
							// When received data from client
							$this->action($client, $data);
						}
					}
				}
			}
		}
	}
	
	/**
	 * Start a child process for pushing data
	 * @param unknown_type $client
	 */
	/*private function startProcess($client) {
		$this->console("Start a child process");

		while(1) {
			// push something to the client
			$seconds = rand(2, 5);
			$this->send($client, "I am waiting {$seconds} seconds");
			sleep($seconds);
		}

	}*/

	/**
	 * Send a text to client
	 * @param $client
	 * @param $text
	 */
	private function send($client, $text) {
		$text=json_encode($text);
		$this->console("Send '".$text."' to client #{$client->getId()}");
		$text = $this->encode($text);
		$length = strlen($text);
        
		while (true) {
			$sent = socket_write($client->getSocket(), $text,$length);
			if ($sent === false) {
				$this->console("Unable to write to client #{$client->getId()}'s socket");
				$this->disconnect($client);
				break;
			}

			// Check if the entire message has been sented
			//$this->console("Message sent part : ".$sent.'/'.$length);
			if ($sent < $length) {
				// If not sent the entire message.
				// Get the part of the message that has not yet been sented as message
				$text = substr($text, $sent);
				// Get the length of the not sented part
				$length -= $sent;
			} else {
				$this->console("Message sent : ".$text);
				break;
			}	
		}
	}

	/**
	 * Encode a text for sending to clients via ws://
	 * @param $text
	 */
	private function encode($text)
	{
		// 0x1 text frame (FIN + opcode)
		$b1 = 0x80 | (0x1 & 0x0f);
		$length = strlen($text);
		
		if($length <= 125)
			$header = pack('CC', $b1, $length);
		elseif($length > 125 && $length < 65536)
			$header = pack('CCn', $b1, 126, $length);
		elseif($length >= 65536)
			$header = pack('CCN', $b1, 127, $length);
		
		return $header.$text;
	}

	/**
	 * Unmask a received payload
	 * @param $buffer
	 */
	private function unmask($payload) {
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
	 * Print a text to the terminal
	 * @param $text the text to display
	 * @param $exit if true, the process will exit 
	 */
	public function console($text, $exit = false) {
		$text = date('[Y-m-d H:i:s] ').$text."\r\n";
		if($exit)
			die($text);
		if($this->verboseMode)
			echo $text;
	}
}

?>
