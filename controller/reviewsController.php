<?php
require_once(__DIR__ . '/../models/comparatorModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/reviews.php');
class reviewsController{
    public function showPage(){
        $page_view = new Review();
        return $page_view->showPage();
    }
}