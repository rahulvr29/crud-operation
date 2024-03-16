<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $del = "DELETE FROM crud WHERE id=$id"; // added semicolon here
    $result = mysqli_query($conn, $del);
    if($result){
        header('location: display.php');
    } else {
        die(mysqli_error($conn));
    }
}

session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: index.html");
        exit();
    }
?>
