<?php
require_once(__DIR__ . '/../models/makesModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/vehiculeDetail.php');
require_once(__DIR__ . '/../models/vehiculeModel.php');
class vehiculeDetailController{
    public function getVehiculeController($id_vehicule){
        $vehicules = new VehiculeModel();
        $result = $vehicules->getVehicule($id_vehicule);
        return $result;
    }
    public function showPage(){
        $page_view = new ModelDetail();
        return $page_view->showPage();
    }
}