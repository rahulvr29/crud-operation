<?php
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $cpassword = $_POST['password'];

    // Connect to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the record in the database
    $update = "UPDATE crud SET name='$name', email='$email', mobile='$mobile' ,password='$cpassword' WHERE id=$id";

    if ($conn->query($update) === TRUE) {
        // Redirect to read.php page after successful update
        header("Location: display.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "No data submitted.";
}
?>