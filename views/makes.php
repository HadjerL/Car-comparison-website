<!-- here we print the principle vehicule the four most rated once -->
<?php
require_once(__DIR__ . '/../controller/controller.php');
require_once(__DIR__ . '/../controller/makesController.php');
require_once(__DIR__.'/common.php');
class Makes{
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
        $makesController = new makesController();
        $makes = $makesController->getPrincipleMakesController();
        ?>
        <main>
            <div class="principle-makes">
        <?php
        foreach($makes as $make){
            ?>
            <div class="make-display-average">
                <a href="/Car-comparison-website/makes/makeDetail?id_make=<?php echo $make["id_make"]?>"><img class="make-average-img" src="/Car-comparison-website/assets/makes/<?php echo $make["make_name"];?>.png" alt="make logo"></a>
                <h3 class="make-average-txt"><?php echo $make["make_name"];?></h3>
            </div>
            <?php
        }
        ?>
            </div>
        </main>
        <?php
    }
    private function pageBody(){
        $common = new common();
        echo "<body>";
        $common->showHeader();
        $this->showMain();
        $common->showFooter();
        ?>
        <script src="jquery-3.7.1.js" type="text/javascript"></script>
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