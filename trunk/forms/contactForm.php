<form action="contact.php" method="post">
	<input type="hidden" name="id" value="" />
	<textarea name="adresse"><?php $this->getAdresse()?></textarea>
	<textarea name="courriel">Courriel</textarea>
	<textarea name="telephone">Tel</textarea>
	<textarea name="postal">Postal</textarea>
	<input type="submit" name="submit" value="Enregistrer" />
</form>