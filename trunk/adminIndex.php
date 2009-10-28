<?php
	require_once("action/AdminIndexAction.php");

	$action = new AdminIndexAction();
	$action->execute();
	
	include("header.php");
?>
	<h1>Admin Index</h1>
	
	<p> Entrez le texte à afficher sur la page d'acceuil</p>
	<form action="index.php" method="post">
		<textarea name="text" rows="20" cols="50"></textarea> </br>
		<input type="submit" value="Submit"><input type="Reset">
	</form>
<?php
	include("footer.php");
?>