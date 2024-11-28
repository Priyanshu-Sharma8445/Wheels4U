<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cars - Wheels4U</title>
  <link rel="stylesheet" href="../client/styles.css">
</head>
<body>
<header style="height: 70px; ">
  <div style="display: flex; justify-content: space-between;">
    <h1 style="margin-top: -18px;"><img src="../Images/logo.png" alt="Wheels4U Logo"> Wheels4U</h1>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="cars.php">Cars</a></li>
        
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
    </nav>
</div>
  </header>

  <section id="cars" class="gallery">
    
    <div>
    <h2>Available Cars</h2>

    </div>
    
<div id="cards">
    
    
<?php
// Database connection variables
$host = 'localhost';
$dbname = 'wheels4u';
$username = 'root';
$password = '';

// Create a MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch car details for model 'Scorpion'

$sql = "SELECT * FROM cars";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the car details into variables
    while ($row = $result->fetch_assoc()) {
    $car_model = $row['car_model'];
    $brand = $row['brand'];
    $category = $row['category'];
    $price = $row['price'];
    $status = $row['status'];
    $description = $row['description'];
    $image_path = $row['image_path'];

    echo "
    <div class=\"car-card\" >
      <img src='$image_path' alt='Car 2'>
      <h3>$car_model</h3>
      <p>Price: $$price/day</p>
    </div>
  ";
  
    }
} else {
    echo "No details found for the car model: " . $car_model;
}

// Close the database connection
$conn->close();
?>






</div>

  </section>

  <footer>
    <p>&copy; 2024 Wheels4U. All Rights Reserved.</p>
  </footer>
</body>
</html>
