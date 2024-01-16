<?php
if (isset($_GET['data'])) {
    $vehicule = $_GET['data']["vehiclechar"];
    $make =  $vehicule["make"];
    $model =  $vehicule["model"];
    $generation = $vehicule["generation"];
    $yearBegin = $vehicule["yearBegin"];
    $yearEnd = $vehicule["yearEnd"];
    $year = $vehicule["year"];
    ?>
    <div class="vehicule-result">
    <h3><?php echo $make." ".$model." ".$generation." [".$yearBegin."-".$yearEnd."] ".$year;?></h3>
    <div>
        <img class="v-result-img" src="/Car-comparison-website/assets/vehicules/<?php echo $model;?> <?php echo $generation;?> <?php echo $yearBegin;?> <?php echo $yearEnd;?> <?php echo $year;?>" alt="make logo">
    </div>
    <?php
    $dataArray = $_GET['data']["spec"];
    foreach($dataArray as $spec){
        ?>
        <div class="specification">
            <h4><?php echo $spec["specification_name"] ;?></h4>
            <p><span><?php echo $spec["value"] ;?></span> <span><?php echo $spec["unit"] ;?></span></p>
            <hr>
        </div>
        <?php
    }
    ?>
    </div>
    <?php
} else {
    echo "No data received";
}
?>