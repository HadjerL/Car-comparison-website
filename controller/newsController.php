<?php
require_once(__DIR__ . '/../models/comparatorModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../models/newModel.php');
require_once(__DIR__ . '/../views/news.php');
class newsController{
    public function getNews(){
        $news_controller = new NewsModel();
        return $news_controller->getNews();
    }
    public function showPage(){
        $page_view = new News();
        return $page_view->showPage();
    }
}