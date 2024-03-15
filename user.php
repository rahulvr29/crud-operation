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
    <h1 class="mt-5 mb-4 px-3">CRUD OPERATION - ADD USER</h1>
    <form method="post" class="card" action="connect.php" id="userForm">

      <div class="mt-2 mb-3 card-body">
        <label for="username" class="form-label card-title">Name</label>
        <input type="text" class="form-control" id="username" name="name" placeholder="Enter Your Name" required>
        <div class="invalid-feedback">Name is required</div>
      </div>

      <div class="mb-3 card-body">
        <label for="email" class="form-label card-title">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
        <div class="invalid-feedback">Email is required</div>
      </div>

      <div class="mb-3 card-body">
        <label for="mobile" class="form-label card-title">Mobile</label>
        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Mobile Number" required>
        <div class="invalid-feedback">Mobile number is required</div>
      </div>
      
      <div class="mb-3 card-body">
        <label for="password" class="form-label card-title">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
        <div class="invalid-feedback">Password is required</div>
      </div>
      
      <div class="m-2">
          <button type="submit" class="btn btn-primary px-5" name="submit">Submit</button>
      </div>
      
    </form>
  </div>

  <script src="script.js"></script> <!-- Include your custom JavaScript file -->
</body>
</html>
