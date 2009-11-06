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
	}