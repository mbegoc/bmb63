<?php
	require_once("config/config.php");
	require_once("action/dao/LanguagesManager.php");
	require_once("action/dao/ContenuStandardDao.php");
	require_once("action/Messager.php");

	abstract class CommonAction {
		private $connected = false;
		private $editable = false;
		private $langManager;
		private $communPageName = "";
		private $editionForm = "forms/commonForm.php";
		private $messager;
		
		public $contenu = null;
	
		public function __construct($visibilty = 0) {
			session_start();
			$this->contenu = new ContenuStandard();
			$this->messager = new Messager();
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
					
			//identification de l'usager
			if(isset($_POST["login"]["submit"])){
				if(UserDAO::authenticate($_POST["login"]["username"], $_POST["login"]["password"])){
					$this->connected = true;
					$_SESSION["loggedin"] = true;
					$this->editable = true;
				}else{
					$this->connected = false;
					$_SESSION["loggedin"] = false;
				}
			}else if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
				$this->connected = true;
				$this->editable = true;
			}
			//deconnexion de l'usager
			if(isset($_GET["deco"])){
				$this->connected = false;
				$_SESSION["loggedin"] = false;
			}
			
			//gestion du module d'administration
			if($_POST["apercu"] == "apercu"){
				$this->editable = false;
			}
		}

		public function getContenu($listeColonne , $champWhere=null, $valueWhere=null)
		{
			
			$this->contenu->select($listeColonne , $champWhere, $valueWhere, $this->langManager->getLang());
			$value = $this->contenu->next();
			return $value[0];
		}
		
		public function printContenu($listeColonne , $champWhere=null, $valueWhere=null){
			//$this->messager->addDebugMessage($this->connected);
			$this->messager->addDebugMessage($this->editable);
			if($this->connected && $this->editable){
				$action = $this;
				include($this->editionForm);
			}else{
				echo($this->getContenu($listeColonne , $champWhere=null, $valueWhere=null,$this->langManager->getLang()));
			}
		}
		
		public function getLangManager(){
			return $this->langManager;
		}
		
		public function isConnected(){
			return $this->connected;
		}
		
		public function getMessager(){
			return $this->messager;
		}
		public function setCommunPageName($name){
			$this->communPageName = $name;
		}
		public function setEditionForm($name){
			$this->editionForm = $name;
		}
		public function s(){
			return $this->langManager;
		}
	}