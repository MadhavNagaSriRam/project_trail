<?php
session_start();

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            background-image: url('rm373batch15-bg-05.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: hsl(269, 71%, 7%);
            text-align: center;
            margin-top: 150px;
        }
        .button-container {
            display: inline-block;
        }
        button {
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin: 20px;
            font-size: 18px;
        }
        .logout-button {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <button onclick="location.href='singles.php'">Singles</button>
        <button onclick="location.href='doubles.php'">Doubles</button>
        <form method="POST" style="display:inline;">
            <button type="submit" name="logout" class="logout-button">Logout</button>
        </form>
    </div>
</body>
</html>
