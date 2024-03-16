<?php
session_start();

$servername = "localhost";
$username = "root";
$password = ""; // Enter your password if you have set one
$dbname = "crud_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username from POST data
    $input_username = $conn->real_escape_string($_POST['username']);

    // Prepare a SQL statement to check if the username exists
    $sql = "SELECT * FROM crud WHERE name = '$input_username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Username exists, set session and return success
        $_SESSION['username'] = $input_username;
        echo "success";
    } else {
        // Username doesn't exist, return error message
        echo "Username not found.";
    }
}

// Close the connection
$conn->close();
?>
