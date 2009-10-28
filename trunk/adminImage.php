<?php
	require_once("action/AdminImageAction.php");

	$action = new AdminImageAction();
	$action->execute();
	
	include("header.php");
?>
	<h1>Admin Image</h1>
	<form action="AdminImageAction.php" method="post">
		 <span> Image 1 </span> <input type="checkbox" name="image1"> <br/>
		 <span> Image 2 </span> <input type= "checkbox" name="image2"> <br/>
		 <input type="submit" value="Submit">
	</form>
<?php
	include("footer.php");
?>