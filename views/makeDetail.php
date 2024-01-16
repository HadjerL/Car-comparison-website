<?php
require_once(__DIR__ . '/../controller/controller.php');
require_once(__DIR__ . '/../controller/makeDetailController.php');
require_once(__DIR__.'/common.php');
class MakeDetail{
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
        if (isset($_GET["id_make"])){
            $id_make = $_GET["id_make"] ;
            $makesController = new  makeDetailController();
            $info = $makesController-> getMakeinfoController($id_make);
            $vehicules = $makesController->getPrincipleVehiculesOfMakeController($id_make);
            $all_vehicules = $makesController->getVehiculesOfMakeController($id_make);
            ?>
            <main>
                <div class="make-display-large">
                    <div>
                        <h1 class="make-average-txt"><?php echo $info[0]["make_name"] ?></h1>
                        <p class="make-info-txt"><span><?php echo $info[0]["origin_country"] ?></span><span><?php echo $info[0]["registered_office"] ?></span></p>
                    </div>
                    <a><img class="make-average-img" src="/Car-comparison-website/assets/makes/<?php echo $info[0]["make_name"];?>.png" alt="make logo"></a>
                </div>
                <div class="make-models">
                    <div class="principle-models">
                        <div>
                            <h2>Appreciated vehicules</h2>
                            <p>Check out these loved vehicules</p>
                        </div>
                        <ul>
                            <?php 
                            foreach($vehicules as $vehicule){
                                ?>
                                <div class="model-display-average">
                                    <li><?php echo $vehicule["make_name"]?> <?php echo $vehicule["model_name"]?> <?php echo $vehicule["generation_name"]?> [<?php echo $vehicule["year_begin"]?>-<?php echo $vehicule["year_end"]?>] <?php echo $vehicule["year_name"]?></li>
                                    <a href="/Car-comparison-website/makes/vehiculeDetail?id_vehicule=<?php echo $vehicule["id_vehicule"]?>"><img class="make-average-img" src="/Car-comparison-website/assets/model/<?php echo $vehicule["model_name"]?>" alt="make logo"></a>
                                </div>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div>
                        <h2>All vehicules of <?php echo $vehicule["make_name"]?></h2>
                        <ul>
                        <?php 
                            foreach($all_vehicules as $vehicule){
                                ?>
                                <div class="">
                                <li><a href="/Car-comparison-website/makes/vehiculeDetail?id_vehicule=<?php echo $vehicule["id_vehicule"]?>" style="text-decoration:underline"><?php echo $vehicule["make_name"]?> <?php echo $vehicule["model_name"]?> <?php echo $vehicule["generation_name"]?> [<?php echo $vehicule["year_begin"]?>-<?php echo $vehicule["year_end"]?>] <?php echo $vehicule["year_name"]?></a></li>
                                </div>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
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