<?php

	require_once("dao.php");
	class CarriereDao extends Dao
	{	
		function __construct()
		{
			parent::__construct("carriere");
			$this->connection = parent::connecter();
			$this->cursor = -1;
		}
		
		public function selectAll($lang){
			parent::select("id, intitule, description, dateembauche", null, null, $lang);
		}
		
		public function update($id, $titre, $description, $dateembauche){
        	$query = "update ".$this->tableName." set intitule=:intitule, description=:description, dateembauche=:dateembauche where id=:id";
        	$statement = oci_parse($this->connection,$query);
        	
        	oci_bind_by_name($statement , ":intitule", $titre);
        	oci_bind_by_name($statement , ":description", $description);
        	oci_bind_by_name($statement , ":dateembauche", $dateembauche);
        	oci_bind_by_name($statement , ":id", $id);
        	
        	oci_execute($statement);
		}
	}