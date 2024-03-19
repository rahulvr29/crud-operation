<?php
// Start session to store email address
session_start();

// Database connection parameters
$host = 'localhost'; // or your database host
$dbname = 'crud_db';
$username = 'root';
$password = '';

// Attempt database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display error message if connection fails
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if email is submitted through the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    $email = $_POST["email"];

    // Query to check if the email exists in your database
    $sql = "SELECT * FROM crud WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Email exists, store it in session and redirect to setpassword.php
        $_SESSION['reset_email'] = $email;
        header("Location: setpassword.php");
        exit();
    } else {
        // Email does not exist, display error message
        $error = "Email not found. Please enter a valid email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container" style="width: 60%;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4 mb-5 bg-white rounded mx-auto" style="width: 100%; margin-top: 100px;">
                    <div class="card-body">
                        <h3 class="card-title">Reset Password</h3>
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-warning" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <form id="forgotPasswordForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
