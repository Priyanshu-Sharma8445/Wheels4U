<?php

$host = 'localhost';
$dbname = 'wheels4u';
$username = 'root';
$password = '';


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_GET['car_model'])) {
    $car_mod = $_GET['car_model'];

    $delete_sql = "DELETE FROM cars WHERE `car_model` = '$car_mod'";
    $result = $conn->query($delete_sql);
    if($result)
    {
        echo "<script>alert('Car deleted succesfully!! ')</script>";
    }
} 


$conn->close();

header("Location: view_cars.php");
?>