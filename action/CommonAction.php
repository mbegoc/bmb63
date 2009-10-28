<?php
	session_start();

	class CommonAction {
		private $visibilty;
	
		public function __construct($visibilty) {
			$this->visibilty = $visibilty;
		}
		
		public function execute() {
			if ($this->visibilty == 1) {
				if ($this->isLoggedIn()) {
					
				}
				else {
					header("Location:index.php");
				}
			}
		}
	
		public function isLoggedIn() {
			return strcmp($_SESSION["Authentifier"], "oui") == 0;
		}
		
		protected function setLoggedIn($loggedIn) {
			if ($loggedIn) {
				$_SESSION["Authentifier"] = "oui";
			}
			else {
				unset($_SESSION["Authentifier"]);
			}
		}
	}