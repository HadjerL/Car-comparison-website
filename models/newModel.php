<?php
require_once(__DIR__ . '/../models/model.php');
// require_once('./models/model.php');
class NewsModel extends Model{
    public function getNews(){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT * FROM news";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result; 
    }
    public function getNew($id_new){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT * FROM news where id_new = $id_new";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result; 
    }
}
?>




