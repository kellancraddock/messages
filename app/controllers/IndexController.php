<?php
	require_once('../app/models/AuthorsModel.php');
	require_once('../app/models/MessageModel.php');
	
	class IndexController extends Zend_Controller_Action
	{
		public function init() {
			$this->AuthorsModel = new AuthorsModel();
			$this->MessageModel = new MessageModel();
			
			$this->view->authors = $this->AuthorsModel->getAuthors();
			$this->view->messages = $this->MessageModel->getMessages();
		}
		
		public function indexAction()
		{

		}
		
		public function addauthorAction()
		{
			$arguments = array($_POST['first_name'], $_POST['last_name']);
			
			$this->AuthorsModel->addAuthor($arguments);
			
			$this->view->authors = $this->AuthorsModel->getAuthors();
			
			$this->view->alert = var_dump($response);
		}
		
		public function addmessageAction()
		{
			$arguments = array($_POST['message'], $_POST['author']);
			
			$this->MessageModel->addMessage($arguments);
			
			$this->view->messages = $this->MessageModel->getMessages();

		}
		
		public function deletemessageAction()
		{
			$arguments = array($this->_request->getParam('id'));
			
			$this->MessageModel->deleteMessage($arguments);
			
			$this->view->messages = $this->MessageModel->getMessages();

		}
		
		public function voteupAction()
		{
			//pass in defalut info (messages etc)
		}
	}
	
?>