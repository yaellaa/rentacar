<?php
if(!isset($_SESSION)){
    session_start();
}
require_once(__DIR__."/../config/Directories.php"); //to handle folder specific path
include("../config/DatabaseConnect.php"); //to access database connection

$db = new DatabaseConnect(); //make a new database instance
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $car_name = htmlspecialchars($_POST["car_name"]);
    $rental_price  = htmlspecialchars($_POST["rental_price"]);

    if(trim($car_name) == "" || empty($car_name)){
        $_SESSION['error'] = "Product Id field is empty";
        header("location: ".BASE_URL."views/cars/car.php?id=".$car_name["car_name"]);
        exit;
    }
    if(trim($rental_price) == ""  || empty($rental_price)){
        $_SESSION['error'] = "Rent field is empty";
        header("location: ".BASE_URL."views/cars/car.php");
        exit;
    }

    
    try {
        $conn = $db->connectDB();
        $sql = "SELECT * FROM cars WHERE cars.id = :p_car_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':p_car_id', $cars);
        
        if(!$stmt->execute()){
            $_SESSION['error'] = "Cannot find the car";
            header("location: ".BASE_URL."views/cars/car.php");
            exit;
        }
        $product = $stmt->fetch();
        $totalPrice = (floatval($rental_price) * floatval($cars["unit_price"]));
        
        //insert into cart
        $sql = "INSERT INTO carts (car_id,unit_price,total_price,created_at,updated_at) 
        VALUES (:p_car_id,:p_unit_price,:p_total_price,NOW(),Now()) ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':p_car_name', $car_name);
        $stmt->bindParam(':p_unit_price', $cars["unit_price"]);
        $stmt->bindParam(':p_total_price', $totalPrice);
        if(!$stmt->execute()){
            $_SESSION['error'] = "Failed to add to cart";
            header("location: ".BASE_URL."views/cars/car.php");
            exit;
        }
        
        $_SESSION["success"] = "Successfully added to cart";
        header("location: ".BASE_URL."views/cars/car.php?id=".$cars["car_id"]);
        exit;
    } catch(Exception $e){
        $_SESSION["error"] = "Connection Failed: " . $e->getMessage();
        header("location: ".BASE_URL."views/admin/cars/add.php");
        exit;
    }
}