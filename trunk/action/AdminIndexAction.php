<?php
	require_once("action/CommonAction.php");
	

	class AdminIndexAction extends CommonAction 
	{
		public $daoContenu = null;
		
		
		
		public function __construct() 
		{
			parent::__construct(1);
			$this->contenu = new ContenuStandard();
		}
		
		public function execute() 
		{
			parent::execute();
		}
		
		public function setContenu($content)
		{
			$this->contenu->update("acceuil","contenu",$content);
		}
		

	
	}



