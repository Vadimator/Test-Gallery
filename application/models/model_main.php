<?php

class Model_main extends Model {
    
    public function getImgLimit($start, $limit, $method)
    {   
        
        switch ($method) {
            case 'sortDateASC' :
                return $this->sortDateAsc($start, $limit);
                break;
            case 'sortDateDesc' :
                return $this->sortDateDesc($start, $limit);
                break;
            case 'sortFileDesc' :
                return $this->sortFileDesc($start, $limit);
                break;
            case 'sortFileASC' :
                return $this->sortFileASC($start, $limit);
                break;
            default :
                return $this->sortDateAsc($start, $limit);
                break;
        }
        /* sortDateASC
        if($this->sortDateAsc($start, $limit)) {
            return $this->sortDateAsc($start, $limit);
        }
        */

        /* sortDateDesc
        if($this->sortDateDesc($start, $limit)) {
            return $this->sortDateDesc($start, $limit);
        }
        */

        /* sortFileDesc
        if($this->sortFileDesc($start, $limit)) {
            return $this->sortFileDesc($start, $limit);
        }
        */

        /* sortFileASC
        if($this->sortFileASC($start, $limit)) {
            return $this->sortFileASC($start, $limit);
        }
        */
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

    //sort ASC date
    public function sortDateAsc($offset, $limit)
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT * FROM pictures ORDER BY uploadDate ASC LIMIT :offset, :limit");
        $sth->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $sth->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    //sort DESC date
    public function sortDateDesc($offset, $limit)
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT * FROM pictures ORDER BY uploadDate DESC LIMIT :offset, :limit");
        $sth->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $sth->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    //sort DESC file
    public function sortFileDesc($offset, $limit)
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT * FROM pictures ORDER BY sizeFile DESC LIMIT :offset, :limit");
        $sth->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $sth->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    //sort ASC file
    public function sortFileASC($offset, $limit)
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT * FROM pictures ORDER BY sizeFile ASC LIMIT :offset, :limit");
        $sth->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $sth->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
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