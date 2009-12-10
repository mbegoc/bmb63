<?php 
abstract class Dao
{

        protected $tableName;
        public $connection;
		protected $result;
		protected $cursor;
		protected $nbLignes;
        
        function __construct($table)
        {
        	$this->tableName = $table;
        }
		
    	public function connecter() 
    	{
        	return oci_new_connect("a8massibe", "ElfireMe1", "titan");
   		}
    	public function deconnecter() 
    	{
        	oci_close($this->connection);
   		}
   		public function delete($colWhere,$valueWhere,$lang)
   		{
   			$query = "delete from ".$this->tableName." where langue = :bind1 and ".$colWhere." = :bind2";
   			$statement = oci_parse($this->connection , $query);
   			oci_bind_by_name($statement , ":bind1", $lang);
   			oci_bind_by_name($statement , ":bind2", $valueWhere);
   			oci_execute($statement);
   			
   		}
   		public function insert($tabValues)
   		{	
   				$this->select("max(id)",null,null,$tabValues[0]);
   				$res = $this->next();
   				$i = 0;
   				$nbRow = (string)$res[0]+1;
	        	$query = "insert into ".$this->tableName." values (" . $nbRow . ",";
	        	
	        	foreach ($tabValues as $value)
	        	{
	        		$query = $query.":bind".$i.",";
	        		$i++;
	        	}
	        	$query = substr($query,0,-1);
	        	$query = $query.")";
	        	
	        	$statement = oci_parse($this->connection, $query);
	        	
	        	$i = 0;
//	        	var_dump($query);
	        	foreach ($tabValues as $value)
	        	{
	        		oci_bind_by_name($statement , ":bind".$i, $tabValues[$i]);
	        		$i++;
	        	}
	        	oci_execute($statement);
   		}
        public function select($listeColonne, $champWhere = null, $valueWhere = null, $langue=null)
        {
			$query = "SELECT ".$listeColonne." FROM ".$this->tableName." where langue = :lang" ;
			
        	if (isset($champWhere) && isset ($valueWhere))
        	{
        		$query = $query." and ".$champWhere." = :value";
        	}
			
//			var_dump($query);
			$statement = oci_parse($this->connection,$query);
			
			if (isset($champWhere) && isset ($valueWhere))
			{
        		oci_bind_by_name($statement , ":value", $valueWhere);
			}
        	
        	oci_bind_by_name($statement , ":lang", $langue);
        	oci_execute($statement);
        	$this->cursor = -1;
        	$this->nbLignes = oci_fetch_all($statement, $this->result);
//        	var_dump($this->result);
        }
        
        public function update($titre, $colonne , $value, $langue)
        {
        	$query = "update ".$this->tableName." set ".$colonne." = :val where titre = :id and langue = :lang";
        	$statement = oci_parse($this->connection,$query);

        	oci_bind_by_name($statement , ":id", $titre);
        	oci_bind_by_name($statement , ":val", $value);
        	oci_bind_by_name($statement , ":lang", $langue);
        	
        	oci_execute($statement);
        	
        }
        
        public function next()
        {
        	$values = array();
        	$this->cursor++;
		    
        	//il y avait un bug ici: $this->result[$this->cursor] n'existe pas (le premier index est un champ de table)
        	if ($this->cursor < $this->nbLignes)//[$this->cursor]))
        	{
			    foreach ($this->result as $res)
			    {
	        		$values[] = $res[$this->cursor];	
			    }
        	}
        	else
        	{
        		$values = null;
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
//		public function next(){
//			$this->cursor++;
//		}
//		
//		public function hasNext(){
//			if($this->cursor < $this->nbLignes - 1)
//				return true;
//			else
//				return false;
//		}
	}