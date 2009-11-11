<?php
require_once("config/config.php");

class UserDAO {

	public static function authenticate($username, $password) {
		$result = false;
		
		// bd, texte, ...
		if (strcmp($username, DEFAULT_USER) == 0 && strcmp($password, DEFAULT_PASSWORD) == 0) {
			$result = true;
		}
		
		return $result;
	}	
}