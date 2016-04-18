<?php

class Controller_add extends Controller {

    public function __construct()
    {
        $this->model = new Model_add();
        $this->view = new View();
    }

    public function action_index()
    {
        $this->view->generate('add_view.php', 'template_view.php');
    }

    public function action_store()
    {
        if(isset($_POST['description'], $_FILES['image']['name']) && !empty($_POST['description']) && !empty($_FILES['image']['name'])) {
            if(($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpg') && ($_FILES['image']['size'] < 1000000)) {
                $title = $this->model->validationText($_POST['description']);
                // Сохраняет файл в папке uploadsFile
                $uploadfile = "uploadsFile/".$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
                //Добавляем в базу данных
                $this->model->insertImage($title, $_FILES['image']['size'], $uploadfile);
                $this->redirect('main');
            }else {
                $errorFile = 'Размер файла не должен привышать 1мб и разрешены только jpg, jpeg, png';
                $this->view->generate('add_view.php', 'template_view.php', $errorFile);
            }
        }else {
            $this->view->generate('add_view.php', 'template_view.php');
        }

    }
}