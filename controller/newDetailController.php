<?php
require_once(__DIR__ . '/../models/newModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/newDetail.php');
class newDetailController{
    public function getNewController($id_new){
        $new_controller = new NewsModel();
        $result = $new_controller->getNew($id_new);
        return $result;
    }
    public function showPage(){
        $page_view = new newDetail();
        return $page_view->showPage();
    }
}
