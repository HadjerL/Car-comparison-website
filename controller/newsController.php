<?php
require_once(__DIR__ . '/../models/comparatorModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/news.php');
class newsController{
    public function showPage(){
        $page_view = new News();
        return $page_view->showPage();
    }
}