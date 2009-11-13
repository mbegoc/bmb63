<?php
	require_once("action/CommonAction.php");
	
	class HistoriqueAction extends CommonAction {
			
		public function __construct() {
			parent::__construct();
		}
		
		public function execute() {
			parent::execute();
			parent::setCommunPageName("historique.php");
			if ($_POST["apercu"] == "apercu")
			{
				$this->setContenu($_POST["content"]);
			}
		}
		
		public function getContenu(){
			return parent::getContenu("Contenu" , "titre" , "historique");
		}
		
		public function printContenu(){
			parent::printContenu("Contenu" , "titre" , "historique");
		}
		public function setContenu($value){
			$conn = new ContenuStandard();
			$conn->update("historique", "contenu", $value,parent::getLangManager()->getLang());	
		}
	}
