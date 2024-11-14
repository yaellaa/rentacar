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

    include(ROOT_DIR."app/car/get_cars.php"); // Include the script to fetch car rentals
?>

<!-- Navbar -->
<?php require_once(ROOT_DIR."includes/navbar.php"); ?>

<?php
require_once(ROOT_DIR."views/components/page-guard.php");
?>

<!-- Page Header -->
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Car Rental List</h2>
        <!-- Add New Car Button -->
        <a href="<?php echo BASE_URL; ?>views/admin/cars/add.php" class="btn btn-success">Add New Car</a>
    </div>

    <?php if(isset($messageSucc)){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $messageSucc; ?></strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>    

    <?php if(isset($messageErr)){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $messageErr; ?></strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>   

    <p class="text-center">Manage all car rentals in the catalog</p>
    <hr>
</div>

<!-- Car Rental Cards Container -->
<div class="container content mt-3">
    <div class="row">

    <?php
        foreach($carList as $car){ 
            include(ROOT_DIR.'views/components/car-card.php'); // Include the car card component
        }
    ?>
        <!-- Add more car rental cards dynamically based on your backend data -->
    </div>
</div>

<?php  require_once(ROOT_DIR. "includes/footer.php"); ?>
