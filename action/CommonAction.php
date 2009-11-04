<?php
	require_once("config/config.php");
	require_once("action/dao/LanguagesManager.php");

	class CommonAction {
	
		public function __construct($visibilty = 0) {
			session_start();
		}
		
		public function execute() {
			
			//gestion de la langue
			
			if(isset($_GET["lang"])){
				$lang = $_GET["lang"];
			}else{
				if(isset($SESSION["lang"])){
					$lang = $_SESSION["lang"];
				}
			}
			return new LanguagesManager($lang);
		}
	}