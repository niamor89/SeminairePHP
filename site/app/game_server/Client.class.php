<?php
/**
 * Define a Client object
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
class Client {
	private $id;
	private $socket;
	private $handshake;
	public $character;
	
	function Client($id, $socket) {
		$this->id = $id;
		$this->socket = $socket;
		$this->handshake = false;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getSocket() {
		return $this->socket;
	}
	
	public function getHandshake() {
		return $this->handshake;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setSocket($socket) {
		$this->socket = $socket;
	}
	
	public function setHandshake($handshake) {
		$this->handshake = $handshake;
	}
	
	public function setPid($pid) {
		$this->pid = $pid;
	}
	
	public function getCharacter() { return $this->character; }
	public function setCharacter($character) { $this->character = $character; }
}

class Character {
	public $Sprite;
	private $Life;
	private $Hunger;
	private $Restlessness;
	private $Illness;
	public $Name;
	private $Inventory;
	public $X;
	public $Y;
	private $State;
	public $Direction;
	private $Hand;
	
	function Character($name) {
		$this->Sprite = rand(20,21);
		$this->X=5;
		$this->Y=5;
		$this->Name=$name;
		$this->Direction=3;
	}
	
	//public function getSprite() { return $this->Sprite; }
	//public function setSprite($Sprite) { $this->Sprite = $Sprite; }
}

class Ressource {
	public $Sprite;
	public $Life;
	private $Hunger;
	private $Restlessness;
	private $Illness;
	private $Name;
	public $Inventory;
	public $X;
	public $Y;
	private $State;
	private $Direction;
	private $Hand;
	
	function Ressource($inv,$x,$y,$sprite) {
		$this->Sprite = $sprite;
		$this->X=$x;
		$this->Y=$y;
		$this->Life=5;
		$this->Inventory=array($inv);
	}
	
	//public function getSprite() { return $this->Sprite; }
	//public function setSprite($Sprite) { $this->Sprite = $Sprite; }
}
?>