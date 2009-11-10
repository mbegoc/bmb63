<?php
/* ---------------------------------------------------
* *
* Projet synthèse : A2009 *
* Fait Par : Benoit Massicotte - Michel Begoc*
* *
*--------------------------------------------------- */
require_once("action/IndexAction.php");
$action = new IndexAction();
$langManager = $action->execute();

include("header.php");

$menu = $langManager->getMenu();
echo("<h1>" . $menu[0] . "</h1>");

?>
	<div>
		<?php echo $action->getContenu(); ?>
	</div>

<?php
include("footer.php");