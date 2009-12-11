<form action="carrieres.php" class="editor" method="post">
	<input type="hidden" name="id" value="<?php echo(isset($carriere) ? $carriere[0] : "");?>" />
	<p>Titre emploi</p>
	<input type="text" name="titre" value="<?php echo(isset($carriere) ? $carriere[1] : ""); ?>" />
	<p>Annonce</p>
	<textarea name="content"><?php echo(isset($carriere) ? $carriere[2] : ""); ?></textarea>
	<script type="text/javascript">
		CKEDITOR.replace('content', {toolbar: "MyToolbar"});
	</script>
	<p>Date de début</p>
	<input type="text" name="date" value="<?php echo(isset($carriere) ? $carriere[3] : ""); ?>" /><br />
	<input type="submit" name="submit" value="<?php echo($action->getLangManager()->getSave()); ?>" />
</form>