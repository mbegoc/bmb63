<?php
require_once("config/config.php");

class Messager{
/*	ERROR = 2
	WARNING = 1
	INFO = 0
	NORMAL = -1
	ALL = 10  
*/
	private $messages;
	
	public function __construct(){
		$this->messages = Array();
	}
	
	public function addMessage($message, $alert = false){
		$this->messages[count($this->messages)] = Array($message, -1, $alert);
	}
	
	public function addDebugMessage($message, $errorLevel = 2, $alert = false){
		if(DEBUG)
			$this->messages[count($this->messages)] = Array($message, $errorLevel, $alert);
	}
	
	public function dump($nl = "\n", $errorLevelMax = 10, $errorLevelMin = -1){
		$dump = "";
		$endLine = "";
		foreach($this->messages as $message){
			if($message[1] <= $errorLevelMax && $message[1] >= $errorLevelMin){
				if(!$message[2]){
					$dump .= $endLine . $message[0];
				}
			}
			$endLine = $nl;
		}
		return $dump;
	}
	
	public function alert($errorLevelMax = 10, $errorLevelMin = -1){
		$dump = "";
		foreach($this->messages as $message){
			if($message[1] <= $errorLevelMax && $message[1] >= $errorLevelMin){
				if($message[2]){
					$dump .= "<script language='javascript'>alert('$message[0]');</script>";
				}
			}
		}
		return $dump;
	}
	
	public function hasMessages(){
		if(count($this->messages) == 0){
			return false;
		}else{
			return true;
		}
	}
		
	public function hasNonAlertMessages(){
		foreach($this->messages as $message){
			if(!$message[2]){
				return true;
			}
		}
		return false;
	}
			
	public function hasAlertMessages(){
		foreach($this->messages as $message){
			if($message[2]){
				return true;
			}
		}
		return false;
	}
}