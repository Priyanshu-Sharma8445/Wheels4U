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

    $fetch_sql = "SELECT * FROM user_rent_cars WHERE id = $car_id";
    $result = $conn->query($fetch_sql);

    if ($result->num_rows > 0) {
        $car = $result->fetch_assoc();

        $name=$car['car_name'];
        $cbrand=$car['car_brand'];
        $cmodel=$car['car_model'];
        $ppd=$car['price_per_day'];
        $des=$car['description'];
        $imgp=$car['image'];
        $sts="available";

        $insert_sql = " INSERT INTO `cars`(`car_model`, `brand`, `category`, `price`,`status`, `description`, `image_path`) VALUES ('$name','$cbrand','$cmodel','$ppd','$sts','$des','$imgp')";


        if ($conn->query($insert_sql)) {

            $delete_sql = "DELETE FROM user_rent_cars WHERE id = $car_id";
            $delres = mysqli_query($conn,$delete_sql);
        }

    } 
} 


$conn->close();

header("Location: view_rent_car.php");
?>
