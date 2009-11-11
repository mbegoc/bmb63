<?php
	require_once("config/config.php");
	require_once("action/dao/LanguagesManager.php");

	abstract class CommonAction {
		private $editable = false;
		private $langManager;
		private $editionForm = "forms/commonForm.php";
		
		public $contenu = null;
	
		public function __construct($visibilty = 0) {
			session_start();
			$this->contenu = new ContenuStandard();
		}
		
		public function execute() {
			
			//gestion de la langue
			if(isset($_GET["lang"])){
				$lang = $_GET["lang"];
			}else{
				if(isset($_SESSION["lang"])){
					$lang = $_SESSION["lang"];
				}
			}
			$this->langManager = new LanguagesManager($lang);
			$_SESSION["lang"] = $this->langManager->getLang();
			
			//gestion de la connexion
			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
				$this->editable = true;
			}
			
			//gestion du module d'administration
			if($_POST["apercu"] == "apercu"){
				$this->editable = false;
			}
		}

		public function getContenu($listeColonne , $champWhere=null, $valueWhere=null)
		{
			if(!$this->editable){
				$form = fopen("/forms/commonForm.php", "rb");
				return fread($form, filesize($form));
				fclose($form);
			}else{
				$this->contenu->select($listeColonne , $champWhere, $valueWhere);
				$value = $this->contenu->next();
				return $value[0];
			}
		}
		
		public function getLangManager(){
			return $this->langManager;
		}
	}