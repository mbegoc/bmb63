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
			$conn = new ContenuStandard();
			
			parent::setCommunPageName("index.php");
			if ($_POST["apercu"] == "apercu")
			{
				$this->setContenu($_POST["content"]);
			}
			
			
		}
		
		public function getContenu(){
			return parent::getContenu("Contenu" , "titre" , "acceuil");
		}
		
		public function printContenu(){
			parent::printContenu("Contenu" , "titre" , "acceuil");
		}
		public function setContenu($value){
			$conn = new ContenuStandard();
			//$conn->update("acceuil", "contenu", $value,parent::getLangManager()->getLang());
			$conn->select("*" , "id", "667","fr");
			$test = $conn->next();
		}
	}
