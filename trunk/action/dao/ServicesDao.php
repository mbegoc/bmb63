<?php

	require_once("dao.php");
	class ServicesDao extends Dao
	{
			public $connection;
			private $result;
			private $cursor;
			
			
			function __construct()
			{
				$this->connection = parent::connecter();
				$this->cursor = -1;
			}
	        public function next()
	        {
	        	$values = array();
	        	$this->cursor++;
	        	//var_dump($this->result);
			    
			    foreach ($this->result as $res)
			    {
	        		$values[] = $res[$this->cursor];	
			    }
			    return $values;
	        }
	        public function previous()
	        {
	        	$values = array();
	        	$this->cursor--;
	        	
	        	foreach ($this->result as $res)
			    {
	        		$values[] = $res[$this->cursor];	
			    }
			    return $values;
	        }
	        public function update($id, $colonne , $value)
	        {
	        	$query = "update services set ".$colonne." = :val where id = :id";
	        	$statement = oci_parse($this->connection,$query);
	        	
	        	oci_bind_by_name($statement , ":id", $id);
	        	oci_bind_by_name($statement , ":val", $value);
	        	
	        	oci_execute($statement);
	        }
	        
	        public function select($listeColonne)
	        {
				$query = "SELECT ".$listeColonne." FROM services";
	        	$statement = oci_parse($this->connection,$query);
	        	oci_execute($statement);
	        	$this->cursor = -1;
	        	oci_fetch_all($statement, $this->result);
				
	        }
	        public function insert($tabValues)
	        {
	        	$i = 0;
	        	$query = "insert into services values (";
	        	
	        	
	        	foreach ($tabValues as $value)
	        	{
	        		$query = $query.":bind".$i.",";
	        		$i++;
	        	}
	        	$query = substr($query,0,-1);
	        	$query = $query.")";
	        	
	        	$statement = oci_parse($this->connection, $query);
	        	
	        	$i = 0;
	        	
	        	foreach ($tabValues as $value)
	        	{
	        		echo "entre";
	        		oci_bind_by_name($statement , ":bind".$i, $tabValues[$i]);
	        		$i++;
	        	}
	        	
	        	oci_execute($statement);
	        		        	
	        }
	        
	        
		

	        
	}