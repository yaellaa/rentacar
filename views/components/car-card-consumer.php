<div class="col-md-3">
                <div class="card">
                    <a href="<?php echo BASE_URL; ?>views/car/cars.php?id=<?php echo $cars["car_name"]?>">
                        <img src="<?php echo BASE_URL. $cars["image_url"]; ?>" class="card-img-top" alt="Car 1">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $cars["car_name"]; ?></h5>
                        <p class="card-text">Php<?php echo number_format ($cars["rental_price"],2); ?></p>

                        <form action="<?php echo BASE_URL;?>app/rent/rentacar.php" method="POST">
                            <input type="hidden" class="form-control" id="car_name" name="car_name" value="<?php echo $cars["car_name"]; ?>">
                            <input type="hidden" class="form-control" id="price" name="price" value="1">
                            <button href="#" class="btn btn-dark" <?php echo ($cars ["availability"] <= 0 ? "disabled" : "");?>><?php echo ($cars["availability"] <= 0 ? "Soldout" : "Rent a Car"); ?></button>
                        </form>
                    </div>
                </div>
            </div>