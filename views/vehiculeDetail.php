<?php
require_once(__DIR__ . '/../controller/controller.php');
require_once(__DIR__ . '/../controller/vehiculeDetailController.php');
require_once(__DIR__.'/common.php');
class ModelDetail{
    private function pageHead(){
        $page_controller = new Controller();
        $logo_link = $page_controller->getLogoController("black and orange");
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- <script src="https://kit.fontawesome.com/7c073a6778.js" crossorigin="anonymous"></script> -->
            <link rel="stylesheet" href="/Car-comparison-website/index.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet">
            <link rel="icon" type="image/png" href=<?php echo "\"$logo_link\""; ?>>
            <title>Markaba</title>
        </head>
        <?php
    }
    private function showMain(){
        if(isset($_GET["id_vehicule"])){
            $id_vehicule = $_GET["id_vehicule"];
            echo $id_vehicule
            ?>
            <main>
                
            </main>
            <?php
        }
    }
    private function pageBody(){
        $common = new common();
        echo "<body>";
        $common->showHeader();
        $this->showMain();
        $common->showFooter();
        ?>
        <script src="/Car-comparison-website/jquery-3.7.1.js" type="text/javascript"></script>
        <!-- <script src="index.js" type="text/javascript"></script> -->
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