<?php
/* ---------------------------------------------------
* *
* Projet synthèse : A2009 *
* Fait Par : Benoit Massicotte - Michel Begoc*
* *
*--------------------------------------------------- */
require_once("action/IndexAction.php");

$action = new IndexAction();
$action->execute();

include("header.php");

$menu = $action->getLangManager()->getMenu();
echo("<h1>" . $menu[0] . "</h1>");


echo $action->printContenu();

include("footer.php");