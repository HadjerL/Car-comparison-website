<?php
require_once(__DIR__ . '/../models/comparatorModel.php');
require_once(__DIR__ . '/../models/pageModel.php');
require_once(__DIR__ . '/../views/view.php');
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
    public function getMakesOfTypeController($vehicule_type){
        $comparator = new ComparatorModel();
        $result = $comparator->getMakesOfType($vehicule_type);
        return $result;
    }
    public function getModelsOfMakeController($make_name){
        $comparator = new ComparatorModel();
        $result = $comparator->getModelsOfMake($make_name);
        return $result;
    }
    public function getGenerationsOfModelController($model_name){
        $comparator = new ComparatorModel();
        $result = $comparator->getGenerationsOfModel($model_name);
        return $result;
    }
    public function getYearsOfGenerationController($generation_name,$year_begin,$year_end){
        $comparator = new ComparatorModel();
        $result = $comparator->getYearsOfGeneration($generation_name,$year_begin,$year_end);
        return $result;
    }
    public function getImageOfVehiculeController($type_name,$make_name,$model_name,$generation_name,$year_begin,$year_end,$year_name){
        $comparator = new ComparatorModel();
        $result = $comparator->getImageOfVehicule($type_name,$make_name,$model_name,$generation_name,$year_begin,$year_end,$year_name);
        return $result;
    }
    public function showWebsite(){
        $page_view = new View();
        return $page_view->showWebsite();
    }
}
?>