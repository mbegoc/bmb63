<?php
	require_once("action/CommonAction.php");
	
	class ContactAction extends CommonAction {
			
		public function __construct() {
			parent::__construct();
			parent::setEditionForm("forms/contactForm.php");
		}
		
		public function execute() {
			parent::execute();
			if ($_POST["submit"] == "Enregistrer")
			{
				$this->setContenu($_POST["adresse"]."<br/>".$_POST["postal"].
				"<br/>".$_POST["telephone"]."<br/>".$_POST["courriel"]);
			}
		}
		public function getContenu(){
			return parent::getContenu("Contenu" , "titre" , "contact");
		}
		public function getContactInfo($i)
		{
			$contenu = $this->getContenu();
			$values = explode("<br/>",$contenu);
			return $values[$i];
		}
		
		public function printContenu(){
			parent::printContenu("Contenu" , "titre" , "contact");
		}
		public function setContenu($value)
		{
			$conn = new ContenuStandard();
			$conn->update("contact", "contenu", $value,parent::getLangManager()->getLang());
			$this->messager->addMessage("Modification correctement enregistrée.", true);	
		}
		
	}
