<?php
	require_once('../app/models/AuthorsModel.php');
	
	class AuthorController extends Zend_Controller_Action
	{
		public function init() {
			$this->AuthorsModel = new AuthorsModel();
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
	}
?>