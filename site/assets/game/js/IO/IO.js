(function (SC) {
	SC.IO = {}; // Namespace IO
	/*
		var ws, url = 'ws://127.0.0.1:5001';

		window.onbeforeunload = function() {
			ws.send('quit');
		};

		function write(text) {
			var date = new Date();
			var dateText = '['+date.getFullYear()+'-'+(date.getMonth()+1 > 9 ? date.getMonth()+1 : '0'+date.getMonth()+1)+'-'+(date.getDate() > 9 ? date.getDate() : '0'+date.getDate())+' '+(date.getHours() > 9 ? date.getHours() : '0'+date.getHours())+':'+(date.getMinutes() > 9 ? date.getMinutes() : '0'+date.getMinutes())+':'+(date.getSeconds() > 9 ? date.getSeconds() : '0'+date.getSeconds())+']';
			var terminal = document.getElementById('terminal');
			terminal.innerHTML = '<li>'+dateText+' '+text+'</li>'+terminal.innerHTML;
		}
		
		try {
			ws = new WebSocket(url);
			write('Connecting... (readyState '+ws.readyState+')');
			ws.onopen = function(msg) {
				write('Connection successfully opened (readyState ' + this.readyState+')');
			};
			ws.onmessage = function(msg) {
				write('Server says: '+msg.data);
			};
			ws.onclose = function(msg) {
				if(this.readyState == 2)
					write('Closing... The connection is going throught the closing handshake (readyState '+this.readyState+')');
				else if(this.readyState == 3)
					write('Connection closed... The connection has been closed or could not be opened (readyState '+this.readyState+')');
				else
					write('Connection closed... (unhandled readyState '+this.readyState+')');
			};
			ws.onerror = function(event) {
				terminal.innerHTML = '<li style="color: red;">'+event.data+'</li>'+terminal.innerHTML;
			};
		}
		catch(exception) {
			write(exception);
		}
	*/
})(SC);