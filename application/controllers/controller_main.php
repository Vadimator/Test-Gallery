<?php
session_start();

/**
 * Class Controller_Main
 */
class Controller_Main extends Controller {

	/**
	 * @var int
     */
	private $limit = 3;

	/**
	 * Controller_Main constructor.
     */
	public function __construct()
	{
		$this->model = new Model_main();
		$this->view = new View();
	}

	/**
	 *
     */
	public function action_sortDateDesc()
	{
        $_SESSION['method'] = 'sortDateDesc';
        $this->redirect('main');
	}

	/**
	 *
     */
	public function action_sortDateAsc()
    {
        $_SESSION['method'] = 'sortDateASC';
        $this->redirect('main');
    }

	/**
	 *
     */
	public function action_sortFileDesc()
    {
        $_SESSION['method'] = 'sortFileDesc';
        $this->redirect('main');
    }

	/**
	 *
     */
	public function action_sortFileAsc()
    {
        $_SESSION['method'] = 'sortFileASC';
        $this->redirect('main');
    }

	/**
	 *
     */
	public function action_index()
	{
		$data = $this->model->getImgLimit(0, $this->limit, $_SESSION['method']);
		$this->view->generate('main_view.php', 'template_view.php', $data, $this->getCount());
	}

	/**
	 * @param $id
     */
	public function action_delete($id)
	{
		$this->model->deleteImg($id);
		$this->redirect('main');
	}

	/**
	 * @param $id
	 * @param $title
     */
	public function action_edit($id, $title)
	{
		$this->model->updateTitle($id, urldecode($title));
		$this->redirect('main');
	}

	/**
	 * @return float
     */
	private function getCount()
	{
		$getCountId = $this->model->getCountArticles();
		$count = ceil($getCountId[0]['size'] / $this->limit);
		return $count;
	}

	/**
	 * @param $id
     */
	public function action_page($id)
	{
		if($id < 0 || $id >= $this->getCount()) {
			$this->view->generate('404_view.php', 'template_view.php');
		}elseif($id == 0) {
			$this->redirect('main');
		}
		else {
			$data = $this->model->getImgLimit($id * 3, $this->limit, $_SESSION['method']);
			$this->view->generate('main_view.php', 'template_view.php', $data, $this->getCount());
		}

	}
}