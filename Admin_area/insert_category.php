<?php

$host = "localhost";
$username = "root";  
$password = "";      
$dbname = "wheels4u"; 


$conn = new mysqli($host, $username, $password, $dbname);


if (isset($_POST['sb'])) {
    $cat_name = $_POST['category_name'];

    $sql = "INSERT INTO category (name) VALUES ('$cat_name')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('ategory added successfully!');</script>";
        header("Location: index.php");
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Category - Wheels4U Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="brandAndCategory.css">
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
      </ul>
    </nav>
  </header>
    <div class="admin-container">
        <h1>Insert New Category</h1>
        <p>Fill out the form below to add a new category to the Wheels4U platform.</p>
        
        <form method="POST" class="simple-form">
            <label for="category-name">Category Name:</label>
            <input type="text" id="category-name" name="category_name" required>
            
            <button type="submit" class="submit-btn" name="sb">Submit</button>
        </form>
    </div>
    <footer>
    <p>&copy; 2024 Wheels4U. All Rights Reserved.</p>
  </footer>
</body>
</html>
