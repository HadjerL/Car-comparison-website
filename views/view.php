<?php
require_once('./controller/controller.php');
class View{
    private function pageHead(){
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/7c073a6778.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="styles.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet">
            <title>Karroussa</title>
        </head>
        <?php
    }
    private function showLogo(){
        $page_controller = new Controller();
        $logo_link = $page_controller->getLogoController();
        echo "<a href=\"#\"><img src = \"$logo_link\" alt=\"logo\" ></a>";
    }
    private function showSocials(){
        $page_controller = new Controller();
        $social_items = $page_controller->getSocialItemsController();
        echo "<ul>";
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
        echo "<ul>";
            foreach($nav_menu_items as $item){
                $item_name = $item["item_name"];
                $item_link = $item["item_link"];
                echo "<li><a href=\"$item_link\">$item_name</a></li>";
            }
        echo "</ul>";
    }
    private function showHeader(){
        echo "<header>";
        $this->showLogo();
        $this->showSocials();
        $this->showNavMenu();
        echo "</header>";
    }
    private function pageBody(){
        echo "<body>";
        $this->showHeader();
        echo "</body>";
    }
    public function showWebsite(){
        echo "<html>";
        $this->pageHead();
        $this->pageBody();
        echo "</html>";
    }
}
?>