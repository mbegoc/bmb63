<?php
/* ---------------------------------------------------
* *
* Projet synthèse : A2009 *
* Fait Par : Benoit Massicotte - Michel Begoc*
* *
*--------------------------------------------------- */
require_once("action/IndexAction.php");
require_once("action/AdminIndexAction.php");

$adminAction = new AdminIndexAction();
$action = new IndexAction();
$langManager = $action->execute();

include("header.php");

if (isset($_POST["content"]))
{
	$adminAction->setContenu($_POST["content"]);
}


$menu = $langManager->getMenu();
echo("<h1>" . $menu[0] . "</h1>");

?>

	<?php
	
	if ($_POST["apercu"] == "apercu")
	{
	?>
		<div>
			 <?php echo $action->getContenu(); ?>
		</div>
	<?php 
	}
		else
		{
			include("forms/commonForm.php");
		}
	
	
	
include("footer.php");