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
	}