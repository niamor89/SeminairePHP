var uId = '';
var button = document.getElementsByClassName('sii-chat-send')[0];
var messageInput = document.getElementsByName('sii-chat-message')[0];
var buttonUser = document.getElementsByClassName('sii-chat-login')[0];
var contentMessage = document.getElementsByClassName('sii-chat-content')[0];

var WebsocketClass = function(host){	
	this.socket = new WebSocket(host);
	this.console = document.getElementsByClassName('console')[0];
};
WebsocketClass.prototype = {
	initWebsocket : function(){
		var $this = this;
		this.socket.onopen = function(){
			$this.onOpenEvent(this);
		};
		this.socket.onmessage = function(e){
			$this._onMessageEvent(e);
		};
		this.socket.onclose = function(){
			$this._onCloseEvent();
		};
		this.socket.onerror = function(error){
			$this._onErrorEvent(error);
		};
		this.console.innerHTML = this.console.innerHTML + 'websocket init <br />';
	},
	_onErrorEvent :function(err){
		console.log(err);
		this.console.innerHTML = this.console.innerHTML + 'websocket error <br />';
	},
	onOpenEvent : function(socket){
		console.log('socket opened');
		this.console.innerHTML = this.console.innerHTML + 'socket opened Welcome - status ' + socket.readyState + '<br />';
	},
	_onMessageEvent : function(e){
		e = JSON.parse(e.data);
		
		if(e.msg.length > 0) e.msg = JSON.parse(e.msg);
		
		contentMessage.innerHTML = contentMessage.innerHTML 
			+ '&gt;<strong>' + e.msg.from + '</strong> : ' + e.msg.message + '<br />';
		contentMessage.scrollTop = contentMessage.scrollHeight;
		this.console.innerHTML = this.console.innerHTML + 'message event lanched <br />';
		this.console.scrollTop = this.console.scrollHeight;
	},
	_onCloseEvent : function(){
		console.log('connection closed');
		this.console.innerHTML = this.console.innerHTML + 'websocket closed - server not running<br />';
		uId = '';
		document.getElementsByName('sii-chat-name')[0].value = '';
		messageInput.disabled = 'disabled';
		button.disabled = 'disabled';
	},
	sendMessage : function(){
		var message = '{"from":"' + uId + '", "message":"' + messageInput.value + '"}';
		this.socket.send('{"action":"ctrl/chat/out", "msg":' + JSON.stringify(message) + '}');
		messageInput.value = '';
		this.console.innerHTML = this.console.innerHTML + 'websocket message send <br />';
		
	}
};
var socket = new WebsocketClass('ws://localhost:11345/serveur.php');
if(button.addEventListener){
	buttonUser.addEventListener('click', function(e){
		e.preventDefault();
		socket.initWebsocket();
		uId = document.getElementsByName('sii-chat-name')[0].value;
		messageInput.disabled = '';
		button.disabled = '';
		return false;
	}, true);
	button.addEventListener('click',function(e){
		e.preventDefault();
		socket.sendMessage();
		return false;
	}, true);
} else{
	console.log('votre navigateur n\'accepte pas le addevenlistener');
}
