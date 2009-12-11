<?php

	require_once("dao.php");
	class PhotoDao extends Dao
	{	
			function __construct()
			{
				parent::__construct("photo");
				$this->connection = parent::connecter();
				$this->cursor = -1;
			} 
			public function selectAll($lang)
			{
				parent::select("id, nom, description, lien", null, null, $lang);
			}
			public function update($id, $nom, $description , $lien)
			{
	        	$query = "update ".$this->tableName." set nom=:nom, description=:description, lien=:lien where id=:id";
	        	$statement = oci_parse($this->connection,$query);
	        	
	        	oci_bind_by_name($statement , ":nom", $nom);
	        	oci_bind_by_name($statement , ":description", $description);
	        	oci_bind_by_name($statement , ":id", $id);
	        	oci_bind_by_name($statement , ":lien", $lien);
	        	
	        	oci_execute($statement);
			}
	}