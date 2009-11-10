<form class = "standardForm" action="index.php" method="post">
	<input type="hidden" name="id" value="" />
	<textarea class = "inputStandardForm" name="content"><?php echo $action->getContenu(); ?> </textarea>
	<input type="submit" name="submit" value="Envoyer" />
	<input type="submit" name="apercu" value="apercu" />
</form>