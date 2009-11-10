<?php
	require_once("action/CommonAction.php");
	require_once("action/dao/ContenuStandardDao.php");
	
	class IndexAction extends CommonAction {
			
		public $contenu = null;
		
		public function __construct() {
			parent::__construct();
			$this->contenu = new ContenuStandard();
			
		}
		
		public function execute() {
			$langManager = parent::execute();
			
			return $langManager;
		}
		
		public function getContenu()
		{
			//$this->contenu->select("Contenu","titre","acceuil");
			$this->contenu->select("Contenu" , "titre" , "acceuil");
			$value = $this->contenu->next();
			return $value[0];
			
		}
		
	}
