<?php
require_once(__DIR__ . '/../models/makesModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/makes.php');
class makesController{
    public function getMakesController(){
        $makes = new MakesModel();
        $result = $makes->getMakes();
        return $result;
    }
    public function getPrincipleMakesController(){
        $makes = new MakesModel();
        $result = $makes->getPrincipleMakes();
        return $result;
    }
    public function showPage(){
        $page_view = new Makes();
        return $page_view->showPage();
    }
}