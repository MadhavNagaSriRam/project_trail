<?php
session_start();

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Create a connection to the database
$conn = new mysqli('localhost', 'root', '', 'robofootball');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . htmlspecialchars($conn->connect_error));
}

// Fetch the registered data for doubles
$sql = "SELECT team_name, name1, name2, name3, name4, name5, name6, email, branch FROM doubles_database";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Doubles Data</title>
    <style>
        body {
            background-image: url('rm373batch15-bg-05.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: hsl(269, 71%, 7%);
            text-align: center;
            margin: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8);
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Registered Doubles Data</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>
                <tr>
                    <th>Team Name</th>
                    <th>Member 1</th>
                    <th>Member 2</th>
                    <th>Member 3</th>
                    <th>Member 4</th>
                    <th>Member 5</th>
                    <th>Member 6</th>
                    <th>Email</th>
                    <th>Branch</th>
                </tr>
              </thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['team_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name1']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name2']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name3']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name4']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name5']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name6']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['branch']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No data found!</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

    <form method="POST" action="dashboard.php">
        <button type="submit">Go Back</button>
    </form>
</body>
</html>
