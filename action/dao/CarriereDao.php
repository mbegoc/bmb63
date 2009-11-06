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
	}