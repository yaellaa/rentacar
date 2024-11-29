<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Car Rental</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo htmlspecialchars(BASE_URL); ?>index.php">Home</a>
                </li>

                <?php if (!isset($_SESSION["username"])): ?>
                    <!-- Show Login if the user is not logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo htmlspecialchars(BASE_URL); ?>login.php">Login</a>
                    </li>
                <?php else: ?>

                <?php endif; ?>

                <?php if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == "1"): ?>
                    <!-- Show Manage Cars if the user is an admin -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo htmlspecialchars(BASE_URL); ?>views/admin/cars/index.php">Manage Cars</a>
                    </li>
                <?php endif; ?>

                <!-- Rentals link always visible -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo htmlspecialchars(BASE_URL); ?>rented.php">Rentals</a>
                </li>

                <?php if (isset($_SESSION["fullname"])): ?>
                    <!-- User dropdown if logged in -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION["fullname"]); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="<?php echo htmlspecialchars(BASE_URL); ?>dashboard.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="<?php echo htmlspecialchars(BASE_URL); ?>profile.php">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="<?php echo htmlspecialchars(BASE_URL); ?>logout.php" method="POST">
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
