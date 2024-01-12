<?php
require_once(__DIR__ . '/../models/comparatorModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/contact.php');
class contactController{
    public function showPage(){
        $page_view = new Contact();
        return $page_view->showPage();
    }
}