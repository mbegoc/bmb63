<?php

	require_once("dao.php");
	class EquipeDao extends Dao
	{	
		function __construct()
		{
			parent::__construct("equipe");
			$this->connection = parent::connecter();
			$this->cursor = -1;
		} 
		
		public function selectAll($lang){
			parent::select("id, nom, fonction, description, lienphoto", null, null, $lang);
		}
		
		public function update($id, $nom, $fonction, $description, $lienphoto){
        	$query = "update ".$this->tableName." set nom=:nom, fonction=:fonction, description=:description";
        	if(!is_null($lienphoto))
        		$query .= ", lienphoto=:lienphoto";
        	$query .= " where id=:id";
        	$statement = oci_parse($this->connection,$query);
        	
        	
        	oci_bind_by_name($statement , ":nom", $nom);
        	oci_bind_by_name($statement , ":fonction", $fonction);
        	oci_bind_by_name($statement , ":description", $description);
        	if(!is_null($lienphoto))
        		oci_bind_by_name($statement , ":lienphoto", $lienphoto);
        	oci_bind_by_name($statement , ":id", $id);
        	
        	oci_execute($statement);
		}
	}