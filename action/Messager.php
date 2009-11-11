<?php
require_once("config/config.php");

class Messager{
	private $messages;
	
	public function __construct(){
		$this->messages = Array();
	}
	
	public function addMessage($message){
		$this->messages[count($this->messages)] = $message;
	}
	
	public function addDebugMessage($message){
		if(DEBUG)
			$this->addMessage($message);
	}
	
	public function setMessage($message){
		$this->messages = Array();
		$this->messages[0] = $message;
	}
	
	public function setDebugMessage($message){
		if(DEBUG)
			$this->setMessage($message);
	}
	
	public function dump($nl = "\n"){
		$dump = "";
		foreach($this->messages as $message){
			$dump .= $message . $nl;
		}
		return $dump;
	}
}