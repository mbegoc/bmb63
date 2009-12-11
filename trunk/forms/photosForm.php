<?php echo $action->getLangManager()->getSave() ;?>

<div enctype="multipart/form-data" id="photo" class="form photoForm" action = "photos.php">
	<form action="photos.php" method="post">
		<div class="left">
			<p>Nom: </p>
			<p>Description: </p>
			<p>Lien Photo: </p>
		</div>
												
		<div class="right inputPhoto">
			<input type="hidden" name="id" value="<?php echo $photo[0];?>"/>
			<p><input type="text" name="nom" value = "<?php echo $photo[1];?>"/></p>
			<p><input type="text" name="description" value = "<?php echo $photo[2];?>"/></p>
			<input type="file" name="lien"/><br />
		</div>
		<div class="clear centerAlign">
			<input type="submit" name="submit" value="<?php echo $action->getLangManager()->getSave(); ?>" />
		</div>
	</form>
</div>


