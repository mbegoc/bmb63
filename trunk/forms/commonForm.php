<form class = "standardForm" action="<?php echo $communPageName ?>" method="post">
	<input type="hidden" name="id" value="" />
	<textarea class = "inputStandardForm" name="content"><?php echo $action->getContenu(); ?> </textarea>
	<input type="submit" name="envoyer" value="envoyer" />
	<input type="submit" name="apercu" value="apercu" />
</form>