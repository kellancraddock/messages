<?php
	Class MessageModel extends Zend_Db_Table_Abstract
	{
		private $table = "messages";
		
		function getMessages()
		{
			//Connect to database
			$db = $this->getDefaultAdapter();
			
			//Set arguments to select statement
			$select = "SELECT * FROM $this->table";
		
			//Select from table
			return $db->fetchAssoc($select);
		}

		
		function addMessage($arguments)
		{
			//Connect to database
			$db = $this->getDefaultAdapter();
		
			//Set arguments to Zend insert associative array
			$insertArgs = array(
				'message'        => $arguments[0],
				'author_id'         => $arguments[1],
				);
		
			//Insert into table
			return $db->insert($this->table, $insertArgs);
		}
		
		function deleteMessage($arguments)
		{
			//Connect to database
			$db = $this->getDefaultAdapter();
		
			//Set arguments to select statement
			$delete = "id = '{$arguments[0]}'";
		
			//Delete from table
			return $db->delete($this->table, $delete);
		}
	}
?>