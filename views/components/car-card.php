<div class="col-md-4 mb-4">
    <div class="card">
    <img src="<?php echo BASE_URL . $cars['image_url']; ?>" class="card-img-top" alt="Car Image">

        <div class="card-body">
            <h5 class="card-title"><?php echo $cars['car_name']; ?></h5>
            <p class="card-text">Category: <?php echo $cars['category_id']; ?></p>
            <p class="card-text">Rental Price: $<?php echo number_format($cars['rental_price'], 2); ?> per day</p>
            <p class="card-text">Available: <?php echo $cars['availability']; ?> units</p>
            <a href="<?php echo BASE_URL; ?>views/admin/cars/edit.php?id=<?php echo $cars['id']; ?>" class="btn btn-primary">Edit Car</a>
            <a href="<?php echo BASE_URL; ?>app/car/delete_car.php?id=<?php echo $cars['id']; ?>" class="btn btn-danger">Delete Car</a>
        </div>
    </div>
</div>
