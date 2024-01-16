<?php
require_once(__DIR__ . '/../models/makesModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/makeDetail.php');
class makeDetailController{
    public function getMakeinfoController($id_make){
        $info = new  MakesModel();
        $result = $info->getMakeinfo($id_make);
        return $result;
    }
    public function getPrincipleVehiculesOfMakeController($id_make){
        $makes = new MakesModel();
        $result = $makes->getPrincipleVehiculesOfMake($id_make);
        return $result;
    }
    public function showPage(){
        $page_view = new MakeDetail();
        return $page_view->showPage();
    }
}