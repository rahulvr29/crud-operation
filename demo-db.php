<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }


  // ------------------------------------------ Create DATABASE  --------------------------------------------------------------------

      // SQL query to alter a table

      // $db = "CREATE DATABASE tech";

      // if ($conn->query($db) === TRUE) {
      //     echo "create db successfully";
      // } else {
      //     throw new Exception("Error Alter table: " . $conn->error);
      // }
      

// ------------------------------------------ CREATE SQL DATABASE TABLE --------------------------------------------------------------------

    // SQL query to create or alter a table

    // $sql = "CREATE TABLE IF NOT EXISTS nichu(
    //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     firstname VARCHAR(30) NOT NULL,
    //     lastname VARCHAR(30) NOT NULL,
    //     email VARCHAR(50),
    //     mobile INT(11),
    //     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    // )";


    // Execute query

    // if ($conn->query($sql) === TRUE) {
    //     echo "Table created successfully";
    // } else {
    //     throw new Exception("Error creating table: " . $conn->error);
    // }

// ------------------------------------------ ALTER SQL DATABASE TABLE --------------------------------------------------------------------

      // SQL query to alter a table

    // $alt = "ALTER TABLE user ADD COLUMN confirmpassword VARCHAR(255) AFTER password";

    // if ($conn->query($alt) === TRUE) {
    //     echo "Table Alter successfully";
    // } else {
    //     throw new Exception("Error Alter table: " . $conn->error);
    // }
    

// ------------------------------------------ DROP SQL DATABASE TABLE --------------------------------------------------------------------

    // SQL query to drop the table

    // $drop = "DROP TABLE IF EXISTS nichu";
  //   if ($conn->query($drop) === TRUE) {
  //     echo "Table drop successfully";
  // } else {
  //     throw new Exception("Error Alter table: " . $conn->error);
  // }
    

  // ------------------------------------------ INSERT TABLE VALUE --------------------------------------------------------------------

    // SQL query to INSERT the table

    $insert = "INSERT INTO user (id, firstname, lastname, email, password, confirmpassword, mobile, reg_date)
                VALUES (3, 'Rahul', 'VR', 'saivrrahulvr29@gmail.com', 'Saivr29', 'Saivr29', '8072730204', CURRENT_TIMESTAMP)";
    if ($conn->query($insert) === TRUE) {
      echo "Table insert successfully";
  } else {
      throw new Exception("Error insert table: " . $conn->error);
  }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}finally {
  if (isset($conn)) {
      $conn->close();
  }
}

?>
