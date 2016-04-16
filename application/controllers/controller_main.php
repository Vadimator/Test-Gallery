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
	
}