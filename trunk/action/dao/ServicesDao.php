<?php

	require_once("dao.php");
	class ServicesDao extends Dao
	{
		function __construct()
		{
			parent::__construct("services");
			$this->connection = parent::connecter();
			$this->cursor = -1;
		}
		
		public function selectAll($lang){
			parent::select("id, titre, description", null, null, $lang);
		}
		
		public function update($id, $titre, $description){
        	$query = "update ".$this->tableName." set titre=:titre, description=:description where id=:id";
        	$statement = oci_parse($this->connection,$query);
        	
        	oci_bind_by_name($statement , ":titre", $titre);
        	oci_bind_by_name($statement , ":description", $description);
        	oci_bind_by_name($statement , ":id", $id);
        	
        	oci_execute($statement);
		}
	}