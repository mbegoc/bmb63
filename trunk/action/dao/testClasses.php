<?php
	require_once("ServicesDao.php");
	$service = new ServicesDao;
	$service->select("*"); // select("id,titre")
	//$service->next();
	$service->update(1,"Description","haha"); //id , colonne , valeur
	$service->deconnecter($service->connection);
