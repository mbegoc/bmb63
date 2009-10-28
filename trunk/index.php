<?php

	require_once("action/IndexAction.php");
	require_once("Constant.php");

	$action = new IndexAction();
	$action->execute();

	
	require_once("header.php");
?>
	<h1>Page d'accueil</h1>
	<p><?php echo $indexText ?> </p>

<?php
	include("footer.php");
?>