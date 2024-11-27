<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Wheels4U</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="navbarStyling.css">
    
    
</head>
<body>
  <header>
    
    
    <h1><img src="../Images/logo.png" alt="Wheels4U Logo"> Wheels4U</h1>
    
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="insert_car.php">Insert Car</a></li>
        <li><a href="view_cars.php">View Cars</a></li>
        <li><a href="contact.html">Contact Us</a></li>        
        <li><a href=" ../login/logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <center style="margin:20px"><h1>Welcome, <?php echo $_SESSION['admin']; ?>!</h1></center>
    <div class="admin-container">
        <h1>Admin Dashboard</h1>
        <p>Welcome to the Wheels4U Admin Panel. Use the options below to manage the platform.</p>
        
        <div class="admin-links">
            <a href="insert_car.php">Insert New Car</a>
            <a href="insert_brand.php">Insert New Brand</a>
            <a href="insert_category.php">Insert New Category</a>
            <a href="view_cars.php">View Cars</a>
            <a href="view_rent_car.php">View Rent Cars uploaded by user</a>
            <a href="view_categories.html">View Categories</a>
            <a href="view_brands.html">View Brands</a>
            <a href="view_orders.html">View All Orders</a>
        </div>
    </div>

    <footer>
    <p>&copy; 2024 Wheels4U. All Rights Reserved.</p>
  </footer>
</body>
</html>
