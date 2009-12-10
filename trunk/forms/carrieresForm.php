<form action="carrieres.php" method="post">
	<input type="hidden" name="id" value="<?php echo(isset($carriere) ? $carriere[0] : "");?>" />
	<input type="text" name="titre" value="<?php echo(isset($carriere) ? $carriere[1] : ""); ?>" />
	<textarea name="content"><?php echo(isset($carriere) ? $carriere[2] : ""); ?></textarea>
	<script type="text/javascript">
		CKEDITOR.replace('content', {toolbar: "Basic"});
	</script>
	<input type="text" name="date" value="<?php echo(isset($carriere) ? $carriere[3] : ""); ?>" />
	<input type="submit" name="submit" value="<?php echo($action->getLangManager()->getSave()); ?>" />
</form>