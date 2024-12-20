<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wheels4U - Rent Your Ride</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    /* Additional styling for the features container */
    body {
      background-color: #000000;
    }

    #features {
      background-color: #000000;
      padding: 30px 20px;
      text-align: center;
    }

    #features h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #ffffff;
    }

    #features ul {
      list-style: none;
      padding: 0;
    }

    #features ul li {
      font-size: 1.2rem;
      margin: 10px 0;
      color: #ffffff;
    }

    #features .actions {
      margin-top: 100px;
    }

    #features .actions a {
      text-decoration: none;
      font-size: 1rem;
      margin: 0 10px;
      padding: 10px 20px;
      background-color: #343a40;
      color: #fff;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    #features .actions a:hover {
      background-color: #61666a;
    }

    #body_feature {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 50vh;
      background-color: #000000;
      gap: 20px;
    }

    .feature-container {
      text-align: center;
      width: 300px;
      padding: 20px;
      color: white;
      background: #343a40;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hover effect for feature container */
    .feature-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Feature logo */
    .feature-logo {
      /* width: 80px; */
      height: 75px;
      margin-bottom: 0px;
      border-radius: 50%;
      /* background-color: white; */
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 2rem;
    }

    /* Feature heading */
    .feature-heading {
      font-size: 1.5rem;
      color: white;
      margin: 0;
    }
    
  </style>
</head>

<body>
<header style="height: 70px; ">
  <div style="display: flex; justify-content: space-between;">
    <h1 style="margin-top: -18px;"><img src="../Images/logo.png" alt="Wheels4U Logo"> Wheels4U</h1>

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
  </div>
    </header>

      <section id="home">
        <h2>Welcome <?php echo $_SESSION['user']; ?>! to Wheels4U</h2>
        
        <p>Your gateway to affordable and reliable vehicle rentals.</p>
      </section>


      <section id="features">
        <h2>Our Features</h2>

        <!-- Features Section -->
        <div id="body_feature">

          <div class="feature-container">
            <div class="feature-logo">
              <i class="fas fa-car"></i>

            </div>
            <h3 class="feature-heading">Wide Range of Vehicles</h3>
          </div>

          <div class="feature-container">
            <div class="feature-logo">
              <i class="fas fa-dollar-sign"></i>
            </div>
            <h3 class="feature-heading">Affordable rental prices</h3>
          </div>


          <div class="feature-container">
            <div class="feature-logo">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <h3 class="feature-heading">Hassle-free booking process</h3>
          </div>
          <div class="feature-container">
            <div class="feature-logo">
              <i class="fas fa-headset"></i>
            </div>
            <h3 class="feature-heading">24/7 customer support</h3>
          </div>

        </div>

        
      </section>


      







      <footer style="margin-top: 40px;">
        <p>&copy; 2024 Wheels4U. All Rights Reserved.</p>
      </footer>

      <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>