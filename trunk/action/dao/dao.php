<?php 
abstract class Dao
{
        abstract protected function getResultSet();
        abstract protected function next();
        abstract protected function previous();
        abstract protected function select();
        abstract protected function modification();
        
		protected $resultSet = "mon resultset";
		
        public function __construct() 
        {
         	$this->connecter();
        }
    	public function connecter() 
    	{
        	print "connect";
   		}
    	public function deconnecter() 
    	{
        	print "deconnect";
   		}
}