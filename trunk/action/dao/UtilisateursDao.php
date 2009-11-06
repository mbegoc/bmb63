<?php

	require_once("dao.php");
	class UtilisateursDao extends Dao
	{	
			function __construct()
			{
				parent::__construct("utilisateurs");
				$this->connection = parent::connecter();
				$this->cursor = -1;
			} 
	}