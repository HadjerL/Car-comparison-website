<?php
require_once(__DIR__ . '/../models/model.php');
// require_once('./models/model.php');
class VehiculeModel extends Model{
    public function getVehicule($id_vehicule){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT id_vehicule, make_name, model_name, generation_name, year_begin, year_end, year_name FROM (SELECT id_vehicule, make_name, model_name, generation_name, year_begin, year_end,id_v_year FROM (SELECT id_vehicule , make_name, model_name, id_generation, id_v_year FROM (SELECT id_vehicule , make_name, id_model,id_generation,id_v_year FROM (SELECT id_vehicule,id_model,id_make,id_generation,id_v_year FROM (SELECT id_vehicule as vehicule , AVG(rating) as average_rating FROM ratingvehicule GROUP BY id_vehicule) r JOIN vehicule v on r.vehicule = v.id_vehicule where deleted = \"no\" ORDER BY average_rating) v JOIN make m on v.id_make = m.id_make where deleted = \"no\") v JOIN model m ON v.id_model = m.id_model where deleted = \"no\") v JOIN generation g on v.id_generation = g.id_generation where deleted = \"no\") v JOIN v_year y on v.id_v_year = y.id_v_year where deleted =\"no\" and id_vehicule = $id_vehicule";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result; 
    }
}
?>




