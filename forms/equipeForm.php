<form enctype="multipart/form-data" action="equipe.php" method="post">
	<input type="hidden" name="id" value="<?php echo(isset($employe) ? $employe[0] : "");?>" />
	<input type="text" name="nom" value="<?php echo(isset($employe) ? $employe[1] : ""); ?>" /><br />
	<input type="text" name="fonction" value="<?php echo(isset($employe) ? $employe[2] : ""); ?>" /><br />
	<textarea name="description"><?php echo(isset($employe) ? $employe[3] : ""); ?></textarea><br />
	<script type="text/javascript">
		CKEDITOR.replace('description', {toolbar: "Basic"});
	</script>
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	<input type="file" name="photo" /><br />
	<input type="submit" name="submit" value="<?php echo($action->getLangManager()->getSave()); ?>" />
</form>