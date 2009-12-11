<?php
	require_once("action/CommonAction.php");
	require_once("action/dao/EquipeDao.php");
	
	class EquipeAction extends CommonAction {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function execute() {
			parent::execute();
			parent::setCommunPageName("equipe.php");
			
			$this->editionForm = "forms/equipeForm.php";
			
			$this->contenu = new EquipeDao();
			
			if (isset($_POST["submit"]) && $_POST["submit"] == $this->getLangManager()->getSave())
			{
				$this->setContenu($_POST["content"]);
			}
			if(isset($_GET["action"]) && $_GET["action"] === "del" && isset($_GET["id"]) && $_GET["id"] !== ""){
				$this->contenu->select("lienPhoto", "id", $_GET["id"], $this->langManager->getLang());
				$resultat = $this->contenu->next();
				if(file_exists($resultat[0]))
					unlink($resultat[0]);
					
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
				$this->contenu->select("id, nom, fonction, description, lienphoto", "id", $_GET["id"], $this->langManager->getLang());
				$employe = $this->contenu->next();
				include($this->editionForm);
			}else{
				if($this->connected && $this->editable){
					if(!is_null($this->messageErreur)){
						echo("<p class='error'>$this->messageErreur</p>");
						$this->messageErreur = null;
					}
					echo("<p class='rightAlign'><a href='?new'><img src='images/New-Folder-icon.png' alt='Ajouter un service' title='Ajouter un service' /></a></p>");
				}
				
				$this->contenu->selectAll($this->getLangManager()->getLang());
				$employe = $this->contenu->next();
				while(!is_null($employe)){
					echo("<div class='clear'><img class='right equipe' width='150px' height='220px' src='$employe[4]' alt='$employe[1] - $employe[2]' title='$employe[1] - $employe[2]' /><h2>$employe[1]</h2>");
					echo("<h3>$employe[2]</h3>");
					echo("$employe[3]");
					if($this->connected && $this->editable){
						echo("<p class='rightAlign clear'><a href='?id=$employe[0]&action=mod'><img src='images/Editor-icon.png' alt='Modifier' title='Modifier' /></a>");
						echo("<a class='del' href='?id=$employe[0]&action=del'><img src='images/Delete-icon.png' alt='Supprimer' title='Supprimer' /></a></p>");
					}
					echo("</div>");
					$employe = $this->contenu->next();
				}
			}
		}
		
		public function setContenu($value){
			//gestion de l'éventuelle photo
			switch($_FILES["photo"]["error"]){
				case UPLOAD_ERR_OK:
					if(isset($_FILES["photo"]["tmp_name"]) && $_FILES["photo"]["tmp_name"] !== ""){
						//suppression de la photo precedente
						$this->contenu->select("lienPhoto", "id", $_GET["id"], $this->langManager->getLang());
						$resultat = $this->contenu->next();
						if(file_exists($resultat[0]))
							unlink($resultat[0]);
						//copie du fichier uploadé
						$filePath = "images/".basename($_FILES["photo"]["name"]);
						if(file_exists($filePath)){
							$this->messager->addMessage("Un fichier portant ce nom existe déjà sur le serveur.", true);
						}else{
							if(!move_uploaded_file($_FILES["photo"]["tmp_name"], $filePath)){
								$this->messager->addMessage("Erreur de l'écriture du fichier sur le serveur.", true);
							}
						}
					}else{
						$filePath = null;
					}
					break;
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					$this->messager->addMessage("Le document est trop lourd.", true);
					break;
				case UPLOAD_ERR_PARTIAL:
				case UPLOAD_ERR_NO_FILE:
					$this->messager->addMessage("Le chargement du document n'a pas abouti.", true);
					break;
				case UPLOAD_ERR_CANT_WRITE:
				case UPLOAD_ERR_NO_TMP_DIR:
				case UPLOAD_ERR_EXTENSION:
					$this->messager->addMessage("Une erreur interne au serveur est survenue. Veuillez en avisez l'administrateur si cette erreur se reproduit.", true);
					break;
				default:
					$this->messager->addMessage("Une erreur inconnue s'est produite. Veuillez en avisez l'administrateur si cette erreur se reproduit.", true);
					
			}
			if(isset($_POST["id"]) && $_POST["id"] != ""){
				$this->contenu->update($_POST["id"], $_POST["nom"], $_POST["fonction"], $_POST["description"], $filePath);
				$this->messager->addMessage("Les modifications ont bien été enregistrées.", true);
			}else{
				$datas = Array(0=>$this->langManager->getLang(), 1=>$_POST["nom"], 2=>$_POST["fonction"], 3=>$_POST["description"]);
				if($filePath != null)
					$datas[4] = $filePath;
				$this->contenu->insert($datas);
				$this->messager->addMessage("Le nouveau membre a bien été ajouté à l'équipe.", true);
			}
		}		
		
	}
		