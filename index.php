<?php 
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");
require_once(ROOT_DIR."includes/header.php");
?>

<!-- Navbar -->
<?php require_once(ROOT_DIR."includes/navbar.php"); ?>

<!-- Hero Section -->
<div class="container-fluid bg-primary text-white text-center py-5">
    <h1 class="display-4">Welcome to MyCarRental!</h1>
    <p class="lead">Rent the car of your dreams with ease</p>
    <a href="#cars" class="btn btn-light btn-lg">Browse Cars</a>
</div>

<!-- Car Categories -->
<div class="container content my-5">
    <h2 class="text-center mb-4">Browse by Car Category</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Luxury Cars">
                <div class="card-body text-center">
                    <h5 class="card-title">Luxury Cars</h5>
                    <a href="#cars" class="btn btn-primary">Browse Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="SUVs">
                <div class="card-body text-center">
                    <h5 class="card-title">SUVs</h5>
                    <a href="#cars" class="btn btn-primary">Browse Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Economy Cars">
                <div class="card-body text-center">
                    <h5 class="card-title">Economy Cars</h5>
                    <a href="#cars" class="btn btn-primary">Browse Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Cars Section -->
<div class="container content my-5" id="cars">
    <h2 class="text-center mb-4">Featured Cars for Rent</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/250x250" class="card-img-top" alt="Car 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Car Model 1</h5>
                    <p class="card-text">$50.00 per day</p>
                    <a href="#" class="btn btn-success">Rent Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/250x250" class="card-img-top" alt="Car 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Car Model 2</h5>
                    <p class="card-text">$80.00 per day</p>
                    <a href="#" class="btn btn-success">Rent Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/250x250" class="card-img-top" alt="Car 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Car Model 3</h5>
                    <p class="card-text">$40.00 per day</p>
                    <a href="#" class="btn btn-success">Rent Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/250x250" class="card-img-top" alt="Car 4">
                <div class="card-body text-center">
                    <h5 class="card-title">Car Model 4</h5>
                    <p class="card-text">$120.00 per day</p>
                    <a href="#" class="btn btn-success">Rent Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php require_once(ROOT_DIR."includes/footer.php"); ?>
