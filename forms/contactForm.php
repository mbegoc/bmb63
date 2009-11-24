<form action="contact.php" method="post">
	<input type="hidden" name="id" value="" />
	<textarea name="adresse"><?php echo $this->getContactInfo(0)?></textarea>
	<textarea name="courriel"><?php echo $this->getContactInfo(3)?></textarea>
	<textarea name="telephone"><?php echo $this->getContactInfo(2)?></textarea>
	<textarea name="postal"><?php echo $this->getContactInfo(1)?></textarea>
	<input type="submit" name="submit" value="Enregistrer" />
</form>