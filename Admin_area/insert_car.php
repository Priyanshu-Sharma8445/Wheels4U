<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Car - Wheels4U Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="insert_car.css">


</head>
<body>
<header>
    <h1><img src="../Images/logo.png" alt="Wheels4U Logo"> Wheels4U</h1>
    
  </header>
    <div class="admin-container">
        <h1>Insert New Car</h1>
        <p>Fill out the form below to add a new car to the Wheels4U inventory.</p>
        
        <form action="insert_car.php" method="POST" enctype="multipart/form-data" class="car-form">
            <label for="car-model">Car Model:</label>
            <input type="text" id="car-model" name="car_model" required>
            
            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand" required>
            
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>
            
            <label for="price">Price Per Day ($):</label>
            <input type="number" id="price" name="price" step="0.01" min="0" required>
            
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="available">Available</option>
                <option value="rented">Rented</option>
                <option value="maintenance">Under Maintenance</option>
            </select>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" placeholder="Enter a brief description of the car" required></textarea>
            
            <label for="car-image">Car Image:</label>
            <input type="file" id="car-image" name="car_image" accept="image/*" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <footer>
    <p>&copy; 2024 Wheels4U. All Rights Reserved.</p>
  </footer>
</body>

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

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $car_model = $_POST['car_model'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $description = $_POST['description'];

    // Handle file upload
    $target_dir = "../Images/";
    $car_image = $_FILES['car_image']['name'];
    $target_file = $target_dir . basename($car_image);
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an image
    $check = getimagesize($_FILES['car_image']['tmp_name']);
    if ($check !== false) {
        $upload_ok = 1;
    } else {
        echo "File is not an image.";
        $upload_ok = 0;
    }

    // Allow certain file formats
    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        $upload_ok = 0;
    }

    // Check if $upload_ok is set to 0 by an error
    if ($upload_ok == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Try to upload file
        if (move_uploaded_file($_FILES['car_image']['tmp_name'], $target_file)) {
            // Prepare SQL insert statement
            $sql = "INSERT INTO cars (car_model, brand, category, price, status, description, image_path) 
                    VALUES ('$car_model', '$brand', '$category', '$price', '$status', '$description', '$target_file')";

            // Execute the query and check for success
            if ($conn->query($sql) === TRUE) {
                echo "New car successfully added to inventory!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    header("Location: index.php");
}

// Close the database connection
$conn->close();
?>


</html>
