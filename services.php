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
?>
<h1>Services</h1>
<?php
include("footer.php");
?>