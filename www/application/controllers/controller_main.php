<?php

/**
 * Class Controller_Main
 */
class Controller_Main extends Controller
{

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

    public function action_sort($method_sort, $id, $type)
    {
        $data = $this->model->getImgLimit($id * 3, $this->limit, $method_sort, $type);
        $this->view->generate('main_view.php', $data, $this->action_getCount());
    }

    public function action_index()
    {
        $data = $this->model->getImgLimit(0, $this->limit);
        $this->view->generate('layouts/header_view.php');
        $this->view->generate('layouts/main/top_main_view.php');
        $this->view->generate('main_view.php', $data);
        $this->view->generate('layouts/main/bottom_main_view.php', null, $this->action_getCount());
        $this->view->generate('layouts/footer_view.php');
    }

    /**
     * @param $id
     */
    public function action_delete($id, $pageNumber)
    {
        $this->model->deleteImg($id);
        $data = $this->model->getImgLimit($pageNumber * 3, $this->limit);
        $getCountId = $this->model->getCountArticles();
        $count = ceil($getCountId[0]['size'] / $this->limit);
        $this->view->generate('main_view.php', $data, $count);
        $this->view->generate('layouts/main/bottom_main_view.php', null, $count);
    }

    /**
     * @param $id
     * @param $title
     */
    public function action_edit($id, $title)
    {
        $this->model->updateTitle($id, urldecode($title));
        $data = $this->model->selectOne($id);
        $this->view->generate('main_view.php', $data);
    }

    /**
     * @return float
     */
    private function action_getCount()
    {
        $getCountId = $this->model->getCountArticles();
        $count = ceil($getCountId[0]['size'] / $this->limit);
        return $count;
    }

    /**
     * @param $id
     */
    public function action_page($id = 0, $method, $type)
    {
        $data = $this->model->getImgLimit($id * 3, $this->limit, $method, $type);
        $this->view->generate('main_view.php', $data, $this->action_getCount());
    }
}