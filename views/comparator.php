<?php
require_once(__DIR__ . '/../controller/controller.php');
require_once(__DIR__.'/common.php');
require_once(__DIR__.'/components/comparatorBox.php');
class Comparator{
    private function pageHead(){
        $page_controller = new Controller();
        $logo_link = $page_controller->getLogoController("black and orange");
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- <script src="https://kit.fontawesome.com/7c073a6778.js" crossorigin="anonymous"></script> -->
            <link rel="stylesheet" href="styles.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet">
            <link rel="icon" type="image/png" href=<?php echo "\"$logo_link\""; ?>>
            <title>Markaba</title>
        </head>
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
        $this->showMain();
        $common->showFooter();
        ?>
        <img class="compr-img" src="assets/cars/Mercedes_R_Class_W251_2005_2010_2010.png" alt="vehicule imgae">
        <script src="jquery-3.7.1.js" type="text/javascript"></script>
        <script src="./views/components/comparator.js" type="text/javascript"></script>
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