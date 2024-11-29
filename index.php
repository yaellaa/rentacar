<?php 
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");
require_once(ROOT_DIR."includes/header.php");
?>

<!-- Navbar -->
<?php require_once(ROOT_DIR."includes/navbar.php"); ?>

<!-- Hero Section -->
<div class="container-fluid bg-dark text-white text-center py-5">
    <h1 class="display-4">Welcome to Marcial Motors!</h1>
    <p class="lead">Rent the car of your dreams with ease</p>
</div>

<!-- Slideshow (Carousel) -->
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div id="carouselExampleControls" class="carousel slide my-10" data-bs-ride="carousel" style="width: 80%; max-width: 1200px;">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="public/uploads/cars/luxury.png" class="d-block w-100" alt="Luxury Cars" style="height: auto;">
      </div>
      <div class="carousel-item">
        <img src="public/uploads/cars/economy.png" class="d-block w-100" alt="Economy Cars" style="height: auto;">
      </div>
      <div class="carousel-item">
        <img src="public/uploads/cars/suv.png" class="d-block w-100" alt="SUV Cars" style="height: auto;">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>




<!-- Footer -->
<?php require_once(ROOT_DIR."includes/footer.php"); ?>
