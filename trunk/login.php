<?php

	require_once("action/IndexAction.php");

	$action = new IndexAction();
	$action->execute();
	
	require_once("header.php");
	
	include("forms/loginForm.php");
	
	include("footer.php");
