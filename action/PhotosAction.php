<?php
	require_once("action/CommonAction.php");
	require_once("action/dao/PhotoDao.php");
	
	class PhotosAction extends CommonAction {
			
		public function __construct() {
			parent::__construct();
		}
		
		public function execute() {
			parent::execute();
			parent::setCommunPageName("photos.php");
			
			$this->editionForm = "forms/photosForm.php"; 
			
			$this->contenu = new PhotoDao();
			if (isset($_POST["submit"]) && $_POST["submit"] == $this->getLangManager()->getSave())
			{
				$this->setContenu();
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
				$this->contenu->select("id, nom, description , lien", "id", $_GET["id"], $this->langManager->getLang());
				$photo = $this->contenu->next();
				include($this->editionForm);
			}else{
				if($this->connected && $this->editable){
					echo("<p class='rightAlign'><a href='?new'><img src='images/New-Folder-icon.png' alt='Ajouter une photo' title='Ajouter une photo' /></a></p>");
				}
				
				$this->contenu->selectAll($this->getLangManager()->getLang());
				$photo = $this->contenu->next();
				while(!is_null($photo)){
					include("jquery/unePhoto.php");
					if($this->connected && $this->editable){
						echo("<span class='rightAlign'><a href='?id=".$photo[0]."&action=mod'><img src='images/Editor-icon.png' alt='Modifier' title='Modifier' /></a>");
						echo("<a href='?id=".$photo[0]."&action=del'><img src='images/Delete-icon.png' alt='Supprimer' title='Supprimer' /></a></span><br/><br/>");
					}
					$photo = $this->contenu->next();
				}
			}			
		}
		
		public function setContenu(){
			
			
			if(isset($_POST["id"]) && $_POST["id"] != ""){
				$this->contenu->update($_POST["id"], $_POST["nom"], $_POST["description"], "jquery/gallery/".$_POST["lien"]);
				$this->messager->addMessage("Modifications correctement enregistrées.", true);
			}else{
				$this->contenu->insert(Array(0=>'fr', 1=>$_POST["nom"], 2=>$_POST["description"], 3=>"jquery/gallery/".$_POST["lien"]));
				$this->contenu->insert(Array(0=>'en', 1=>$_POST["nom"], 2=>$_POST["description"], 3=>"jquery/gallery/".$_POST["lien"]));
				$this->messager->addMessage("Le nouveau service a bien été créé.", true);
			}
		}
	}
