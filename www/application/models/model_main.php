<?php

/**
 * Class Model_main
 */
class Model_main extends Model {

    /**
     * @param $start
     * @param $limit
     * @param $method
     * @return array
     */
    public function getImgLimit($start, $limit, $method='sortDateASC')
    {
        switch ($method) {
            case 'sortDateASC' :
                return $this->sort("uploadDate", "ASC", $start, $limit);
                break;
            case 'sortDateDesc' :
                return $this->sort("uploadDate", "DESC", $start, $limit);
                break;
            case 'sortFileDesc' :
                return $this->sort("sizeFile", "DESC", $start, $limit);
                break;
            case 'sortFileASC' :
                return $this->sort("sizeFile", "ASC", $start, $limit);
                break;
        }
    }

    /**
     * @return array
     */
    public function getCountArticles()
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT COUNT(id) as size FROM pictures");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * @param $id
     */
    public function deleteImg($id)
    {
        $db = $this->getConnect();
        $sql = "DELETE FROM pictures WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    private function sort($name, $method, $offset, $limit)
    {
        $db = $this->getConnect();
        $sth = $db->prepare("SELECT * FROM pictures ORDER BY $name $method LIMIT :offset, :limit");
        $sth->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $sth->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    /**
     * @param $id
     * @param $title
     */
    public function updateTitle($id, $title)
    {
        $db = $this->getConnect();
        $sql = "UPDATE pictures SET title = :title  WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * @return PDO
     */
    private function getConnect()
    {
        return new PDO('mysql:host=' . Database::DB_SERVER .';dbname=' . Database::DB_NAME . '', Database::DB_USER, Database::DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }


}