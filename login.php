<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registers";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginUsername = $_POST["loginUsername"];
    $loginPassword = $_POST["loginPassword"];

    // Retrieve user data from the database
    $sql = "SELECT * FROM user WHERE username='$loginUsername' AND password='$loginPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful - Redirect to home page
        header("Location: index.html");
        exit(); // Ensure that script execution stops after the header is sent
    } else {
        echo "Invalid credentials. Access denied.";
    }
}

// Close the connection
$conn->close();
?>