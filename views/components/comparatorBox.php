<?php
function showComparingFrame(){
        $comparator_controller = new Controller();
        $vehicule_types = $comparator_controller->getVehiculeTypesController();
        $car_figures = ["assets/cars/car one.png","assets/cars/car two.png"];
        //$type_name,$make_name,$model_name,$generation_name,$year_begin,$year_end,$year_name
        // $image = $comparator_controller -> getImageOfVehiculeController("Car","BMW","2 serie","F22/F23",2013,2017,2015);
        // echo $image[0]["path"];
        // $id_vehicule = $comparator_controller -> getVehiculeController("Car","BMW","2 serie","F22/F23",2013,2017,2015);
        // echo $id_vehicule[0]["id_vehicule"];
        ?>
        <section class="comparison" id="comparator">
            <header class="header-compare">
                <h2 class="section-title">Car comparator</h2>
                <p>Choose at least two cars to compare side-by-side.</p>
            </header>
            <form class="form-container" id="form-container">
            <div class="comparison-box">
                <?php 
                for($i=0;$i<4;$i++){
                ?>
                <div class="form-box" id="form-box<?php echo $i?>">
                    <div class="compr-img-cntner" id="compr-img-cntner<?php echo $i?>">
                        <img class="compr-img" src="<?php echo $car_figures[$i%2]; ?>" alt="car figure" style = "transform:scaleX(<?php if($i%2 ==1) {echo 1;} else {echo -1;}?>)";> <!--if i is pair it's gonna be flipped-->
                    </div>
                    <h3>Select a Vehicule</h3>
                    <div class="comparison-form" id="vehicule-form<?php echo $i?>" action="fromController.php">
                        <div class="input-container">
                            <label for="type<?php echo $i?>">Type</label>
                            <select name="type<?php echo $i?>" id="type<?php echo $i?>">
                                <option value>Choose a Type</option>
                                <?php 
                                foreach($vehicule_types as $type){
                                    $type_name = $type["type_name"];
                                    echo "<option value=\"$type_name\">$type_name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="make<?php echo $i?>">Make</label>
                            <select name="make<?php echo $i?>" id="make<?php echo $i?>">
                                <option value selected>Choose a make</option>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="model<?php echo $i?>">Model</label>
                            <select name="model<?php echo $i?>" id="model<?php echo $i?>">
                            <option value selected>Choose a model</option>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="generation<?php echo $i?>">Generation</label>
                            <select name="generation<?php echo $i?>" id="generation<?php echo $i?>">
                            <option value selected>Choose a generation</option>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="year<?php echo $i?>">Year</label>
                            <select name="year<?php echo $i?>" id="year<?php echo $i?>">
                            <option value selected>Choose a Year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <button type="button" id="compare-btn">Show Result</button>
            </form>
            <div class="error-message-container hidden">
                <p class="error-message">Please select at least two different vehicules!</p>
            </div>
        </section>
        <?php
}
?>