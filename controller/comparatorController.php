<?php
require_once(__DIR__ . '/../models/comparatorModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/comparator.php');
class comparatorController{
    public function showPage(){
        $page_view = new Comparator();
        return $page_view->showPage();
    }
}