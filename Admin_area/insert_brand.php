<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Brand - Wheels4U Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="brandAndCategory.css">

</head>
<body>
<header>
    <h1><img src="../Images/logo.png" alt="Wheels4U Logo"> Wheels4U</h1>
    
  </header>
    <div class="admin-container">
        <h1>Insert New Brand</h1>
        <p>Fill out the form below to add a new brand to the Wheels4U platform.</p>
        
        <form action="index.php" method="POST" class="simple-form">
            <label for="brand-name">Brand Name:</label>
            <input type="text" id="brand-name" name="brand_name" required>
            
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
    <footer>
    <p>&copy; 2024 Wheels4U. All Rights Reserved.</p>
  </footer>
</body>
</html>
