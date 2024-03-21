<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

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

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = md5($_POST['password']);

    $insert = "INSERT INTO crud (name, email, mobile, password) 
                VALUES ('$name', '$email', '$mobile', '$password')";
    $result = mysqli_query($conn, $insert);
    if($result){
        header('location: display.php');
        exit(); // Add this line to prevent further execution
    } else {
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud Operation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>

  </style>
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-between mt-5 mb-4 px-3">
    <h1 class="">CRUD OPERATION - ADD USER</h1>
    <a href="display.php"><button class="btn btn-danger mt-3">Cancel</button></a>
    </div>
    <form class="card" id="userForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="mt-2 mb-3 card-body">
        <label for="username" class="form-label card-title">Name</label>
        <input type="text" class="form-control" id="username" name="name" placeholder="Enter Your Name">
        <div class="invalid-feedback" id="nameError">Name is required</div>
      </div>
      <div class="mb-3 card-body">
        <label for="email" class="form-label card-title">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
        <div class="invalid-feedback" id="emailError">Email is required</div>
      </div>
      <div class="mb-3 card-body">
        <label for="mobile" class="form-label card-title">Mobile</label>
        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Mobile Number">
        <div class="invalid-feedback" id="mobileError">Mobile number is required</div>
      </div>
      <div class="mb-3 card-body">
        <label for="password" class="form-label card-title">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
        <div class="invalid-feedback" id="passwordError">Password is required</div>
      </div>
      <div class="m-2">
          <button type="submit" class="btn btn-primary px-5" name="submit" id="submitButton">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
