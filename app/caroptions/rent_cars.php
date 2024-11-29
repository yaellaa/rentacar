
<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once(__DIR__ . "/../config/Directories.php"); // to handle folder specific path
include("../config/DatabaseConnect.php"); // to access database connection

$db = new DatabaseConnect(); // make a new database instance

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collecting input data for the car listing
    $carName = htmlspecialchars($_POST["carName"]);
    $carDesc = htmlspecialchars($_POST["description"]);
    $category = htmlspecialchars($_POST["category"]);
    $basePrice = htmlspecialchars($_POST["basePrice"]);
    $availability = htmlspecialchars($_POST["availability"]);
    $rentalPrice = htmlspecialchars($_POST["rentalPrice"]);
    $totalPrice = htmlspecialchars($_POST["totalPrice"]);

    // Validation: Check if all required fields are filled
    if (trim($carName) == "" || trim($carDesc) == "" || trim($category) == "" || trim($basePrice) == "" || 
        trim($availability) == "" || trim($rentalPrice) == "" || trim($totalPrice) == "") {
        $_SESSION["error"] = "Please fill in all the fields";
        header("location: " . BASE_URL . "views/admin/cars/add.php");
        exit();
    }

    // Check if an image is uploaded
    if (!isset($_FILES['carImage']) || $_FILES['carImage']['error'] != 0) {
        $_SESSION['error'] = 'No Image Attached';
        header("location: " . BASE_URL . "views/admin/cars/add.php");
        exit;
    }

    try {
        // Connect to the database
        $conn = $db->connectDB();
        $sql = "INSERT INTO cars (car_name, car_description, category_id, base_price, availability, rental_price, total_price, created_at, updated_at) 
                VALUES (:p_car_name, :p_car_description, :p_category_id, :p_base_price, :p_availability, :p_rental_price, :p_total_price, NOW(), NOW())";
        $stmt = $conn->prepare($sql);

        // Prepare data for insertion
        $data = [
            ':p_car_name' => $carName,
            ':p_car_description' => $carDesc,
            ':p_category_id' => $category,
            ':p_base_price' => $basePrice,
            ':p_availability' => $availability,
            ':p_rental_price' => $rentalPrice,
            ':p_total_price' => $totalPrice
        ];

        // Execute the query to insert the car record
        if (!$stmt->execute($data)) {
            $_SESSION['error'] = 'Failed to Insert Car Record';
            header("location: " . BASE_URL . "views/admin/cars/add.php");
            exit;
        }

        // Get the ID of the inserted car
        $lastId = $conn->lastInsertId();

        // Process the uploaded image
        $error = processImage($lastId);
        if ($error) {
            $_SESSION["error"] = $error;
            header("location: " . BASE_URL . "views/admin/cars/add.php");
            exit;
        }

        // Set success message and redirect
        $_SESSION["success"] = "Car Added Successfully";
        header("location: " . BASE_URL . "views/admin/cars/index.php");
        exit;
    } catch (Exception $e) {
        // Database connection failed
        $_SESSION["error"] = "Connection Failed: " . $e->getMessage();
        header("location: " . BASE_URL . "views/admin/cars/add.php");
        exit;
    }
}

function processImage($id)
{
    global $db;
    // Get the uploaded image details
    $path = $_FILES['carImage']['tmp_name'];
    $fileName = $_FILES['carImage']['name'];
    $filetype = mime_content_type($path);

    // Check if the image is either jpg or png
    if ($filetype != 'image/jpeg' && $filetype != 'image/png') {
        return "File is not a jpg/png file";
    }

    // Rename the image to prevent collisions and to make it unique
    $newFileName = md5(uniqid($fileName, true));
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $hashedName = $newFileName . '.' . $fileExt;

    // Move the image to the project folder
    $destination = ROOT_DIR . 'public/uploads/cars/' . $hashedName;
    if (!move_uploaded_file($path, $destination)) {
        return "Transferring image failed";
    }

    // Update the image URL in the 'cars' table
    $imageUrl = 'public/uploads/cars/' . $hashedName;
    $conn = $db->connectDB();
    $sql = 'UPDATE cars SET image_url = :p_image_url WHERE id = :p_id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':p_image_url', $imageUrl);
    $stmt->bindParam(':p_id', $id);
    $stmt->execute();
    if (!$stmt->execute()) {
        return "Failed to upload the image URL";
    }

    // Return null if no error
    return null;
}
