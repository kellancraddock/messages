<?php
	Class MessageModel extends Zend_Db_Table_Abstract
	{
		private $table = "messages";
		
		function getMessage($arguments)
		{
			//Connect to database
			$db = $this->getDefaultAdapter();
			
			$select = "SELECT m.id as message_id, m.message as message, a.first_name as first_name, a.last_name as last_name FROM $this->table as m, authors as a WHERE m.id = '{$arguments[0]}'";
			
			//Set arguments to select statement
			//$select = "SELECT * FROM $this->table WHERE id = '{$arguments[0]}'";
		
			//Select from table
			return $db->fetchAssoc($select);
		}
		
		function getMessages()
		{
			//Connect to database
			$db = $this->getDefaultAdapter();
			
			$select = "SELECT m.id as message_id, m.message as message, a.first_name as first_name, a.last_name as last_name FROM $this->table as m, authors as a WHERE m.author_id = a.id";
		
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
		
		function updateMessage($arguments)
		{
			//Connect to database
			$db = $this->getDefaultAdapter();
		
			//Set arguments to Zend insert associative array
			$insertArgs = array(
				'message'        => $arguments[1]
				);
				
			$where[] = "id = '{$arguments[0]}'";
			
			//Update
			return $db->update($this->table, $insertArgs, $where);
		}
	}
?>