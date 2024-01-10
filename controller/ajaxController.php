<?php
require_once('controller.php');
$comparator_controller = new Controller();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action === 'getMakesOfType') {
        if (isset($_GET['vehicule_type'])) {
            $vehiculeType = $_GET['vehicule_type'];
            $makes = $comparator_controller->getMakesOfTypeController($vehiculeType);
            echo json_encode($makes);
        } else {
            echo json_encode(['error' => 'Missing vehicule_type parameter']);
        }
    } else if($action ==='getModelsOfMake') {
        if (isset($_GET['make_name'])) {
            $make_name = $_GET['make_name'];
            $models = $comparator_controller->getModelsOfMakeController($make_name);
            echo json_encode($models);
        } else {
            echo json_encode(['error' => 'Missing  parameter']);
        }
    } else if($action ==='getGenerationsOfModel') {
        if (isset($_GET['model_name'])) {
            $model_name = $_GET['model_name'];
            $generations = $comparator_controller->getGenerationsOfModelController($model_name);
            echo json_encode($generations);
        } else {
            echo json_encode(['error' => 'Missing  parameter']);
        }
    } else if($action ==='getYearsOfGeneration') {
        if (isset($_GET['generation_name']) && isset($_GET['year_begin'])&&isset($_GET['year_end'])) {
            $generation_name = $_GET['generation_name'];
            $year_begin = $_GET['year_begin'];
            $year_end = $_GET['year_end'];
            $years = $comparator_controller->getYearsOfGenerationController($generation_name,$year_begin,$year_end);
            echo json_encode($years);
        } else {
            echo json_encode(['error' => 'Missing  parameter']);
        }
    } else if($action ==='getImageOfVehicule') {
        if (isset($_GET['generation_name']) 
        && isset($_GET['type_name'])
        && isset($_GET['make_name'])
        && isset($_GET['model_name'])
        && isset($_GET['year_name'])
        && isset($_GET['year_begin'])
        &&isset($_GET['year_end'])) {
            $type_name = $_GET['type_name'];
            $make_name = $_GET['make_name'];
            $model_name = $_GET['model_name'];
            $year_name = $_GET['year_name'];
            $generation_name = $_GET['generation_name'];
            $year_begin = $_GET['year_begin'];
            $year_end = $_GET['year_end'];
            $image = $comparator_controller->getImageOfVehiculeController($type_name,$make_name,$model_name,$generation_name,$year_begin,$year_end,$year_name);
            echo json_encode($image);
        } else {
            echo json_encode(['error' => 'Missing  parameter']);
        }
    } else {
        echo json_encode(['error' => 'Invalid action']);
    }
} else {
    echo json_encode(['error' => 'No action specified']);
}

?>