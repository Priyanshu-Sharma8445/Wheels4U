<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Category - Wheels4U Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="brandAndCategory.css">

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
        
        <form action="index.php" method="POST" class="simple-form">
            <label for="category-name">Category Name:</label>
            <input type="text" id="category-name" name="category_name" required>
            
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
    <footer>
    <p>&copy; 2024 Wheels4U. All Rights Reserved.</p>
  </footer>
</body>
</html>
