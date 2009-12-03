<?php
	require_once("ServicesDao.php");
	require_once("CarriereDao.php");
	
	$service = new ServicesDao; //connection automatique
	
	$service->select("*"); // select("id,titre")
	$id = $service->next();
	echo $id[2];
	$service->next();
	$service->next();
	$id = $service->previous();
	echo $id[2];
	
	var_dump($id);
	
	//$service->update(3,"Description","haha"); //id , colonne , valeur
	
	//$service->insert(array(75,"fr","titre","des"));
	
	//$service->deconnecter();
	
	
