<?php
require_once('./models/pageModel.php');
require_once('./models/comparatorModel.php');
require_once('./views/view.php');
class Controller{
    public function getLogoController(){
        $page = new pageModel();
        $id_website = $page->getWebsite("Markaba");
        $result = $page->getLogo($id_website, "black and orange");
        return $result[0]["logo_link"];
    }
    protected function getNavMenuController(){
        $page = new PageModel();
        $id_website = $page->getWebsite("Markaba");
        $result = $page->getNavMenu($id_website);
        return $result;
    }
    public function getNavMenuItemsController(){
        $page = new PageModel();
        $id_nav_menu = $this->getNavMenuController();
        $result = $page->getNavMenuItems($id_nav_menu);
        return $result;
    }
    protected function getSocialsController(){
        $page = new PageModel();
        $id_website = $page->getWebsite("Markaba");
        $result = $page->getSocials($id_website);
        return $result;
    }
    public function getSocialItemsController(){
        $page = new PageModel();
        $id_socials = $this->getSocialsController();
        $result = $page->getSocialItems($id_socials);
        return $result;
    }
    protected function getDiaporamaController(){
        $page = new PageModel();
        $id_website = $page->getWebsite("Markaba");
        $result = $page->getDiaporama($id_website);
        return $result;
    }
    public function getDiaporamaItemsController(){
        $page = new PageModel();
        $id_diaporama = $this->getDiaporamaController();
        $result = $page->getDiaporamaItems($id_diaporama);
        return $result;
    }
    public function getVehiculeTypesController(){
        $comparator = new ComparatorModel();
        $result = $comparator->getVihiculeTypes();
        return $result;
    }
    public function showWebsite(){
        $page_view = new View();
        return $page_view->showWebsite();
    }
}
?>