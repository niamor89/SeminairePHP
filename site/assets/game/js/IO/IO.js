(function (SC) {
	SC.IO = {}; // Namespace IO
	
	SC.IO.ws;
	SC.IO.url = 'ws://127.0.0.1:5001';
	
	
	window.onbeforeunload = function() {
		SC.IO.ws.send('exit');
	};

	SC.IO.debug = function (text) {
		var date = new Date();
		var dateText = '['+date.getFullYear()+'-'+(date.getMonth()+1 > 9 ? date.getMonth()+1 : '0'+date.getMonth()+1)+'-'+(date.getDate() > 9 ? date.getDate() : '0'+date.getDate())+' '+(date.getHours() > 9 ? date.getHours() : '0'+date.getHours())+':'+(date.getMinutes() > 9 ? date.getMinutes() : '0'+date.getMinutes())+':'+(date.getSeconds() > 9 ? date.getSeconds() : '0'+date.getSeconds())+']';
		
		SC.IO.terminal.innerHTML = dateText+': '+text+'<br/>'+SC.IO.terminal.innerHTML;
	}
	
	SC.IO.init = function () {
		try {
			SC.IO.ws = new WebSocket(SC.IO.url);
			SC.IO.debug('Connecting... (readyState '+SC.IO.ws.readyState+')');
			SC.IO.ws.write = function (data) {
				SC.IO.debug('C:'+JSON.stringify(data));
				SC.IO.ws.send(JSON.stringify(data));
			}
			SC.IO.ws.onopen = function(msg) {
				SC.IO.debug('Connection successfully opened (readyState ' + this.readyState+')');
			};
			SC.IO.ws.onmessage = function(msg) {
				SC.IO.debug('S:'+msg.data);
				if(JSON.parse(msg.data)[0]=='PING') SC.IO.ws.write(['PONG']);
			};
			SC.IO.ws.onclose = function(msg) {
				if(this.readyState == 2)
					SC.IO.debug('Closing... The connection is going throught the closing handshake (readyState '+this.readyState+')');
				else if(this.readyState == 3)
					SC.IO.debug('Connection closed... The connection has been closed or could not be opened (readyState '+this.readyState+')');
				else
					SC.IO.debug('Connection closed... (unhandled readyState '+this.readyState+')');
			};
			SC.IO.ws.onerror = function(event) {
				SC.IO.terminal.innerHTML = '<li style="color: red;">'+event.data+'</li>'+SC.IO.terminal.innerHTML;
			};
		}
		catch(exception) {
			alert(exception);
		}
	}
	
	$(function () {
		SC.IO.terminal = document.getElementById('session_debug');
		SC.IO.init();
	});
})(SC);