<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental - HANQI</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar with Dropdown for User Account (Admin) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="homepage.html">HANQI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="homepage.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-dashboard.html">Dashboard</a>
                    </li>

                    <!-- Dropdown for Admin User -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            AdminUser <!-- Replace with dynamic admin username -->
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.html">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Car Maintenance Form -->
    <div class="container my-5">
        <h2>Car Maintenance</h2>
        <form>
            <div class="row">
                <!-- Left Column: Car Image -->
                <div class="col-md-4 mb-3">
                    <label for="carImage" class="form-label">Car Image</label>
                    <input type="file" class="form-control" id="carImage" accept="image/*">
                </div>

                <!-- Right Column: Car Details -->
                <div class="col-md-8">
                    <div class="row">
                        <!-- Car Model Name -->
                        <div class="col-md-12 mb-3">
                            <label for="carModelName" class="form-label">Car Model</label>
                            <input type="text" class="form-control" id="carModelName" placeholder="Enter car model name">
                        </div>

                        <!-- Car Category -->
                        <div class="col-md-12 mb-3">
                            <label for="carCategory" class="form-label">Category</label>
                            <select id="carCategory" class="form-select">
                                <option selected>Choose a category</option>
                                <option value="1">SUV</option>
                                <option value="2">Sedan</option>
                                <option value="3">Sports Car</option>
                                <option value="4">Luxury</option>
                                <!-- Add more categories as needed -->
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Number of Cars Available -->
                        <div class="col-md-4 mb-3">
                            <label for="numberOfCars" class="form-label">Number of Cars Available</label>
                            <input type="number" class="form-control" id="numberOfCars" placeholder="Enter number of cars available" oninput="calculateTotalPrice()">
                        </div>

                        <!-- Rental Price per Day -->
                        <div class="col-md-4 mb-3">
                            <label for="rentalPrice" class="form-label">Rental Price per Day</label>
                            <input type="number" step="0.01" class="form-control" id="rentalPrice" placeholder="Enter rental price per day" oninput="calculateTotalPrice()">
                        </div>

                        <!-- Total Rental Price (Automatically Calculated) -->
                        <div class="col-md-4 mb-3">
                            <label for="totalRentalPrice" class="form-label">Total Rental Price</label>
                            <input type="text" class="form-control" id="totalRentalPrice" placeholder="Total Rental Price" readonly>
                        </div>
                    </div>

                    <!-- Car Description -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="carDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="carDescription" rows="3" placeholder="Enter car description"></textarea>
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

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
