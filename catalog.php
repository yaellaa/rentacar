<?php
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");
    require_once(ROOT_DIR."includes/header.php");

    if(isset($_SESSION["error"])){
        $messageErr = $_SESSION["error"];
        unset($_SESSION["error"]);
    }

    if(isset($_SESSION["success"])){
        $messageSucc = $_SESSION["success"];
        unset($_SESSION["success"]);
    }

    include(ROOT_DIR."app/caroptions/get_cars.php");
?>
    <!-- Navbar -->
    <?php require_once(ROOT_DIR."includes/navbar.php"); ?>

<div class="container-fluid bg-dark text-white text-center py-5">
    <h1 class="display-2">Our Car Catalog</h1>
    <p class="lead">Browse our catalogue and rent a car today!</p>
</div>

<div class="container content mt-3">
        <div class="row">

        
        <?php
    foreach($carList as $cars){
       include(ROOT_DIR.'views/components/car-card-consumer.php');
    }
    ?>
            <!-- Add more product cards dynamically based on your backend data -->
        </div>
    </div>