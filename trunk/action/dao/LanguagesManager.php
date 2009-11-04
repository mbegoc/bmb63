<?php
require_once("config/config.php");

class LanguagesManager {
	private $lang;//code langue
	private $language;//nom complet de la langue
	private $othersLang = Array();//les autres langues disponibles
	private $othersLanguage = Array();//autres langues disponibles
	
	private $title;
	private $menu;
	private $copyright;
	
	private $isset = false;//on veut savoir si le langage demandé a bien été trouvé
	
	public function __construct($lang = DEFAULT_LANGUAGE) {
		//initialisation de l'objet
		$this->init($lang);
		if(!$this->isset){
			//si la langue demandée n'a pas été trouvé, il faut reinitialiser les tableaux d'autres langue
			$this->othersLang = Array();
			$this->othersLanguage = Array();
			//puis recommencer avec la langue par défaut
			$this->init(DEFAULT_LANGUAGE);
		}
	}

	public function init($lang){
		$xml = simplexml_load_file("config/languages.xml");
		
		//recherche du langage parmis la liste de langages disponibles
		foreach ($xml->language as $language) {
			if($language["lang"] == $lang){
				$this->lang = $lang;
				$this->language = $language["fullname"];
				$this->title = $language->title;
				$this->copyright = $language->copyright;
				
				//menu
				$i = 0;
				$this->menu = Array();
				foreach($language->menu->element as $menuElement){
					$this->menu[$i++] = $menuElement;
				}
				
				//il faut qu'on sache que l'objet est bien initialisé dans le constructeur
				$this->isset = true;
			}else{
				//si on ne trouve pas le langage, on dresse la liste des autres langages disponibles
				//on en aura besoin pour connaitre les autres langages et les proposée dans la page web
				$this->othersLang[count($this->othersLang)] = $language["lang"];
				$this->othersLanguage[count($this->othersLanguage)] = $language["fullname"];
			}
		}
	}
	public function getTitle() {
		return $this->title;
	}
	
	public function getMenu(){
		return $this->menu;
	}
	
	public function getCopyright(){
		return $this->copyright;
	}
	
	public function getLang(){
		return $this->lang;
	}

	public function getLanguage(){
		return $this->language;
	}
	
	public function getOthersLang(){
		return $this->othersLang;
	}

	public function getOthersLanguage(){
		return $this->othersLanguage;
	}
}

?>