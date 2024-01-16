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
    <h3><?php echo $make." ".$model." ".$generation." [".$yearBegin."-".$yearEnd."] ".$year;?></h3>
    <?php
    $dataArray = $_GET['data']["spec"];
    foreach($dataArray as $spec){
        ?>
        <div class="specification">
            <h4><?php echo $spec["specification_name"] ;?></h4>
            <p><?php echo $spec["value"] ;?> <span><?php echo $spec["unit"] ;?></span></p>
        </div>
        <?php
    }
} else {
    echo "No data received";
}
?>