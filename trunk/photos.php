<?php
/* ---------------------------------------------------
* *
* Projet synthèse : A2009 *
* Fait Par : Benoit Massicotte - Michel Begoc*
* *
*--------------------------------------------------- */
require_once("action/PhotosAction.php");

$action = new PhotosAction();
$action->execute();

include("header.php");


$action->printContenu();



include("footer.php");
