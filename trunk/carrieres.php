<?php
/* ---------------------------------------------------
* *
* Projet synthèse : A2009 *
* Fait Par : Benoit Massicotte - Michel Begoc*
* *
*--------------------------------------------------- */
require_once("action/CarriereAction.php");

$action = new CarriereAction();
$action->execute();

include("header.php");

$menu = $action->getLangManager()->getMenu();
echo("<h1>".$menu[4]."</h1>");

$action->printContenu();

include("footer.php");