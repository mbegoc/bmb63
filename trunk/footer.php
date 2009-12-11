	</div>
	<div id="footer" class="center">
	<?php 
	if($action->getMessager()->hasNonAlertMessages()){
		echo("<3>Erreur:</3><p>".$action->getMessager()->dump("</p><p>", 10, 0)."</p>");
	}
	if($action->getMessager()->hasAlertMessages()){
		echo($action->getMessager()->alert());
	}
	
	echo("<p class='left'>".$action->getLangManager()->getCopyright())."</p>";

	$lang = $action->getLangManager()->getOthersLang();
	$language = $action->getLangManager()->getOthersLanguage();
	for($i = 0 ; $i < count($lang) ; $i++){
		echo("<p class='right'><a href='?lang=" . $lang[$i] . "'>" . $language[$i] . "</a></p>");
	}
	if($action->isConnected()){
		echo("<p class='clear centerAlign'><a href='?deco'>".$action->getLangManager()->getDeconnection()."</a></p>");
	}elseif(DEBUG){
		echo("<p class='clear centerAlign'><a href='login.php'>Login</p>");
	}
	echo("<div class='clear'></div>");
	
?>	</div>
</body>
</html>