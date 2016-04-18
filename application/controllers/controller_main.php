<?php

class Controller_Main extends Controller {

	public function __construct()
	{
		$this->model = new Model_main();
		$this->view = new View();
	}
	
	public function action_index()
	{
		$data = $this->model->getImg();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	public function action_delete($id)
	{
		$this->model->deleteImg($id);
		$this->redirect('main');
	}

	public function action_edit($id, $title)
	{
		$this->model->updateTitle($id, urldecode($title));
		$this->redirect('main');
	}
	
	public function action_sortDate()
	{
		$data = $this->model->sortDate();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	public function action_sortSize()
	{
		$data = $this->model->sortSize();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
}