<?php
/* ---------------------------------------------------
* *
* Projet synthèse : A2009 *
* Fait Par : Benoit Massicotte - Michel Begoc*
* *
*--------------------------------------------------- */
require_once("action/HistoriqueAction.php");
$action = new HistoriqueAction();
$action->execute();

include("header.php");

$menu = $action->getLangManager()->getMenu();
echo("<h1>" . $menu[2] . "</h1>");


echo $action->printContenu();

include("footer.php");