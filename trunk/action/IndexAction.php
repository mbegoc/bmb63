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
		}
		
		public function getContenu(){
			return parent::getContenu("Contenu" , "titre" , "acceuil");
		}
		
		public function printContenu(){
			parent::printContenu("Contenu" , "titre" , "acceuil");
		}
	}
