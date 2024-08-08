<?php
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$gender = htmlspecialchars($_POST['gender']);
$gmail = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$number = htmlspecialchars($_POST['number']);
// Hash the password
// $password_hashed = password_hash($password, PASSWORD_DEFAULT);
// Database connection
$conn = new mysqli('localhost', 'root', '', 'trash');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO table_00112(firstName, lastName, gender, gmail, password, number) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $gmail, $password, $number);
    $execval = $stmt->execute();
    if (!$execval) {
        die("Error executing statement: " . $stmt->error);
    }
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>
