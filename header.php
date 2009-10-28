<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
        <title>Mon site</title>
    </head>
    <body>
		<div>
			
			
			<?php
				if ($action->isLoggedIn()) {
				?>
					<a href="adminindex.php">Admin Index</a> | 
					<a href="adminimage.php">Admin Image</a> | 
					<a href="admincontact.php">Admin Contact</a> | 
					<a href="index.php?action=logout">Déconnexion</a> |
					<hr/>
				<?php
				}
			?>
			<a href="index.php">Accueil</a> |
			<a href="image.php">Images</a> |
			<a href="contact.php">Contact</a> |
			<a href="login.php">Login</a> |
			<hr/>
			
		</div>
		<div>