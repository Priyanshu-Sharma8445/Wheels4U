<?php

$host = 'localhost';
$dbname = 'wheels4u';
$username = 'root';
$password = '';


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_GET['id'])) {
    $car_id = $_GET['id'];   

            $delete_sql = "DELETE FROM user_rent_cars WHERE id = $car_id";
            $delres = mysqli_query($conn,$delete_sql);
}

$conn->close();

header("Location: view_rent_car.php");
?>
