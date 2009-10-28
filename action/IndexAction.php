<?php
	require_once("action/CommonAction.php");
	require_once("action/dao/UserDAO.php");

	class IndexAction extends CommonAction {
		private $resultMessage;
	
		public function __construct() {
			parent::__construct(0);
		}
		
		public function execute() {
			parent::execute();
			
			if (isset($_POST["username"]) && isset($_POST["password"])) {
			
				if (UserDAO::authenticate($_POST["username"], $_POST["password"])) {
					parent::setLoggedIn(true);
					header("Location:adminIndex.php");
				}
				else {
					parent::setLoggedIn(false);
					$this->resultMessage = "Authentification invalide";
				}
			}
			else if (isset($_GET["action"]) && strcmp($_GET["action"], "logout") == 0) {
				unset($_SESSION["Authentifier"]);
				session_destroy();
			}
		}
		
		public function getResultMessage() {
			return $this->resultMessage;
		}
	
	}


