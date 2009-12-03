<form action="services.php" method="post">
	<input type="hidden" name="id" value="<?php echo(isset($service) ? $service[0] : "");?>" />
	<input type="text" name="titre" value="<?php echo(isset($service) ? $service[1] : ""); ?>" />
	<textarea name="content"><?php echo(isset($service) ? $service[2] : ""); ?></textarea>
	<script type="text/javascript">
		CKEDITOR.replace('content', {toolbar: "Basic"});
	</script>
	<input type="submit" name="submit" value="<?php echo($action->getLangManager()->getSave()); ?>" />
</form>
