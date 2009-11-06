<?php

	require_once("dao.php");
	class PhotoDao extends Dao
	{	
			function __construct()
			{
				parent::__construct("photo");
				$this->connection = parent::connecter();
				$this->cursor = -1;
			} 
	}