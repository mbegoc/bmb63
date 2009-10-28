<?php

	require_once("action/IndexAction.php");

	$action = new IndexAction();
	$action->execute();
	
	require_once("header.php");
?>
	<h1>Login</h1>
	
	<?php
		if ($action->getResultMessage() != null) {
			?>
			<h2><?php echo $action->getResultMessage(); ?></h2>
			<?php
		}
	?>
	
	
	<form action="index.php" method="post">
		<input type="text" name="username" />
		<input type="password" name="password" />
		<input type="submit" value="Authentifier" />
	</form>
<?php
	include("footer.php");
?>