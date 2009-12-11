<form action="services.php" class="editor" method="post">
	<input type="hidden" name="id" value="<?php echo(isset($service) ? $service[0] : "");?>" />
	<p>Titre</p>
	<input type="text" name="titre" value="<?php echo(isset($service) ? $service[1] : ""); ?>" />
	<p>Description</p>
	<textarea name="content"><?php echo(isset($service) ? $service[2] : ""); ?></textarea>
	<script type="text/javascript">
		CKEDITOR.replace('content', {toolbar: "MyToolbar"});
	</script>
	<input type="submit" name="submit" value="<?php echo($action->getLangManager()->getSave()); ?>" />
</form>
