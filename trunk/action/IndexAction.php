<?php
	require_once("action/CommonAction.php");
	//require_once("action/dao/ContenuStandardDao.php");
	require_once("action/dao/UserDAO.php");
	
	class IndexAction extends CommonAction {
			
		public function __construct() {
			parent::__construct();
			
		}
		
		public function execute() {
			parent::execute();
			
			//identification de l'usager
			if(isset($_POST["login"]["submit"])){
				if(UserDAO::authenticate($_POST["login"]["username"], $_POST["login"]["password"])){
					$this->editable = true;
					$_SESSION["loggedin"] = true;
				}
			}else{
				if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
					$this->editable = true;
				}
			}
		}
		
		public function getContenu(){
			return parent::getContenu("Contenu" , "titre" , "acceuil");
		}
		
		public function printContenu(){
			parent::printContenu("Contenu" , "titre" , "acceuil");
		}
	}
