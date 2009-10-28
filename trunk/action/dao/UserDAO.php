<?php

	class UserDAO {
	
		public static function authenticate($username, $password) {
			$result = false;
			
			// bd, texte, ...
			if (strcmp($username, "cvm") == 0 && strcmp($password, "cvm") == 0) {
				$result = true;
			}
			
			return $result;
		}
		
		
	}


