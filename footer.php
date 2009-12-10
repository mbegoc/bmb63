	</div>
	<div id="footer" class="center">
	<?php 
	if($action->getMessager()->hasMessages())
		echo("<p>".$action->getMessager()->dump("</p><p>")."</p>");
	
	echo("<p class='left'>".$action->getLangManager()->getCopyright())."</p>";

	$lang = $action->getLangManager()->getOthersLang();
	$language = $action->getLangManager()->getOthersLanguage();
	for($i = 0 ; $i < count($lang) ; $i++){
		echo("<p class='right'><a href='?lang=" . $lang[$i] . "'>" . $language[$i] . "</a></p>");
	}
	if($action->isConnected()){
		echo("<p class='centerAlign'><a href='?deco'>".$action->getLangManager()->getDeconnection()."</a></p>");
	}elseif(DEBUG){
		echo("<p class='centerAlign'><a href='login.php'>Login</p>");
	}
	echo("<div class='clear'></div>");
	
?>	</div>
</body>
</html>