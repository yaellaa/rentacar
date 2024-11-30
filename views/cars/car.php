<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");

include(ROOT_DIR."app/config/DatabaseConnect.php");
$db = new DatabaseConnect();
$conn = $db ->connectDB();



try {
    $sql = "SELECT * FROM `cars` ORDER BY `cars`.`id`";
    $stmt = $conn ->prepare($sql);
    $stmt -> execute();
    $cars = $stmt -> fetch(); 

} catch (PDOException $e){
   echo "Connection Failed: " . $e->getMessage();
   $db = null;
}

require_once(ROOT_DIR."includes/header.php");

if(isset($_SESSION["error"])){
    $messageErr=$_SESSION["error"];
    unset($_SESSION["error"]);
};

if(isset($_SESSION["success"])){
    $messageSucc=$_SESSION["success"];
    unset($_SESSION["success"]);
};

?>
    <!-- Navbar -->
    <?php require_once(ROOT_DIR."includes\\navbar.php"); ?>

    <!-- message response -->
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
    <!-- car Details -->
    <div class="container my-5 bg-bpod">
        <div class="container mt-5">

            <div class="row">
                <!-- car Image -->
                <div class="col-md-6">
                    <img src="<?php echo BASE_URL.$cars["image_url"]; ?>"
                     alt="cars Image" class="img-fluid border boarde-dark boarder-5" style="height:500px">
                </div>

                <!-- car Information -->
                <div class="col-md-6">
                    <form action="<?php echo BASE_URL;?>app/car/rentacar.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cars["id"]; ?>">
                        <h2><?php echo $cars["car_name"]; ?></h2>
                        <p class="lead text-dark fw-bold">Php <?php echo number_format($cars["rental_price"],2) ?></p>
                        <p><?php echo $cars["car_description"];?></p>

                        <!-- Add to Cart Button -->
                        <div class="d-grid gap-2">
                        <button href="#" class="btn btn-dark" <?php echo ($cars ["availability"] <= 0 ? "disabled" : "");?>><?php echo ($cars["availability"] <= 0 ? "Soldout" : "Rent Now"); ?></button>
                        </div>
                    
                </div>
                </form>
            </div>
        </div>

    
<script>
    document.getElementById('decrement-btn').addEventListener('click', function() {
        let quantityInput = document.getElementById('quantity');
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) { // Ensures quantity doesn't go below 1
            quantityInput.value = currentValue - 1;
        }
    });

    document.getElementById('increment-btn').addEventListener('click', function() {
        let quantityInput = document.getElementById('quantity');
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    });
</script>



   
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>