<?php 
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");
require_once(ROOT_DIR."includes/header.php");


include(ROOT_DIR."app/config/DatabaseConnect.php");
$db = new DatabaseConnect();
$conn = $db ->connectDB();

$carts          = [];
$subtotal       = 0;
$purchase_total = 0;

try {
    $sql = "SELECT carts.id, cars.car_name, carts.unit_price, carts.total_price "
            . " FROM carts "
            . " LEFT JOIN cars ON cars.id = carts.car_id";

    $stmt = $conn ->prepare($sql);
    $stmt -> execute();
    $carts = $stmt -> fetchAll(); 

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
    <?php require_once("includes\\navbar.php"); ?>

    <!-- Shopping Cart -->
    <div class="container mt-5">
        <div class="row">
            <!-- Shopping Cart Items -->
            <div class="col-md-8">
                <h3>To Rent</h3>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Car Name</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($carts){
                        foreach($carts as $indvCart){?>
                        <tr>
                            <td><?php echo $indvCart["product_name"]?></td>
                            <td><?php echo number_format($indvCart["unit_price"])?></td>
                            <td><?php echo number_format($indvCart["total_price"])?></td>
                        </tr>
                        <?php
                            $subtotal += $indvCart["total_price"];
                             } ?>
                        <?php } else{?>
                            <tr>
                                <td colspan="4" class="text-center">You dont have any car rented yet</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Cart Summary and Payment -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4>Rent Summary</h4>
                    </div>
                    <div class="card-body">
                        <?php if($carts){ ?>
                        <p>Subtotal: <span class="float-end"><?php echo number_format($subtotal,2); ?></span></p>
                        <p>Rental Fee: <span class="float-end">Php 500.00</span></p>
                        <hr>
                        <h5>Total: <span class="float-end"><?php echo ($subtotal + 50); ?></span></h5>

                        <!-- Payment Method Selection -->
                        <div class="mt-4">
                            <label for="paymentMethod" class="form-label">Select Payment Method</label>
                            <select class="form-select" id="paymentMethod" required>
                                <option value="credit">Credit/Debit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="gcash">GCash</option>
                            </select>
                        </div>

                        <!-- Payment Details -->
                        <div class="mt-3">
                            <label for="cardNumber" class="form-label">Card/Account Number</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="Enter your card or account number" required>
                        </div>

                        <!-- Confirm Payment Button -->
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-success" href = "information.php">Confirm Payment</button>
                            <?php } else { ?>
                                <p class="text-center">No details for cars yet</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>