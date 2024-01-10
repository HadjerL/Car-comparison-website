<?php
require_once(__DIR__ . '/../models/model.php');
// require_once('./models/model.php');
class ComparatorModel extends Model{
    public function getVihiculeTypes(){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT * FROM `vehicule_type`";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
    public function getMakesOfType($vehicule_type){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT make_name from (SELECT id_make from (SELECT `id_vehicule_type` FROM `vehicule_type` WHERE type_name = \"$vehicule_type\") vt JOIN vehicule v on vt.id_vehicule_type = v.id_vehicule_type) im JOIN make m on im.id_make = m.id_make";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
    public function getModelsOfMake($make_name){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT model_name FROM (make m JOIN model md on m.id_make = md.id_make) where make_name = \"$make_name\"";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
    public function getGenerationsOfModel($model_name){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT generation_name, year_begin, year_end FROM generation g join (SELECT id_generation FROM model m join model_generation mg on m.id_model = mg.id_model where model_name = \"$model_name\") gi on g.id_generation = gi.id_generation";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
    public function getYearsOfGeneration($generation_name,$year_begin,$year_end){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT year_name FROM v_year y JOIN (SELECT id_v_year FROM generation g JOIN generation_v_year gy on g.id_generation = gy.id_generation_v_year where generation_name = \"$generation_name\" and year_begin = $year_begin and year_end = $year_end) yi on y.id_v_year = yi.id_v_year";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
    public function getVehicule($type_name,$make_name,$model_name,$generation_name,$year_begin,$year_end,$year_name){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT id_vehicule FROM vehicule WHERE id_v_year = (SELECT id_v_year FROM v_year WHERE year_name = $year_name) and id_make = (SELECT id_make FROM make where make_name = \"$make_name\") and id_model = (SELECT id_model FROM model WHERE model_name = \"$model_name\") and id_generation = (SELECT id_generation FROM generation WHERE generation_name = \"$generation_name\" and year_begin = $year_begin and year_end = $year_end) and id_vehicule_type = (SELECT id_vehicule_type FROM vehicule_type WHERE type_name = \"$type_name\")";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
    public function getImageOfVehicule($type_name,$make_name,$model_name,$generation_name,$year_begin,$year_end,$year_name){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT path FROM vehicule_image vi JOIN (SELECT id_vehicule FROM vehicule WHERE id_v_year = (SELECT id_v_year FROM v_year WHERE year_name = \"$year_name\") and id_make = (SELECT id_make FROM make where make_name = \"$make_name\") and id_model = (SELECT id_model FROM model WHERE model_name = \"$model_name\") and id_generation = (SELECT id_generation FROM generation WHERE generation_name = \"$generation_name\" and year_begin = $year_begin and year_end = $year_end) and id_vehicule_type = (SELECT id_vehicule_type FROM vehicule_type WHERE type_name = \"$type_name\") ) v ON vi.id_vehicule = v.id_vehicule";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
}
?>




