<?php
	require_once("action/CommonAction.php");
	require_once("action/dao/CarriereDao.php");
	
	class CarriereAction extends CommonAction {
			
		public function __construct() {
			parent::__construct();
		}
		
		public function execute() {
			parent::execute();
			parent::setCommunPageName("carrieres.php");
			
			$this->editionForm = "forms/carrieresForm.php"; 
			
			$this->contenu = new CarriereDao();
			
			if (isset($_POST["submit"]) && $_POST["submit"] == $this->getLangManager()->getSave())
			{
				$this->setContenu($_POST["content"]);
			}
			if(isset($_GET["action"]) && $_GET["action"] === "del" && isset($_GET["id"]) && $_GET["id"] !== ""){
				$this->contenu->delete("id", $_GET["id"], $this->langManager->getLang());
				$this->messager->addMessage("Suppression effectuée.", true);
			}	
		}
		
		public function printContenu(){
			if($this->connected && $this->editable && isset($_GET["new"])){
				$action = $this;
				include($this->editionForm);
			}elseif($this->connected && $this->editable && isset($_GET["id"]) && isset($_GET["action"]) && $_GET["action"] === "mod"){//&& is_int($_GET["id"])){
				$action = $this;
				$this->contenu->select("id, intitule, description, dateembauche", "id", $_GET["id"], $this->langManager->getLang());
				$carriere = $this->contenu->next();
				include($this->editionForm);
			}else{
				if($this->connected && $this->editable){
					echo("<p class='rightAlign'><a href='?new'><img src='images/New-Folder-icon.png' alt='Ajouter un service' title='Ajouter un service' /></a></p>");
				}
				
				$this->contenu->selectAll($this->getLangManager()->getLang());
				$carriere = $this->contenu->next();
				while(!is_null($carriere)){
					echo("<h2>".$carriere[1]."</h2>");
					echo("<p>".$carriere[2]."</p>");
					if($this->connected && $this->editable){
						echo("<p class='rightAlign'><a href='?id=".$carriere[0]."&action=mod'><img src='images/Editor-icon.png' alt='Modifier' title='Modifier' /></a>");
						echo("<a class='del' href='?id=".$carriere[0]."&action=del'><img src='images/Delete-icon.png' alt='Supprimer' title='Supprimer' /></a></p>");
					}
					$carriere = $this->contenu->next();
				}
			}			
		}
		
		public function setContenu($value){
			if(isset($_POST["id"]) && $_POST["id"] != ""){
				$this->contenu->update($_POST["id"], $_POST["titre"], $_POST["content"], $_POST["date"]);
				$this->messager->addMessage("Modification correctement enregistrée.", true);
			}else{
				$this->contenu->insert(Array(0=>$this->langManager->getLang(), 1=>$_POST["titre"], 2=>$_POST["content"], 3=>$_POST["date"]));
				$this->messager->addMessage("La nouvelle carrière a bien été créée.", true);
			}
		}		
		
	}
