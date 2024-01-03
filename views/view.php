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
        echo "<a href=\"#\"><img class=\"logo\" src = \"$logo_link\" alt=\"logo\" ></a>";
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
    private function showDiaporama(){
        $page_controller = new controller();
        $diaporama_items = $page_controller->getDiaporamaItemsController();
        echo "<div class=\"panorama\">";
        foreach($diaporama_items as $key => $item){
            $image_link = $item["image_link"];
            $new_ad_link = $item["news_ad_link"];
            ?>
            <div class="slide fade">
                <div class="panorama-number"><?php echo $key+1 ?> / 3</div>
                <?php
                echo "<a href=\"$new_ad_link\"><img src=\"$image_link\" alt = \"new image\" width = \"100%\"></a>";
                ?>
            </div> 
            <?php
        }
        ?>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <div class="indicators">
        <?php
        for($i=0;$i<count($diaporama_items);$i++){
            echo"<span class=\"circle\" onclick=\"currentSlide(".($i+1).")\"></span>";
        }
        ?>
        </div>
        </div>
        <?php
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
    private function showHeader(){
        echo "<header>";
        $this->showLogo();
        $this->showNavSmall();
        $this->showNavLarge();
        echo "</header>";
    }
    private function pageBody(){
        echo "<body>";
        $this->showHeader();
        $this->showDiaporama();
        ?>
        <script src="jquery-3.7.1.js" type="text/javascript"></script>
        <script src="index.js" type="text/javascript"></script>
        </body>
        <?php
    }
    public function showWebsite(){
        echo "<html>";
        $this->pageHead();
        $this->pageBody();
        echo "</html>";
    }
}
?>
