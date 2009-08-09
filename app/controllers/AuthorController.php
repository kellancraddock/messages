<?php
	require_once('../app/models/AuthorsModel.php');
	require_once('../app/models/MessageModel.php');
	
	class AuthorController extends Zend_Controller_Action
	{
		public function init() {
			$this->session_alert = new Zend_Session_Namespace('alert');
			$this->AuthorsModel = new AuthorsModel();
			$this->MessagesModel = new MessageModel();
		}
		
		public function indexAction()
		{
			header("Location: /");
		}
		
		public function addauthorAction()
		{
			$arguments = array($_POST['first_name'], $_POST['last_name']);
			$this->AuthorsModel->addAuthor($arguments);
			$this->session_alert->type = "success";
			$this->session_alert->message = "Author Added!";
			header("Location: /");
		}
		
		public function editauthorAction()
		{
			$arguments = array($_POST['edit_author']);
			$this->view->author = $this->AuthorsModel->getAuthor($arguments);
			$this->_helper->layout->setLayout('edit');
		
		}
		
		public function updateauthorAction()
		{
			$arguments = array( $_POST['id'], $_POST['first_name'], $_POST['last_name']);
			$this->AuthorsModel->updateAuthor($arguments);
			$this->session_alert->type = "success";
			$this->session_alert->message = "Author Edited!";
			header("Location: /");
		
		}
		
		public function deleteauthorAction()
		{
			$arguments = array($this->_request->getParam('id'));
			$this->AuthorsModel->deleteAuthor($arguments);
			$this->MessagesModel->deleteMessages($arguments);
			$this->session_alert->type = "success";
			$this->session_alert->message = "Author Deleted!";
			header("Location: /");

		}
		
	}
?>