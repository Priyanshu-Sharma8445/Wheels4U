<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cars - Wheels4U</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1><img src="../Images/logo.png" alt="Wheels4U Logo"> Wheels4U</h1>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="cars.php">Cars</a></li>
        <li><a href="rent.html">Rent Now</a></li>
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
    </nav>
  </header>

  <section id="cars" class="gallery">
    
    <div>
    <h2>Available Cars</h2>

    </div>
    
<div id="cards">
    <!-- Each car card includes a link to the rent page with the car model passed as a parameter -->
    <!-- <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+1'">
      <img src="../Images/fortuner.jpg" alt="Car 1">
      <h3>Fortuner</h3>
      <p>Price: $50/day</p>
    </div>

    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/Mahindra-Scorpio.jpg" alt="Car 2">
      <h3>Mahindra-Scorpio</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/Mahindra XUV700.jpeg" alt="Car 2">
      <h3>Mahindra XUV700</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/urus.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/endeavour.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/gloster.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/gls600.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/harrier.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/hondacity.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/pajero.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/tharroxx.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/a8l.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/amgg63.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div>
    <div class="car-card" onclick="window.location.href='rent.html?car=Car+Model+2'">
      <img src="../Images/bmwx7.jpg" alt="Car 2">
      <h3>Car Model 2</h3>
      <p>Price: $70/day</p>
    </div> -->
    

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
    <div class=\"car-card\" onclick=\"window.location.href='rent.html?car=$car_model'\" >
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
