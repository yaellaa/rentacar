<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");

include(ROOT_DIR."app/config/DatabaseConnect.php");
$db = new DatabaseConnect();
$conn = $db ->connectDB();

$cars = [];
$id = @$_GET['id'];
$category = [ "4" => "Ford Mustang", "6" =>"Chevrolet Malibu", "7" => "Tesla Modle 3", "8" => "Jeep Wrangler"];

try {
    $sql = "SELECT * FROM cars WHERE cars.id = $id";
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
                    <form action="<?php echo BASE_URL;?>app/cart/add_to_cart.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cars["id"]; ?>">
                        <h2><?php echo $cars["car_name"]; ?></h2>
                        <div class="mb-3"><span class="badge text-bg-info"><?php echo $category[$cars["category_id"]]; ?></span></div>
                        <p class="lead text-dark fw-bold">Php <?php echo number_format($cars["unit_price"],2) ?></p>
                        <p><?php echo $cars["car_description"];?></p>

                        <!-- Quantity Selection -->
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="button" id="decrement-btn">-</button>
                                <input type="number" id="quantity" name="quantity" class="form-control text-center" value="1" min="1" max="10" style="max-width: 60px;">
                                <button class="btn btn-outline-secondary" type="button" id="increment-btn">+</button>
                                <span class="input-group-text">/ Remaining Stocks: <?php echo $cars["stocks"] ?></span>
                            </div>
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg" <?php echo ($cars ["stocks"] <= 0 ? "disabled" : "");?>><?php echo ($product["stocks"] <= 0 ? "Soldout" : "Add to cart"); ?></button>
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

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 MyShop. All rights reserved.</p>
    <nav>
        <a href="#" class="text-white">Privacy Policy</a> | 
        <a href="#" class="text-white">Terms & Conditions</a>
    </nav>
</footer>

   
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>