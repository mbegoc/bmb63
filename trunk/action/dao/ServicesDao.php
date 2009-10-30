<?php

	require_once("dao.php");
	class ServicesDao extends dao
	{
		
			
	        public function getResultSet()
	        {
	        	parent::connecter();
	        }
	        public function next()
	        {
	        	print "next";
	        }
	        public function previous()
	        {
	        	print "previous";
	        }
	        public function select()
	        {
	        	print "select";
	        }
	        public function modification()
	        {
	        	print "modification";
	        }
	        
	}