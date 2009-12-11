<form enctype="multipart/form-data" class="editor" action="equipe.php" method="post">
	<input type="hidden" name="id" value="<?php echo(isset($employe) ? $employe[0] : "");?>" />
	<p>Nom</p>
	<input type="text" name="nom" value="<?php echo(isset($employe) ? $employe[1] : ""); ?>" /><br />
	<p>Fonction</p>
	<input type="text" name="fonction" value="<?php echo(isset($employe) ? $employe[2] : ""); ?>" /><br />
	<p>Description</p>
	<textarea name="description"><?php echo(isset($employe) ? $employe[3] : ""); ?></textarea><br />
	<script type="text/javascript">
		CKEDITOR.replace('description', {toolbar: "MyToolbar"});
	</script>
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	<p>Photo</p>
	<input type="file" name="photo" /><br />
	<input type="submit" name="submit" value="<?php echo($action->getLangManager()->getSave()); ?>" />
</form>