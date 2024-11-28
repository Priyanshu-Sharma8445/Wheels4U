<?php

$host = 'localhost';
$dbname = 'wheels4u';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM orders";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View All Cars</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="navbarStyling.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            margin: 40px auto;
            width: 90%;
            max-width: 1200px;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        
    </style>
</head>
<body>

<header>
    <h1><img src="../Images/logo.png" alt="Wheels4U Logo"> Wheels4U</h1>
    <nav>
      <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="insert_car.php">Insert Car</a></li>
        <li><a href="view_cars.php">View Cars</a></li>
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
    </nav>
  </header>

<div class="container">
    <h2>All Cars in the Inventory</h2>

    <?php
    if ($result->num_rows > 0) {
        // Start the table
        echo "<table>";
        echo "<tr>
                <th>Order ID</th>
                <th>Car Name</th>
                <th>Order BY</th>
                <th>Day of booking</th>
                <th>Day of return</th>
                <th>Days</th>
                <th>Total Cost</th>
              </tr>";

        // Loop through and display each car in a row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['order_id'] . "</td>
                    <td>" . $row['car_model'] . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['day_of_booking'] . "</td>
                    <td>" . $row['day_of_return'] . "</td>
                    <td>" . $row['days'] . "</td>
                    <td>" . $row['total_cost'] . "</td> 
                  </tr>";

                  
        }

        echo "</table>";
    } else {
        echo "<p>No cars found in the inventory.</p>";
    }


    $conn->close();
    ?>
</div>

</body>
</html>
