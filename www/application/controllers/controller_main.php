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

    public function action_index()
    {
        $data = $this->model->getImgLimit(0, $this->limit);
        $this->view->generate('layouts/header_view.php');
        $this->view->generate('layouts/main/top_main_view.php');
        $this->generateGallery($data);
        $this->generatePagination();
        $this->view->generate('layouts/footer_view.php');
    }

    public function action_sort($method_sort, $id, $type)
    {
        $data = $this->model->getImgLimit($id * 3, $this->limit, $method_sort, $type);
        $this->generateGallery($data);

        ob_start();
        extract($data);
        echo $data;
        $output = ob_get_contents();
        ob_end_clean();

        $url = 'main/sort/' . $method_sort . '/' . $id . '/' . $type;
        $this->addRequest($url, $output);
    }

    /**
     * @param $id
     */
    public function action_delete($id, $pageNumber)
    {
        $this->model->deleteImg($id);
        $data = $this->model->getImgLimit($pageNumber * 3, $this->limit);
        $this->generateGallery($data);
        $this->generatePagination();

        ob_start();
        extract($data);
        echo $data;
        $output = ob_get_contents();
        ob_end_clean();

        $url = 'main/delete/' . $id  . '/' . $pageNumber;
        $this->addRequest($url, $output);
    }

    /**
     * @param $id
     * @param $title
     */
    public function action_edit($id, $title)
    {
        $this->model->updateTitle($id, urldecode($title));
        $data = $this->model->selectOne($id);
        $this->generateGallery($data);

        ob_start();
        extract($data);
        echo $data;
        $output = ob_get_contents();
        ob_end_clean();

        $url = 'main/edit/' . $id . "/" . $title;
        $this->addRequest($url, $output);
    }

    public function action_page($id = 0, $method, $type)
    {
        $data = $this->model->getImgLimit($id * 3, $this->limit, $method, $type);
        $this->generateGallery($data);

        ob_start();
        extract($data);
        echo $data;
        $output = ob_get_contents();
        ob_end_clean();

        $url = 'main/sort/' .$method . '/' . $id . '/' . $type;
        $this->addRequest($url, $output);
    }

    private function addRequest($url, $output)
    {
        $this->model->saveRequest($url, $output);
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

    private function generateGallery($dataOfdb)
    {
        $this->view->generate('layouts/main/gallery/top_gallery_view.php');
        ob_start();
        foreach($dataOfdb as $row) {
            extract($row);
            include 'application/views/main_view.php';
        }
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
        $this->view->generate('layouts/main/gallery/bottom_gallery_view.php');
    }

    private function generatePagination()
    {
        $this->view->generate('layouts/main/pagination/top_pagination_view.php');
        ob_start();
        $count = $this->action_getCount();
        if($count > 1) {
            for ($i = 0; $i < $count; $i++) {
                $data = array('pageNumber' => $i + 1);
                extract($data);
                include 'application/views/layouts/main/bottom_main_view.php';
            }
        }
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
        $this->view->generate('layouts/main/pagination/bottom_pagination_view.php');
    }


}