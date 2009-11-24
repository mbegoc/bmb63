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
?>
<h1>Photos</h1>


<div id="gallery">
	<ul>
	
		<li>
			<a href="jquery/gallery/image1.jpg"><img src="jquery/gallery/thumb_image1.jpg" width="72" height="72" alt="" /></a>
		</li>
		<li>
			<a href="jquery/gallery/image2.jpg"><img src="jquery/gallery/thumb_image1.jpg" width="72" height="72" alt="" /></a>
		</li>
	</ul>
</div>

<?php
include("footer.php");

?>