<?php

class Controller_Main extends Controller {

	public function __construct()
	{
		$this->model = new Model_main();
		$this->view = new View();
	}
	
	public function action_index()
	{
		$limit = 3;
		$getCountId = $this->model->getCountArticles();
		$count = ceil($getCountId[0]['size'] / $limit);
		
		$data = $this->model->getImgLimit(0, 3);
		$this->view->generate('main_view.php', 'template_view.php', $data, $count);
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
	
	public function action_sortDate($sort , $id)
	{
		$limit = 3;
		$getCountId = $this->model->getCountArticles();
		$count = ceil($getCountId[0]['size'] / $limit);

		if($id < 0 || $id >= $count) {
			$this->view->generate('404_view.php', 'template_view.php');
		}elseif($id == 0) {
			$this->redirect('main');
		}else {
			$data = $this->model->sortDate($sort, $id, 3);
			$this->view->generate('main_view.php', 'template_view.php', $data, $count);
		}
	}

	public function action_sortSize($sort)
	{
		$data = $this->model->sortSize($sort);
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	public function action_page($id)
	{
		$limit = 3;
		$getCountId = $this->model->getCountArticles();
		$count = ceil($getCountId[0]['size'] / $limit);

		if($id < 0 || $id >= $count) {
			$this->view->generate('404_view.php', 'template_view.php');
		}elseif($id == 0) {
			$this->redirect('main');
		}
		else {
			$data = $this->model->getImgLimit($id * 3, $limit);
			$this->view->generate('main_view.php', 'template_view.php', $data, $count);
		}

	}
}