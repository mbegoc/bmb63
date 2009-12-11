<?php
/* ---------------------------------------------------
* *
* Projet synthèse : A2009 *
* Fait Par : Benoit Massicotte - Michel Begoc*
* *
*--------------------------------------------------- */
require_once("action/ContactAction.php");
$action = new ContactAction();
$action->execute();

include("header.php");

$menu = $action->getLangManager()->getMenu();
echo("<h1>" . $menu[7] . "</h1>");

?>
<div class = "map">
	<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.ca/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=cegep+vieux+montreal&amp;sll=49.891235,-97.15369&amp;sspn=39.643899,79.013672&amp;ie=UTF8&amp;hq=cegep+vieux+montreal&amp;hnear=&amp;ll=49.891235,-97.15369&amp;spn=39.643899,79.013672&amp;output=embed"></iframe><br /><small><a href="http://maps.google.ca/maps?f=q&amp;source=embed&amp;hl=fr&amp;geocode=&amp;q=cegep+vieux+montreal&amp;sll=49.891235,-97.15369&amp;sspn=39.643899,79.013672&amp;ie=UTF8&amp;hq=cegep+vieux+montreal&amp;hnear=&amp;ll=49.891235,-97.15369&amp;spn=39.643899,79.013672" style="color:#0000FF;text-align:left">Agrandir le plan</a></small>
</div>

<div class = "adresse">
	<?php echo $action->printContenu(); ?>
</div>

<?php 
include("footer.php");