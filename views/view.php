<?php
require_once(__DIR__ . '/../controller/controller.php');
require_once(__DIR__.'/common.php');
require_once(__DIR__.'/components/comparatorBox.php');
class View{
    private function pageHead(){
        $page_controller = new Controller();
        $logo_link = $page_controller->getLogoController("black and orange");
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/7c073a6778.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="/Car-comparison-website/index.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet">
            <link rel="icon" type="image/png" href=<?php echo "\"$logo_link\""; ?>>
            <title>Markaba</title>
        </head>
        <?php
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
                echo "<a href=\"$new_ad_link\" target=\"_blank\"><img src=\"$image_link\" alt = \"new image\" width = \"100%\"></a>";
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

    private function showMain(){
        echo "<main>";
        showComparingFrame();
        echo "</main>";
    }
    private function pageBody(){
        $common = new common();
        echo "<body>";
        $common->showHeader();
        $this->showDiaporama();
        $this->showMain();
        $common->showFooter();
        ?>
        <script src="jquery-3.7.1.js" type="text/javascript"></script>
        <script src="main.js" type="text/javascript"></script>
        <script src="./views/components/compare.js" type="text/javascript"></script>
        </body>
        <?php
    }
    public function showPage(){
        echo "<html>";
        $this->pageHead();
        $this->pageBody();
        echo "</html>";
    }
}
?>
