<?php
	Class AuthorsModel extends Zend_Db_Table_Abstract
	{
		private $table = "authors";
		
		function getAuthor($arguments)
		{
			//Connect to database
			$db = $this->getDefaultAdapter();
			
			//Set arguments to select statement
			$select = "SELECT * FROM $this->table WHERE id = '{$arguments[0]}'";
		
			//Select from table
			return $db->fetchAssoc($select);
		}

		function getAuthors()
		{
			//Connect to database
			$db = $this->getDefaultAdapter();
			
			//Set arguments to select statement
			$select = "SELECT * FROM $this->table";
		
			//Select from table
			return $db->fetchAssoc($select);
		}
		
		function addAuthor($arguments)
		{
			//Connect to database
			$db = $this->getDefaultAdapter();
		
			//Set arguments to Zend insert associative array
			$insertArgs = array(
				'first_name'        => $arguments[0],
				'last_name'         => $arguments[1],
				);
		
			//Insert into table
			return $db->insert($this->table, $insertArgs);
		}
	}
?>