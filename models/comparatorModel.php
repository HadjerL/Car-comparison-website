<?php
require_once('./models/model.php');
class ComparatorModel extends Model{
    public function getVihiculeTypes(){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT * FROM `vehicule_type`";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
}
?>