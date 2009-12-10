<form class = "contactForm" action="contact.php" method="post">
	<input type="hidden" name="id" value="" />
	<p><span>Adresse</span><textarea name="adresse"><?php echo $this->getContactInfo(0)?></textarea></p>
	<p><span>Courriel</span><textarea name="courriel"><?php echo $this->getContactInfo(3)?></textarea></p>
	<p><span>Telephone</span><textarea name="telephone"><?php echo $this->getContactInfo(2)?></textarea></p>
	<p><span>CodePostal</span><textarea name="postal"><?php echo $this->getContactInfo(1)?></textarea></p>
	<div class="clear"></div>
	<input type="submit" name="submit" value="Enregistrer" />
</form>