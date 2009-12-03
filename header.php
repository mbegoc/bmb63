<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/template.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="jquery/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="jquery/js/jquery.lightbox-0.5.js"></script>
		<link rel="stylesheet" type="text/css" href="jquery/css/jquery.lightbox-0.5.css" media="screen" />
		<title><?php echo($action->getLangManager()->getTitle()); ?></title>
		<script type="text/javascript">
    		$(function() {
        	$('#gallery a').lightBox();
    		});
    	</script>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	</head>
	<body>
	<div id="bannerFrame">
		<div id="banner" class="center">
			<div id="logo">
			</div>
		</div>
	</div>
	<div id="menuFrame">
		<div id="menu" class="center">
			<?php $menu = $action->getLangManager()->getMenu(); ?>
			<ul>
				<li>
					<a href='index.php'><?php echo($menu[0]); ?></a>
				</li>
				<li>
					<a href='compagnie.php'><?php echo($menu[1]); ?></a>
					<ul>
						<li>
							<a href='historique.php'><?php echo($menu[2]); ?></a>
						</li>
						<li>
							<a href='equipe.php'><?php echo($menu[3]); ?></a>
						</li>
					</ul>
				</li>
				<li>
					<a href='carrieres.php'><?php echo($menu[4]); ?></a>
				</li>
				<li>
					<a href='photos.php'><?php echo($menu[5]); ?></a>
				</li>
				<li>
					<a href='services.php'><?php echo($menu[6]); ?></a>
				</li>
				<li>
					<a href='contact.php'><?php echo($menu[7]); ?></a>
				</li>
			</ul>
		</div>
	</div>
	<div id='contentSection' class='center'>