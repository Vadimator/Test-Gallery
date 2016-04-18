<?php

class Model_add extends Model {
    
    public function validationText($text)
    {
        return trim(htmlspecialchars($text));
    }

    public function insertImage($title, $sizeFile, $img)
    {
        $db = $this->getConnect();

        $stmt = $db->prepare("INSERT INTO pictures (title, uploadDate, sizeFile, img) VALUES (:title, :uploadDate, :sizeFile, :img)");
        $stmt->bindParam(':title', $titleAdd);
        $stmt->bindParam(':uploadDate', $uploadDateAdd);
        $stmt->bindParam(':sizeFile', $sizeFileAdd);
        $stmt->bindParam(':img', $imgAdd);

        $titleAdd = $title;
        $uploadDateAdd = date("Y-m-d H:i:s");
        $sizeFileAdd = $sizeFile;
        $imgAdd = $img;
        $stmt->execute();

        $db = NULL;
    }

    private function getConnect()
    {
        return new PDO('mysql:host=' . Database::DB_SERVER .';dbname=' . Database::DB_NAME . '', Database::DB_USER, Database::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }


}