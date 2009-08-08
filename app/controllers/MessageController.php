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
		
		public function editmessageAction()
		{
			$arguments = array($this->_request->getParam('id'));
			$this->view->message = $this->MessageModel->getMessage($arguments);
			$this->_helper->layout->setLayout('edit');
		
		}
		
		public function updatemessageAction()
		{
			$arguments = array( $_POST['id'], $_POST['message']);
			$this->MessageModel->updateMessage($arguments);
			$this->session_alert->type = "success";
			$this->session_alert->message = "Message Edited!";
			header("Location: /");
		
		}
	}
?>