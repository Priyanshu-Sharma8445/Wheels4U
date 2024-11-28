<?php

session_start();

$car_model = htmlspecialchars($_GET['car_model']);
$days = intval($_GET['days']);
$cost = floatval($_GET['cost']);

$conn = new mysqli('localhost', 'root', '', 'wheels4u');

$username = $_SESSION['user']; 



if (isset($_POST['sb']))
{
    $car_model = $_POST['car_model'];
    $days = $_POST['days'];
    $cost = $_POST['cost'];
    $day_of_booking = date('Y-m-d');

    $day_of_return = date('Y-m-d', strtotime("+$days days", strtotime($day_of_booking)));


    $sql_insert = "INSERT INTO `orders` (`car_model`, `username`, `day_of_booking`, `day_of_return`, `days`, `total_cost`) VALUES ('$car_model', '$username', '$day_of_booking', '$day_of_return', $days, $cost)";
   
    $sql_update = "UPDATE `cars` SET `status`='rented' WHERE `car_model` = '$car_model'";
    $result1 = mysqli_query($conn,$sql_insert);
    $result2 = mysqli_query($conn,$sql_update);
    if($result1 && $result2)
    {
        header("Location: cars.php");
        exit(); 
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment - Wheels4U</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
      color: #333;
    }

    header {
      background-color:#343a40;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }

    header h1 {
      margin: 0;
      font-size: 24px;
    }

    .container {
      max-width: 800px;
      margin: 30px auto;
      padding: 20px;
      background: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      height:500px;
      display:flex;
      flex-direction:column;
      justify-content:center;
    }

    .details {
      margin-bottom: 20px;
      padding: 10px 0;
      border-bottom: 1px solid #ddd;
    }

    .details p {
      margin: 8px 0;
      font-size: 18px;
    }

    .details p strong {
      color: #555;
    }

    .form-container {
      text-align: center;
    }

    .form-container button {
      background-color: #28a745;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .form-container button:hover {
      background-color: #218838;
    }

    footer {
      text-align: center;
      padding: 15px 0;
      background-color: #343a40;
      color: #fff;
      margin-top: 150px;
     
    }
    .form-container img{
        height:230px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Wheels4U - Payment Gateway</h1>
  </header>

  <div class="container">
    <div class="details">
      <p><strong>Car Model:</strong> <?php echo $car_model; ?></p>
      <p><strong>Number of Days:</strong> <?php echo $days; ?></p>
      <p><strong>Total Cost:</strong> $<?php echo $cost; ?></p>
    </div>

    <div class="form-container">
        <img src="../Images/qrcode.png" alt="paymentqr">
      <form  method="POST">
        <input type="hidden" name="car_model" value="<?php echo $car_model; ?>">
        <input type="hidden" name="days" value="<?php echo $days; ?>">
        <input type="hidden" name="cost" value="<?php echo $cost; ?>">
        <button type="submit" name="sb">Proceed to Pay</button>
      </form>
    </div>
  </div>

  <footer>
    <p>&copy; 2024 Wheels4U. All Rights Reserved.</p>
  </footer>
</body>
</html>
