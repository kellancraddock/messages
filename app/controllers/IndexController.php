<?php
	require_once('../app/models/AuthorsModel.php');
	require_once('../app/models/MessageModel.php');
	
	class IndexController extends Zend_Controller_Action
	{
		public function init() {
			$this->session_alert = new Zend_Session_Namespace('alert');
			$this->AuthorsModel = new AuthorsModel();
			$this->MessageModel = new MessageModel();
		}
		
		public function indexAction()
		{
			$this->view->authors = $this->AuthorsModel->getAuthors();
			$this->view->messages = $this->MessageModel->getMessages();
			$this->view->alert = $this->session_alert;
		}
		
		public function cancelAction()
		{
			$this->session_alert->type = "cancel";
			$this->session_alert->message = "";
			header("Location: /");
		}
	}
	
?>