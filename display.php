<?php
include "connect.php";
$dis = "SELECT * FROM crud ";
$res = mysqli_query($conn, $dis);


    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: index.html");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD - Display</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <style>
    a{
      text decoration: none;
    }
    div{
      margin-bottom: 10px ;
    }
    #userTable{
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1 class="text-center pt-5 ">Display Page</h1>
    <div class="d-flex justify-content-between">
    <button class="btn btn-danger my-3">
      <a href="logout.php" class="text-light text-decoration-none">Logout</a>
    </button>
    <button class="btn btn-primary my-3">
      <a href="user.php" class="text-light text-decoration-none">Add User</a>
    </button>
    </div>
    <table class="table" id="userTable">
  <thead>
    <tr>
      <th scope="col">SI no</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php 
      if($res){
        while($row=mysqli_fetch_assoc($res)){
          $id=$row['id'];
          $name=$row['name'];
          $email=$row['email'];
          $email=$row['email'];
          $mobile=$row['mobile'];
          $password=$row['password'];
      
          echo '
<tr>
  <td>'.$id.'</td>
  <td>'.$name.'</td>
  <td>'.$email.'</td>
  <td>'.$mobile.'</td>
  <td>'.$password.'</td>
  <td>
    <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light text-decoration-none"><i class="bi bi-pencil"></i>Edit</a></button>
    <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light text-decoration-none"><i class="bi bi-trash"></i>Delete</a></button>
  </td>
</tr>
';
        }
      }else {
        echo '<tr><td colspan="6">No records found</td></tr>';
      }
    ?>
    <!-- <td>
      <button class="btn btn-primary"><a href="update.php"></a></button>
      <button class="btn btn-danger"><a href="delete.php"></a></button>
    </td> -->
  </tbody>
</table>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
      <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "lengthMenu": [[-1, 1, 2, 3, 5, ], ["All", 1, 2, 3, 5, ]] // Custom entries for number of records per page
            });
        });
    </script>
</body>
</html>