<?php
	require_once("action/CommonAction.php");
	
	class CompagnieAction extends CommonAction {
			
		public function __construct() {
			parent::__construct();
			
		}
		
		public function execute() {
			parent::execute();
			
			parent::setCommunPageName("compagnie.php");
			if (isset($_POST["apercu"]))
			{
				$this->setContenu($_POST["content"]);
				
			}
			
			
		}
		
		public function getContenu(){
			return parent::getContenu("Contenu" , "titre" , "compagnie");
		}
		
		public function printContenu(){
			parent::printContenu("Contenu" , "titre" , "compagnie");
		}
		public function setContenu($value){
			$this->contenu->update("compagnie", "contenu", $value,parent::getLangManager()->getLang());
			$this->messager->addMessage("Modification correctement enregistrée.", true);
		}
	}
