<?php
require_once('controller.php');
$comparator_controller = new Controller();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action === 'getVehicule') {
        if (isset($_GET['type'])
        && isset($_GET["make"])
        && isset($_GET["model"])
        && isset($_GET["generation"])
        && isset($_GET["yearBegin"])
        && isset($_GET["yearEnd"])
        && isset($_GET["year"])
    ) {
            $type_name = $_GET["type"];
            $make_name = $_GET["make"];
            $model_name = $_GET["model"];
            $generation_name = $_GET["generation"];
            $year_begin = $_GET["yearBegin"];
            $year_end = $_GET["yearEnd"];
            $year_name = $_GET["year"];
            $vehicule = $comparator_controller->getVehiculeController($type_name,$make_name,$model_name,$generation_name,$year_begin,$year_end,$year_name);
            $specification_values = $comparator_controller->getSpecificationsValuesCntroller($vehicule[0]["id_vehicule"]);
            echo json_encode($specification_values);
        } else {
            echo json_encode(['error' => 'Missing vehicule_type parameter']);
        }
    } else {
        echo json_encode(['error' => 'Invalid action']);
    }
} else {
    echo json_encode(['error' => 'No action specified']);
}
?>