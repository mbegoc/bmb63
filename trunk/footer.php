	</div>
	<div id="footer" class="center">
	<?php echo($action->getLangManager()->getCopyright());

	$lang = $action->getLangManager()->getOthersLang();
	$language = $action->getLangManager()->getOthersLanguage();
	for($i = 0 ; $i < count($lang) ; $i++){
		echo("<br /><a href='?lang=" . $lang[$i] . "'>" . $language[$i] . "</a>");
	}
	if($action->isConnected()){
		echo("<br /><a href='?deco'>".$action->getLangManager()->getDeconnection()."</a>");
	}
?>	</div>
</body>
</html>