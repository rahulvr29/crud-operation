<?php
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

// SQL query to create or alter a table
$sql = "CREATE TABLE IF NOT EXISTS crud (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    mobile VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Execute SQL query
if ($conn->query($sql) === FALSE) {
    die("Error creating table: " . $conn->error);
}

// Close connection (not necessary to close it here)
// $conn->close();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $insert = "INSERT INTO crud (name, email, mobile, password) 
                VALUES ('$name', '$email', '$mobile', '$password')";
    $result = mysqli_query($conn, $insert);
    if($result){
        header('location: display.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>