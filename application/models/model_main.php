<?php

class Model_main extends Model {
    
    public function getImg()
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT * FROM pictures");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function deleteImg($id)
    {
        $db = $this->getConnect();
        $sql = "DELETE FROM pictures WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function sortDate()
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT * FROM pictures ORDER BY uploadDate");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function sortSize()
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT * FROM pictures ORDER BY sizeFile");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }


    private function getConnect()
    {
        return new PDO('mysql:host=' . Database::DB_SERVER .';dbname=' . Database::DB_NAME . '', Database::DB_USER, Database::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }


}