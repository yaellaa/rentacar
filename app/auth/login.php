<?php
// Received user input
$username = $_POST["username"];
$password = $_POST["password"];

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Hardcoded admin username and password for simplicity
    $admin_username = "admin"; // Admin username
    $admin_password = "admin123"; // Admin password (hashed or plaintext)

    // Check if the provided credentials match the admin credentials
    if ($username === $admin_username && password_verify($password, password_hash($admin_password, PASSWORD_DEFAULT))) {

        // Start session and store admin data in session variables
        $_SESSION = [];
        session_regenerate_id(true);
        $_SESSION["is_admin"] = true;
        $_SESSION["username"] = $username;  // Admin's username

        // Redirect to admin dashboard
        header("Location: /index.php");
        exit(); // Stop further script execution after redirection

    } else {
        // Incorrect login credentials
        echo "Invalid credentials. Only admin can log in.";
    }
}
?>
