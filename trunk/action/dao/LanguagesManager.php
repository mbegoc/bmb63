<?php
require_once("config/config.php");

class LanguagesManager {
	private $title;
	private $menu;
	private $copyright;
	
	public function __construct($lang = DEFAULT_LANGUAGE) {
		$xml = simplexml_load_file("config/languages.xml");
		foreach ($xml->language as $language) {
			if($language["lang"] == $lang){
				$this->title = $language->title;
				$this->copyright = $language->copyright;
				
				//menu
				$i = 0;
				$this->menu = Array();
				foreach($language->menu->element as $menuElement){
					$this->menu[$i++] = $menuElement;
				}
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
}

?>