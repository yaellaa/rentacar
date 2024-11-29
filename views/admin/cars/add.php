<?php 
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");
require_once(ROOT_DIR."includes/header.php");
?>

<?php require_once(ROOT_DIR."includes/navbar.php"); ?>

<?php
require_once(ROOT_DIR."views/components/page-guaard.php");

if(isset($_SESSION["error"])){
    $messageErr = $_SESSION["error"];
    unset($_SESSION["error"]);
}

if(isset($_SESSION["success"])){
    $messageSucc = $_SESSION["success"];
    unset($_SESSION["success"]);
}
?>

<!-- Car Rental Maintenance Form -->
<div class="container my-5">
    <h2>Car Rental Maintenance</h2>

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

    <form action="<?php echo BASE_URL;?>app/car/create_car.php" enctype="multipart/form-data" method="POST">
        <div class="row">
            <!-- Left Column: Car Image -->
            <div class="col-md-4 mb-3">
                <label for="carImage" class="form-label">Car Image</label>
                <input type="file" class="form-control" id="carImage" name="carImage" accept="image/*" required>
                <div class="mt-3">
                    <img id="imagePreview" src="" alt="Image Preview" class="img-fluid" style="display: none; max-height: 300px;">
                </div>
            </div>

            <!-- Right Column: Car Details -->
            <div class="col-md-8">
                <div class="row">
                    <!-- Car Model -->
                    <div class="col-md-12 mb-3">
                        <label for="carModel" class="form-label">Car Model</label>
                        <input type="text" class="form-control" id="carModel" name="carModel" placeholder="Enter car model" required>
                    </div>

                    <!-- Car Category -->
                    <div class="col-md-12 mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" name="category" class="form-select" required>
                            <option selected>Choose a category</option>
                            <option value="SUV">SUV</option>
                            <option value="Sedan">Sedan</option>
                            <option value="Luxury">Luxury</option>
                            <option value="Hatchback">Hatchback</option>
                            <!-- Add more categories as needed -->
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="rentalPrice" class="form-label">Rental Price per Day</label>
                        <input type="number" class="form-control" id="rentalPrice" name="rentalPrice" placeholder="Enter rental price" required>
                    </div>

                    <!-- Available Cars -->
                    <div class="col-md-6 mb-3">
                        <label for="availableCars" class="form-label">Available Cars</label>
                        <input type="number" class="form-control" id="availableCars" name="availableCars" placeholder="Enter number of available cars" required>
                    </div>
                </div>

                <!-- Car Description -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Car Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter car description" required></textarea>
                    </div>
                </div>

                <!-- Save Button (aligned to right) -->
                <div class="row">
                    <div class="col-md-12 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Save Car</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script>
    const fileInput = document.getElementById('carImage');
    const imagePreview = document.getElementById('imagePreview');

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0]; // Get the selected file

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Show the image
            }

            reader.readAsDataURL(file);
        }
    });
</script>    

<?php require_once(ROOT_DIR."includes/footer.php"); ?>