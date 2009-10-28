<?php
	require_once("action/AdminContactAction.php");

	$action = new AdminContactAction();
	$action->execute();
	
	include("header.php");
?>
	<h1>Admin Contact</h1>
<?php
	include("footer.php");
?>