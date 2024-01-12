<?php
require_once(__DIR__ . '/../models/comparatorModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/BuyingGuide.php');
class buyingGuideController{
    public function showPage(){
        $page_view = new buyingGuide();
        return $page_view->showPage();
    }
}