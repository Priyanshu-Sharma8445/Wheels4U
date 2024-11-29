<?php

$host = 'localhost';
$dbname = 'wheels4u';
$username = 'root';
$password = '';


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM user_rent_cars";
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
        td img {
            width: 150px;
            height: auto;
        }
        .action-ac-btn {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom:2px;
        }
        .action-ac-btn:hover {
            background-color: green;
        }
        .action-de-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-top:2px;
        }
        .action-de-btn:hover {
            background-color: green;
        }
        .action{
            width:120px;
            height:154px;
            display:flex;
            flex-direction:column;
            gap:40px;
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

        echo "<table>";
        echo "<tr>
                <th>Owner Name</th>
                <th>Car Name</th>
                <th>Car Brand</th>
                <th>Car Model</th>
                <th>Manufacturing Year</th>
                <th>Price Per Day ($)</th>
                <th>Location</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>";


        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['owner_username'] . "</td>
                    <td>" . $row['car_name'] . "</td>
                    <td>" . $row['car_brand'] . "</td>
                    <td>" . $row['car_model'] . "</td>
                    <td>" . $row['year'] . "</td>
                    <td>" . $row['price_per_day'] . "</td>
                    <td>" . $row['location'] . "</td>
                    <td>" . $row['description'] . "</td>
                    

                    <td><img src='". $row['image'] . "' alt='" . $row['car_model'] . "'></td>

                    <td class='action'>
                        <a href='action.php?id=" . $row['id'] . "' class='action-ac-btn'>Accept</a>
                        <a href='actiondelete.php?id=" . $row['id'] . "' class='action-de-btn'>Reject</a>
                    </td>

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
