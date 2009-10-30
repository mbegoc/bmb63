<?php
	require_once("config/config.php");
	require_once("action/dao/LanguagesManager.php");

	session_start();

	class CommonAction {
	
		public function __construct($visibilty = 0) {
		}
		
		public function execute() {
			return new LanguagesManager("en");
		}
	}