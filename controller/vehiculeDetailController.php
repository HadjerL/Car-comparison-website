<?php
require_once(__DIR__ . '/../models/makesModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/vehiculeDetail.php');
class vehiculeDetailController{
    public function showPage(){
        $page_view = new ModelDetail();
        return $page_view->showPage();
    }
}