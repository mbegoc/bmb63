<?php
/* ---------------------------------------------------
* *
* Projet synthèse : A2009 *
* Fait Par : Benoit Massicotte - Michel Begoc*
* *
*--------------------------------------------------- */
require_once("action/PhotosAction.php");

$action = new PhotosAction();
$langManager = $action->execute();

include("header.php");
?>
<h1>Photos</h1>
<?php
include("footer.php");

?>