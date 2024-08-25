<!DOCTYPE html>
<html>
<head>
    <title>Double's Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url('rm373batch15-bg-05.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; color: hsl(269, 71%, 7%);">

<div class="header">
    <button onclick="location.href='index.html'">Home</button>
    <button onclick="location.href='login.html'">Login</button>
</div>

<div class="football-container1" style="background-color: rgba(255, 255, 255, 0.301);">
    <h1 align="center">Welcome to Double's Team Registration</h1>

    <?php
    // Create a connection to the database
    $conn = new mysqli('localhost', 'root', '', 'robofootball');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . htmlspecialchars($conn->connect_error));
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data and sanitize it
        $team_name = htmlspecialchars($_POST['team_name']);
        $name1 = htmlspecialchars($_POST['name1']);
        $name2 = htmlspecialchars($_POST['name2']);
        $name3 = htmlspecialchars($_POST['name3']);
        $name4 = htmlspecialchars($_POST['name4']);
        $name5 = htmlspecialchars($_POST['name5']);
        $name6 = htmlspecialchars($_POST['name6']);
        $email = htmlspecialchars($_POST['email']);
        $branch = htmlspecialchars($_POST['branch']);

        // Insert data into the database
        $insert_sql = "INSERT INTO doubles_database (team_name, name1, name2, name3, name4, name5, name6, email, branch) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("sssssssss", $team_name, $name1, $name2, $name3, $name4, $name5, $name6, $email, $branch);

        if ($stmt->execute()) {
            // Show a success pop-up
            echo "<script>alert('Registration successful!');</script>";
        } else {
            // Show an error pop-up
            echo "<script>alert('Registration failed. Please try again.');</script>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    <form method="POST">
        <div>
            <img src="rm373batch15-bg-05.jpg" width="35%" height="30%" align="right" style="padding-right: 75px;padding-top: 65px;">
        </div>
        <ol type="a" style="align-content: center;">
            <li>Please enter your team name: <input type="text" placeholder="Team Name" name="team_name" required></li>
            <li>
                Please enter your teammates
                <ol type="1">
                    <li>Please enter your name: <input type="text" placeholder="Name" name="name1" required></li>
                    <li>Please enter your name: <input type="text" placeholder="Name" name="name2" required></li>
                    <li>Please enter your name: <input type="text" placeholder="Name" name="name3" required></li>
                    <li>Please enter your name: <input type="text" placeholder="Name" name="name4" required></li>
                    <li>Please enter your name: <input type="text" placeholder="Name" name="name5" required></li>
                    <li>Please enter your name: <input type="text" placeholder="Name" name="name6" required></li>
                </ol>
            </li>
            <li>Please enter your e-mail: <input type="email" placeholder="e-mail" name="email" required></li>
            <li>Please enter your college branch: <input type="text" placeholder="Branch" name="branch" required></li>
        </ol>
        <center><button class="submit-button" type="submit"><span>Submit</span></button></center>
    </form>
</div>

</body>
</html>
