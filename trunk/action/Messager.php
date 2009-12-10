<?php
require_once("config/config.php");

class Messager{
	public static $ERROR = 2,
				  $WARNING = 1,
				  $INFO = 0,
				  $ALL = 10;  
	private $messages;
	
	public function __construct(){
		$this->messages = Array();
	}
	
	public function addMessage($message, $errorLevel = 0){
		$this->messages[count($this->messages)] = Array($message, $errorLevel);
	}
	
	public function addDebugMessage($message, $errorLevel = 0){
		if(DEBUG)
			$this->addMessage($message, $errorLevel);
	}
	
	public function setMessage($message, $errorLevel = 0){
		$this->messages = Array();
		$this->messages[0] = Array($message, $errorLevel);
	}
	
	public function setDebugMessage($message, $errorLevel = 0){
		if(DEBUG)
			$this->setMessage($message, $errorLevel = 0);
	}
	
	public function dump($nl = "\n", $errorLevel = 10){
		$dump = "";
		foreach($this->messages as $message){
			if($message[1] < $errorLevel)
				$dump .= $message[0] . $nl;
		}
		return $dump;
	}
}