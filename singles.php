<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'robofootball');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . htmlspecialchars($conn->connect_error));
}

// Fetch data from singles_database
$sql = "SELECT * FROM singles_database";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Singles Data</title>
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
            padding: 8px;
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
    <h1>Registered Singles Data</h1>

    <table>
        <thead>
            <tr>
                <th>Team Name</th>
                <th>Name 1</th>
                <th>Name 2</th>
                <th>Name 3</th>
                <th>Email</th>
                <th>Branch</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['team_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name1']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name2']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name3']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['branch']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <form method="POST" action="dashboard.php">
        <button type="submit">Go Back</button>
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
