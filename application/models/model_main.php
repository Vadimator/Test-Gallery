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

    public function getImgLimit($start, $limit)
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT * FROM pictures LIMIT :offset, :limit");
        $sth->bindValue(':offset', (int) $start, PDO::PARAM_INT);
        $sth->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function getCountArticles()
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT COUNT(id) as size FROM pictures");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
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

    public function sortDate($sort='ASC', $offset, $limit)
    {
        $db = $this->getConnect();

        if($sort == 'DESC') {
            $sth = $db->prepare("SELECT * FROM pictures ORDER BY uploadDate DESC LIMIT :offset, :limit");
        }else {
            $sth = $db->prepare("SELECT * FROM pictures ORDER BY uploadDate ASC LIMIT :offset, :limit");
        }
        $sth->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $sth->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function sortSize($sort='ASC')
    {
        $db = $this->getConnect();
        if($sort == 'DESC') {
            $sth = $db->prepare("SELECT * FROM pictures ORDER BY sizeFile DESC");
        }else {
            $sth = $db->prepare("SELECT * FROM pictures ORDER BY sizeFile ASC");
        }
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function updateTitle($id, $title)
    {
        $db = $this->getConnect();
        $sql = "UPDATE pictures SET title = :title  WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteSpace($str)
    {
        return preg_replace('/%20/', " ", $str);
    }

    private function getConnect()
    {
        return new PDO('mysql:host=' . Database::DB_SERVER .';dbname=' . Database::DB_NAME . '', Database::DB_USER, Database::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }


}