<form class = "standardForm" action="<?php echo $communPageName ?>" method="post">
	<textarea name="content"><?php echo($action->getContenu()); ?></textarea>
	<script type="text/javascript">
		CKEDITOR.replace('content', {toolbar: "Basic"});
	</script>
	<input type="submit" name="apercu" value="<?php echo($action->getLangManager()->getSave()); ?>" />
</form>