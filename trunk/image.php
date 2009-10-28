<?php

	require_once("action/IndexAction.php");

	$action = new IndexAction();
	$action->execute();
	
	require_once("header.php");
?>
	<h1>Images</h1>	

<?php
	include("footer.php");
?>