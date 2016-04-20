<?php

/**
 * Class Model_add
 */
class Model_add extends Model {

    /**
     * @param $text
     * @return string
     */
    public function validationText($text)
    {
        return trim(htmlspecialchars($text));
    }

    /**
     * @param $title
     * @param $sizeFile
     * @param $img
     */
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

    /**
     * @param $img
     * @return mixed
     */
    public function deleteSpaceOnImage($img)
    {
        return str_replace(' ', '', $img);
    }


    /**
     * @return PDO
     */
    private function getConnect()
    {
        return new PDO('mysql:host=' . Database::DB_SERVER .';dbname=' . Database::DB_NAME . '', Database::DB_USER, Database::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }


}