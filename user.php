<?php
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
    <form class="card" id="userForm">
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
          <button type="button" class="btn btn-primary px-5" id="submitButton">Submit</button>
      </div>
    </form>
    
  </div>

  <script>
    document.getElementById("submitButton").addEventListener("click", function() {
      // Reset validation errors
      document.querySelectorAll('.invalid-feedback').forEach(function(error) {
        error.style.display = 'none';
      });

      // Get form data
      var name = document.getElementById("username").value;
      var email = document.getElementById("email").value;
      var mobile = document.getElementById("mobile").value;
      var password = document.getElementById("password").value;

      // Validate form fields
      if (!name) {
        document.getElementById("nameError").style.display = 'block';
        return;
      }
      if (!email) {
        document.getElementById("emailError").style.display = 'block';
        return;
      }
      if (!mobile) {
        document.getElementById("mobileError").style.display = 'block';
        return;
      }
      if (!password) {
        document.getElementById("passwordError").style.display = 'block';
        return;
      }

      // If all fields are valid, submit the form using AJAX
      var formData = new FormData();
      formData.append("name", name);
      formData.append("email", email);
      formData.append("mobile", mobile);
      formData.append("password", password);

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "connect.php", true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Handle response from server
          console.log(xhr.responseText);
        }
      };
      xhr.send(formData);
    });
  </script>
</body>
</html>
