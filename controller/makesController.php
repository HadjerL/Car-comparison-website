<?php
require_once(__DIR__ . '/../models/comparatorModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/makes.php');
class makesController{
    public function showPage(){
        $page_view = new Makes();
        return $page_view->showPage();
    }
}