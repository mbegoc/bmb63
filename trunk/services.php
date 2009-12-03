<?php
/* ---------------------------------------------------
* *
* Projet synthèse : A2009 *
* Fait Par : Benoit Massicotte - Michel Begoc*
* *
*--------------------------------------------------- */
require_once("action/ServicesAction.php");

$action = new ServicesAction();
$action->execute();

include("header.php");
$menu = $action->getLangManager()->getMenu();

echo("<h1>".$menu[6]."</h1>");

$action->printContenu();
include("footer.php");
