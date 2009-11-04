	</div>
	<div id="footer" class="center">
	<?php echo($langManager->getCopyright());

	$lang = $langManager->getOthersLang();
	$language = $langManager->getOthersLanguage();
	for($i = 0 ; $i < count($lang) ; $i++){
		echo("<br /><a href='?lang=" . $lang[$i] . "'>" . $language[$i] . "</a>");
	}
?>	</div>
</body>
</html>