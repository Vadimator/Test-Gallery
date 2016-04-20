<?php

class Controller_Main extends Controller {

	private $limit = 3;
    private $method;

	public function __construct()
	{
		$this->model = new Model_main();
		$this->view = new View();
	}


	public function action_sortDateDesc()
	{

	}

	public function action_index()
	{
		$data = $this->model->getImgLimit(0, $this->limit, $this->method);
		$this->view->generate('main_view.php', 'template_view.php', $data, $this->getCount());
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

    

	/*date ASC
	public function action_sortDateAsc($id)
	{
		if($id < 0 || $id >= $this->getCount()) {
			$this->view->generate('404_view.php', 'template_view.php');
		}elseif($id == 0) {
			$this->redirect('main');
		}else {
			$data = $this->model->sortDateAsc($id, $this->limit);
			$this->view->generate('main_view.php', 'template_view.php', $data, $this->getCount());
		}
	}
	
	//date DESC
	public function action_sortDateDesc($id)
	{
		if($id < 0 || $id >= $this->getCount()) {
			$this->view->generate('404_view.php', 'template_view.php');
		}elseif($id == 0) {
			$this->redirect('main');
		}else {
			$data = $this->model->sortDateDesc($id, $this->limit);
			$this->view->generate('main_view.php', 'template_view.php', $data, $this->getCount());
		}
	}

	//file DESC
	public function action_sortSizeDesc($id)
	{
		if($id < 0 || $id >= $this->getCount()) {
			$this->view->generate('404_view.php', 'template_view.php');
		}elseif($id == 0) {
			$this->redirect('main');
		}else {
			$data = $this->model->sortFileDesc($id, $this->limit);
			$this->view->generate('main_view.php', 'template_view.php', $data, $this->getCount());
		}
	}

	//file ASC
	public function action_sortSizeAsc($id)
	{
		if($id < 0 || $id >= $this->getCount()) {
			$this->view->generate('404_view.php', 'template_view.php');
		}elseif($id == 0) {
			$this->redirect('main');
		}else {
			$data = $this->model->sortFileASC($id, $this->limit);
			$this->view->generate('main_view.php', 'template_view.php', $data, $this->getCount());
		}
	}*/

	private function getCount()
	{
		$getCountId = $this->model->getCountArticles();
		$count = ceil($getCountId[0]['size'] / $this->limit);
		return $count;
	}

	public function action_page($id)
	{
		if($id < 0 || $id >= $this->getCount()) {
			$this->view->generate('404_view.php', 'template_view.php');
		}elseif($id == 0) {
			$this->redirect('main');
		}
		else {
			$data = $this->model->getImgLimit($id * 3, $this->limit, $this->method);
			$this->view->generate('main_view.php', 'template_view.php', $data, $this->getCount());
		}

	}
}