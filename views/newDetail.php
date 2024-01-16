<?php
require_once(__DIR__ . '/../controller/controller.php');
require_once(__DIR__ . '/../controller/newDetailController.php');
require_once(__DIR__ . '/../controller/comparatorController.php');
require_once(__DIR__.'/common.php');
class NewDetail{
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
    private function showMain(){
        if(isset($_GET["id_new"])){
            $new_controller = new newDetailController();
            $id_new = $_GET["id_new"];
            $new = $new_controller->getNewController($id_new);
            ?>
            <main class="news-article">
                <h1><?php echo $new[0]["title"]?></h1>
                <img class="" src="/Car-comparison-website/assets/new/<?php echo $new[0]["title"];?>" alt="make logo">
                <p><?php echo $new[0]["content"] ?></p>
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