<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create a new MySQLi object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database for the user
    $sql = "SELECT * FROM students WHERE roll_no = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if the user exists
    if ($result->num_rows == 1) {
        // User is authenticated
        echo "Login successful!";
    } else {
        // Invalid credentials
        echo "Invalid username or password";
    }
}

// Close the database connection
$conn->close();
?>
