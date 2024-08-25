<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Define the correct username and password
    $correct_username = "DEPT OF AIR";
    $correct_password = "THE PRIDE OF ADITYA COLLEGE";

    // Check if the submitted credentials match
    if ($username === $correct_username && $password === $correct_password) {
        // Start the session and redirect to the dashboard
        $_SESSION['loggedin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        // Credentials are incorrect, show an error message
        echo '<script>alert("Incorrect username or password!"); window.location.href = "login.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
    <style>
        body {
            background-image: url('rm373batch15-bg-05.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: hsl(269, 71%, 7%);
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.301);
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-top: 100px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .button1 {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="header">
    <button onclick="location.href='index.html'">Home</button>
</div>
<div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="button1">Login</button>
    </form>
</div>
</body>
</html>
