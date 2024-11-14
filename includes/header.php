<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Navbar styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }
        
        .navbar a {
            color: #333;
            text-decoration: none;
            margin-left: 15px;
        }
        
        /* Hero section styling */
        .hero {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 50px 20px;
        }
        
        .hero h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        
        /* Category section styling */
        .categories {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
            padding: 0 20px;
        }
        
        .category-card {
            width: 200px;
            padding: 20px;
            background-color: #f1f1f1;
            text-align: center;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        
        .category-card img {
            width: 100%;
            height: auto;
            background-color: #ddd; /* Placeholder color */
        }
        
        .category-card button {
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        /* Featured products section styling */
        .featured-products {
            padding: 0 20px;
        }
        
        .featured-products h2 {
            text-align: center;
            margin-top: 40px;
        }
        
        .product-list {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        
        .product-card {
            width: 150px;
            padding: 15px;
            background-color: #f1f1f1;
            text-align: center;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        
        .product-card img {
            width: 100%;
            height: auto;
            background-color: #ddd; /* Placeholder color */
        }
    </style>
</head>
<body>