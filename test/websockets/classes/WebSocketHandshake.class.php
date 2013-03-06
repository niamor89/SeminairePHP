<?php

class WebSocketHandshake {

    private $__value__;

    public function __construct($buffer) {
        $resource = $host = $origin = $key1 = $key2 = $protocol = $code = $handshake = null;
        preg_match('#GET (.*?) HTTP#', $buffer, $match) && $resource = $match[1];
        preg_match("#Host: (.*?)\r\n#", $buffer, $match) && $host = $match[1];
        preg_match("#Sec-WebSocket-Key1: (.*?)\r\n#", $buffer, $match) && $key1 = $match[1];
        preg_match("#Sec-WebSocket-Key2: (.*?)\r\n#", $buffer, $match) && $key2 = $match[1];
        preg_match("#Sec-WebSocket-Protocol: (.*?)\r\n#", $buffer, $match) && $protocol = $match[1];
        preg_match("#Origin: (.*?)\r\n#", $buffer, $match) && $origin = $match[1];
        preg_match("#\r\n(.*?)\$#", $buffer, $match) && $code = $match[1];
		/*$accept_key = $key1 . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11';
		$accept_key = sha1($accept_key, true);
		$accept_key = base64_encode($accept_key);*/
        $this->__value__ =
            "HTTP/1.1 101 WebSocket Protocol Handshake\r\n".
            "Upgrade: WebSocket\r\n".
            "Connection: Upgrade\r\n".
            "Sec-WebSocket-Origin: {$origin}\r\n".
			"Sec-WebSocket-Accept: $accept_key \r\n".
            "Sec-WebSocket-Location: ws://{$host}{$resource}\r\n".
            ($protocol ? "Sec-WebSocket-Protocol: {$protocol}\r\n" : "").
            "\r\n".
            $this->_createHandshakeThingy($key1, $key2, $code)
        ;
    }	

    public function __toString() {
        return $this->__value__;
    }
    
    private function _doStuffToObtainAnInt32($key) {
        return preg_match_all('#[0-9]#', $key, $number) && preg_match_all('# #', $key, $space) ?
            implode('', $number[0]) / count($space[0]) :
            ''
        ;
    }

    private function _createHandshakeThingy($key1, $key2, $code) {
        return md5(
            pack('N', $this->_doStuffToObtainAnInt32($key1)).
            pack('N', $this->_doStuffToObtainAnInt32($key2)).
            $code,
            true
        );
    }
}

// handshake headers strings factory
function WebSocketHandshake($buffer) {
    return (string)new WebSocketHandshake($buffer);
}

?>