<?php
	require_once("ServicesDao.php");
	$service = new ServicesDao;
	//$service->select("*"); // select("id,titre")
	//$service->next();
	//$service->update(1,"Description","haha"); //id , colonne , valeur
	
	//$valueTable = array(15,"titre","fr","des");
	//$service->insert($valueTable);
	
	$service->deconnecter($service->connection);
