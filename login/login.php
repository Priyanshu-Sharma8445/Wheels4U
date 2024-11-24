<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Login Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: url('../Images/front2.jpg') no-repeat center center/cover;
            position: relative;
        }
        /* Black overlay */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }
        .form-container {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
            padding: 20px 30px;
            width: 100%;
            max-width: 400px;
            color: #fff;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }
        .form-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-container input, 
        .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }
        .form-container input::placeholder, 
        .form-container select {
            color: #ddd;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: rgba(0, 123, 255, 0.8);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container button:hover {
            background-color: rgba(0, 123, 255, 1);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST" action="">
            <label>Username:</label>
            <input type="text" name="username" placeholder="Enter your username" required>
            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter your password" required>
            <label>Role:</label>
            <select name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
