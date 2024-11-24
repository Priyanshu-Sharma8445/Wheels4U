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

// Query to fetch all cars from the database
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rent a Car - Wheels4U</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1><img src="../Images/logo.png" alt="Wheels4U Logo"> Wheels4U</h1>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="cars.php">Cars</a></li>
        <li><a href="rent.php">Rent Now</a></li>
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
    </nav>
  </header>

  <section id="rent">
    <h2>Rent a Car Now</h2>
    <form id="rentalForm">
      <label for="car">Select Car:</label>
      <select id="car" name="car">
        
        
        <?php
   while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['car_model'] . "' data-price='" . $row['price'] . "'>" . $row['car_model'] . "</option>";
}
?>



      </select>

      <label for="days">Number of Days:</label>
      <input type="number" id="days" name="days" min="1" required>

      <button type="button" onclick="calculateCost()">Calculate Cost</button>
      <p id="cost"></p>
    </form>
  </section>

  <footer>
    <p>&copy; 2024 Wheels4U. All Rights Reserved.</p>
  </footer>

  <script src="script.js"></script>
  <script>
    // JavaScript to auto-select the car model based on URL parameter
    document.addEventListener('DOMContentLoaded', () => {
      const urlParams = new URLSearchParams(window.location.search);
      const carModel = urlParams.get('car');
      if (carModel) {
        document.getElementById('car').value = carModel;
      }
    });
  </script>
</body>
</html>

