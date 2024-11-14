<?php 
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");
require_once(ROOT_DIR."includes/header.php");
?>

<!-- Navbar -->
<?php require_once("includes/navbar.php"); ?>

<!-- Car Rental Cart -->
<div class="container mt-5">
    <div class="row">
        <!-- Car Rental Items -->
        <div class="col-md-8">
            <h3>Rental Cart</h3>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Car Model</th>
                        <th>Quantity (Days)</th>
                        <th>Price per Day</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Car Model 1</td>
                        <td>3 Days</td>
                        <td>$30.00</td>
                        <td>$90.00</td>
                    </tr>
                    <tr>
                        <td>Car Model 2</td>
                        <td>2 Days</td>
                        <td>$50.00</td>
                        <td>$100.00</td>
                    </tr>
                    <tr>
                        <td>Car Model 3</td>
                        <td>1 Day</td>
                        <td>$40.00</td>
                        <td>$40.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Cart Summary and Payment -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Order Summary</h4>
                </div>
                <div class="card-body">
                    <p>Subtotal: <span class="float-end">$230.00</span></p>
                    <p>Insurance (Optional): <span class="float-end">$20.00</span></p>
                    <p>Taxes: <span class="float-end">$15.00</span></p>
                    <hr>
                    <h5>Total: <span class="float-end">$265.00</span></h5>

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
                        <button type="submit" class="btn btn-success">Confirm Payment</button>
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
