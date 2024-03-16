

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud Operation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1 class="mt-5 mb-4 px-3">CRUD OPERATION - Update USER</h1>


    <?php
        // Check if ID is provided in URL parameter
        if (isset($_GET['updateid'])) {
            $id = $_GET['updateid'];

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

            // Fetch data of the record to be edited
            $edit = "SELECT name, email, mobile, password FROM crud WHERE id = $id";
            $result = $conn->query($edit);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
    <div class="card">
                    <div class="card-body">
                        <form method="POST" action="edit.php">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Mobile</label>
                                <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="display.php"><button class="btn btn-danger">Cancel</button></a>
                        </form>
                    </div>
                </div>
                <?php
            } else {
                echo "No user found with ID: $id";
            }

            $conn->close();
        } else {
            echo "No ID provided.";
        }
                ?>
  </div>
</body>
</html>
