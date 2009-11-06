<?php

	require_once("dao.php");
	class ContenuStandard extends Dao
	{	
			function __construct()
			{
				parent::__construct("contenustandard");
				$this->connection = parent::connecter();
				$this->cursor = -1;
			} 
	}