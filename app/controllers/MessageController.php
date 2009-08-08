<?php
	require_once('../app/models/MessageModel.php');
	
	class MessageController extends Zend_Controller_Action
	{
		public function init() 
		{
			$this->session_alert = new Zend_Session_Namespace('alert');
			$this->MessageModel = new MessageModel();
		}
		
		public function indexAction()
		{
			header("Location: /");
		}
		
		public function addmessageAction()
		{
			$arguments = array($_POST['message'], $_POST['author']);
			
			$this->MessageModel->addMessage($arguments);
			
			$this->session_alert->type = "success";
			$this->session_alert->message = "Message Added!";
			header("Location: /");

		}
		
		public function deletemessageAction()
		{
			$arguments = array($this->_request->getParam('id'));
			
			$this->MessageModel->deleteMessage($arguments);
			
			$this->session_alert->type = "success";
			$this->session_alert->message = "Message Deleted!";
			header("Location: /");

		}
	}
?>