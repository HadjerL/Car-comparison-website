<?php 
class common{
    private function showLogo($type){
        $page_controller = new Controller();
        $logo_link = $page_controller->getLogoController($type);
        echo "<a href=\"/Car-comparison-website/\"><img class=\"logo\" src = \"$logo_link\" alt=\"logo\" ></a>";
    }
    private function showSocials(){
        $page_controller = new Controller();
        $social_items = $page_controller->getSocialItemsController();
        echo "<ul class= \"socials\">";
        foreach($social_items as $item){
            $platform = $item["platform"];
            $social_link = $item["social_link"];
            echo "<li><a href=\"$social_link\"><i class=\"fa-brands fa-$platform\"></i></a></li>";
        }
        echo "</ul>";
    }
    private function showNavMenu(){
        $page_controller = new controller();
        $nav_menu_items = $page_controller->getNavMenuItemsController();
        echo "<ul class = \"nav-menu\">";
            foreach($nav_menu_items as $item){
                $item_name = $item["item_name"];
                $item_link = $item["item_link"];
                echo "<li><a href=\"$item_link\">$item_name</a></li>";
            }
        echo "</ul>";
    }
    private function showNavSmall(){
        ?>
        <button class="list-btn">
            <svg class="open-menu hidden icon" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="11.147" y1="28.1176" x2="28.1175" y2="11.147" stroke="black" stroke-width="1.04"/>
            <line x1="11.8823" y1="11.147" x2="28.8529" y2="28.1176" stroke="black" stroke-width="1.04"/>
            <rect x="0.5" y="0.5" width="39" height="39" rx="15.5" stroke="black"/>
            </svg>
            <svg class="closed-menu" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="8" y1="13.48" x2="32" y2="13.48" stroke="black" stroke-width="1.04"/>
            <line x1="8" y1="19.48" x2="32" y2="19.48" stroke="black" stroke-width="1.04"/>
            <line x1="8" y1="25.48" x2="32" y2="25.48" stroke="black" stroke-width="1.04"/>
            <rect x="0.5" y="0.5" width="39" height="39" rx="15.5" stroke="black"/>
            </svg>
        </button>
        <?php
        echo "<nav class=\"hidden small\">";
        $this->showSocials();
        $this->showNavMenu();
        echo "</nav>";
    }
    private function showNavLarge(){
        echo"<nav class= \"large\">";
        $this->showSocials();
        $this->showNavMenu();
        echo"</nav>";
    }
    public function showHeader(){
        echo "<header class=\"header-page\">";
        $this->showLogo("black and orange");
        $this->showNavSmall();
        $this->showNavLarge();
        echo "</header>";
    }
    public function showFooter(){
        echo "<footer>";
        echo "<div>";
        $this-> showLogo("white");
        $this->showSocials();
        echo "</div>";
        $this->showNavMenu();
        echo "</footer>";
    }
}
?>