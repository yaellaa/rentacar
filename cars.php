<?php 
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");
    require_once(ROOT_DIR."includes\header.php");
?>
    
<!-- Navbar -->
<?php require_once(ROOT_DIR."includes\\navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Details - MyRentals</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="homepage.html">MyRentals</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homepage.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.html">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.html">Cart</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Car Rental Details -->
<div class="container mt-5">
    <div class="row">
        <!-- Car Image -->
        <div class="col-md-6">
            <img src="https://via.placeholder.com/500" alt="Car Image" class="img-fluid">
        </div>

        <!-- Car Information -->
        <div class="col-md-6">
            <h2>SUV - Toyota Land Cruiser</h2>
            <p class="lead">$150.00 / day</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis, orci sit amet luctus malesuada, felis nisi vehicula velit, at sodales neque purus eget metus. Praesent dictum feugiat purus.</p>

            <!-- Rental Period -->
            <div class="mb-3">
                <label for="rental_days" class="form-label">Rental Period (Days)</label>
                <input type="number" id="rental_days" class="form-control" value="1" min="1">
            </div>

            <!-- Rent Button -->
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg">Rent Car</button>
            </div>
        </div>
    </div>
</div>

<!-- Related Cars (Optional) -->
<div class="container my-5">
    <h3>Related Cars</h3>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/200" class="card-img-top" alt="Related Car 1">
                <div class="card-body">
                    <h5 class="card-title">Sedan - Honda Accord</h5>
                    <p class="card-text">$120.00 / day</p>
                    <a href="#" class="btn btn-primary">View Car</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/200" class="card-img-top" alt="Related Car 2">
                <div class="card-body">
                    <h5 class="card-title">Convertible - BMW Z4</h5>
                    <p class="card-text">$180.00 / day</p>
                    <a href="#" class="btn btn-primary">View Car</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/200" class="card-img-top" alt="Related Car 3">
                <div class="card-body">
                    <h5 class="card-title">Coupe - Audi A5</h5>
                    <p class="card-text">$140.00 / day</p>
                    <a href="#" class="btn btn-primary">View Car</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/200" class="card-img-top" alt="Related Car 4">
                <div class="card-body">
                    <h5 class="card-title">Hatchback - Ford Focus</h5>
                    <p class="card-text">$100.00 / day</p>
                    <a href="#" class="btn btn-primary">View Car</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
