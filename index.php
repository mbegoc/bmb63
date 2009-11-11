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
$action->execute();

include("header.php");

if (isset($_POST["content"]))
{
	$adminAction->setContenu($_POST["content"]);
}


$menu = $action->getLangManager()->getMenu();
echo("<h1>" . $menu[0] . "</h1>");


echo $action->getContenu();

include("footer.php");