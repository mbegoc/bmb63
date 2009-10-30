<?php
/* ---------------------------------------------------
* *
* Projet synthèse : A2009 *
* Fait Par : Benoit Massicotte - Michel Begoc*
* *
*--------------------------------------------------- */
require_once("action/EquipeAction.php");
$action = new EquipeAction();
$langManager = $action->execute();

include("header.php");

include("footer.php");

?>