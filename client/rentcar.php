<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'wheels4u');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $owner_username = $_SESSION['user']; // Assuming the user is logged in
    $car_name = $_POST['car_name'];
    $car_brand = $_POST['car_brand'];
    $car_model = $_POST['car_model'];
    $year = $_POST['year'];
    $price_per_day = $_POST['price_per_day'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    // Image upload
    $target_dir = "../Images/";
    $car_image = $_FILES['car_image']['name'];
    $target_file = $target_dir . basename($car_image);

    // Insert data into the 'cars' table
    $sql = "INSERT INTO user_rent_cars (owner_username, car_name, car_brand, car_model, year, price_per_day, location, description, image) 
            VALUES ('$owner_username', '$car_name', '$car_brand', '$car_model', '$year', '$price_per_day', '$location', '$description', '$target_file')";

    if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($_FILES['car_image']['tmp_name'], $target_file)) {
            $success = "Car listed successfully!";
        } else {
            $error = "Failed to upload the car image.";
        }
    } else {
        $error = "Error listing the car. Please try again!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Your Car</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('../Images/front2.jpg') no-repeat center center/cover;
        }
        #body-form {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            
           
            position: relative;
            
        }
        #body-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }
        .form-container {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
            padding: 20px 30px;
            width: 100%;
            max-width: 500px;
            color: #fff;
            margin:20px;
            
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }
        .form-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-container input, 
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            
        }
        .form-container input::placeholder, 
        .form-container textarea::placeholder {
            color: #ddd;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: rgba(0, 123, 255, 0.8);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container button:hover {
            background-color: rgba(0, 123, 255, 1);
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background: #ffffff00;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<header>
    <h1><img src="../Images/logo.png" alt="Wheels4U Logo"> Wheels4U</h1>

    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="cars.php">Cars</a></li>
        <li><a href="rent.php">Rent Now</a></li>
        <li><a href="rentcar.php">Rent Your car</a></li>
        <li><a href="contact.html">Contact Us</a></li>
        <li><a href=" ../login/logout.php">Logout</a></li>
      </ul>
    </nav>

    </header>
<div id="body-form">
    <div class="form-container">
        <h2>Rent Your Car</h2>
        <?php 
            if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } 
            if (isset($success)) { echo "<p style='color: green;'>$success</p>"; }
        ?>
        <form method="POST" enctype="multipart/form-data">
            <label>Car Name:</label>
            <input type="text" name="car_name" placeholder="Enter the car name" required>
            
            <label>Car Brand:</label>
            <input type="text" name="car_brand" placeholder="Enter the car brand" required>
            
            <label>Car Model:</label>
            <input type="text" name="car_model" placeholder="Enter the car model" required>
            
            <label>Year of Manufacture:</label>
            <input type="number" name="year" placeholder="Enter the year" required>
            
            <label>Price Per Day (₹):</label>
            <input type="number" name="price_per_day" placeholder="Enter the price per day" required>
            
            <label>Location:</label>
            <input type="text" name="location" placeholder="Enter the location" required>
            
            <label>Description:</label>
            <textarea name="description" rows="4" placeholder="Describe your car (e.g., features, condition)" required></textarea>
            
            <label>Upload Car Image:</label>
            <input type="file" name="car_image" accept="image/*" required>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
