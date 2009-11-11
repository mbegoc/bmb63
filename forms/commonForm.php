<form class = "standardForm" action="<?php echo $communPageName ?>" method="post">
	<input type="hidden" name="id" value="" />
<?php
	require_once("fckeditor/fckeditor_php5.php");
	//ajout du champ de saisie ameliore
	$oFCKeditor = new FCKeditor('content') ;
	$oFCKeditor->BasePath = '/fckeditor/' ;
	
	$oFCKeditor->Config["CustomConfigurationsPath"] = "/fckeditor/config/config.js";
	$oFCKeditor->Config["AutoDetectLanguage"] = false ;
	$oFCKeditor->Config["DefaultLanguage"] = $action->getLangManager()->getLang();
	$oFCKeditor->Config["EditorAreaCSS"] = '/css/style.css' ;
	$oFCKeditor->Width  = '100%';
	$oFCKeditor->Height = '600';
	$oFCKeditor->ToolbarSet = 'Personnal';

	$oFCKeditor->Value = $action->getContenu();
	$oFCKeditor->Create();
	
	//<textarea class = "inputStandardForm" name="content"><?php echo $action->getContenu();  </textarea>
?>
	<input type="submit" name="envoyer" value="envoyer" />
	<input type="submit" name="apercu" value="apercu" />
</form>