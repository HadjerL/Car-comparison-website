<?php
require_once(__DIR__ . '/../models/model.php');
// require_once('./models/model.php');
class MakesModel extends Model{
    public function getMakes(){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT * FROM make";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
    public function getMakeinfo($id_make){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT make_name , origin_country , registered_office FROM make where id_make= $id_make and deleted = \"no\"";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result; 
    }
    public function getPrincipleMakes(){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT id_make, make_name, average_rating FROM (SELECT id_make as make, AVG(rating) as average_rating FROM ratingmake GROUP BY id_make) r JOIN make m on r.make = m.id_make ORDER by average_rating DESC limit 4";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
    public function getPrincipleModelsOfMake($id_make){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT id_model, model_name, average_rating FROM (SELECT id_model as model, AVG(rating) as average_rating FROM ratingmodel GROUP BY id_model) r JOIN model m on r.model = m.id_model where id_make=$id_make and m.deleted = \"no\" ORDER by average_rating DESC limit 3";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result; 
    }
    public function getVehiculesOfMake($id_make){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT id_vehicule, make_name, model_name, generation_name, year_begin, year_end, year_name FROM (SELECT id_vehicule, make_name, model_name, generation_name, year_begin, year_end,id_v_year FROM (SELECT id_vehicule , make_name, model_name, id_generation, id_v_year FROM (SELECT id_vehicule , make_name, id_model,id_generation,id_v_year FROM (SELECT id_vehicule,id_model,id_make,id_generation,id_v_year FROM (SELECT id_vehicule as vehicule , AVG(rating) as average_rating FROM ratingvehicule GROUP BY id_vehicule) r JOIN vehicule v on r.vehicule = v.id_vehicule where deleted = \"no\" and id_make = $id_make) v JOIN make m on v.id_make = m.id_make where deleted = \"no\") v JOIN model m ON v.id_model = m.id_model where deleted = \"no\") v JOIN generation g on v.id_generation = g.id_generation where deleted = \"no\") v JOIN v_year y on v.id_v_year = y.id_v_year where deleted =\"no\"";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result; 
    }
    public function getPrincipleVehiculesOfMake($id_make){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT id_vehicule, make_name, model_name, generation_name, year_begin, year_end, year_name FROM (SELECT id_vehicule, make_name, model_name, generation_name, year_begin, year_end,id_v_year FROM (SELECT id_vehicule , make_name, model_name, id_generation, id_v_year FROM (SELECT id_vehicule , make_name, id_model,id_generation,id_v_year FROM (SELECT id_vehicule,id_model,id_make,id_generation,id_v_year FROM (SELECT id_vehicule as vehicule , AVG(rating) as average_rating FROM ratingvehicule GROUP BY id_vehicule) r JOIN vehicule v on r.vehicule = v.id_vehicule where deleted = \"no\" and id_make = $id_make ORDER BY average_rating) v JOIN make m on v.id_make = m.id_make where deleted = \"no\") v JOIN model m ON v.id_model = m.id_model where deleted = \"no\") v JOIN generation g on v.id_generation = g.id_generation where deleted = \"no\") v JOIN v_year y on v.id_v_year = y.id_v_year where deleted =\"no\" limit 3";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result; 
    }
}
?>




