<?php
require_once './Facebook/Facebook/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '947298793753544',
    'app_secret' => '335f280ff3c65b370b65c4d2e7133f9a',
    'default_graph_version' => 'v19.0',
]);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form id="login-form" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye-slash" id="eyeIcon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <p id="error-message" class="text-danger mt-3"></p>
                        <div class="mt-3 text-center">
                            <a href="forgot.php">Forgot Password</a>
                        </div>
                        <div class="mb-1 mt-3 ">
                            <button id="facebookLoginBtn" class="btn btn-primary btn-block"
                                style=" border-color: #007bff; transition: background-color 0.3s ease; width: 100%; padding: 10px; border-radius: 5px; font-size: 16px; font-weight: bold;">
                                <i class="bi bi-facebook"></i> Login with Facebook
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#login-form').submit(function (event) {
                event.preventDefault();
                var username = $('#username').val();
                var password = $('#password').val();
                $.ajax({
                    type: 'POST',
                    url: 'login.php',
                    data: { username: username, password: password },
                    success: function (response) {
                        if (response.trim() === 'success') {
                            window.location.href = 'display.php';
                        } else {
                            $('#error-message').text(response);
                        }
                    }
                });
            });
        });

        $(document).ready(function () {
            $('#togglePassword').click(function () {
                const passwordInput = $('#password');
                const eyeIcon = $('#eyeIcon');

                // Toggle password visibility
                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordInput.attr('type', 'password');
                    eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
        });
    </script>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '947298793753544',
                cookie: true,
                xfbml: true,
                version: 'v19.0'
            });

            FB.getLoginStatus(function (response) {
                // Check login status
                statusChangeCallback(response);
            });
        };

        function statusChangeCallback(response) {
            if (response.status === 'connected') {
                // User is logged in via Facebook, handle accordingly
                console.log('Logged in via Facebook');
                // You can redirect the user or perform any other action here
            }
        }

        function facebookLogin() {
            FB.login(function (response) {
                statusChangeCallback(response);
            }, {
                scope: 'email'
            });
        }

        document.getElementById('facebookLoginBtn').addEventListener('click', facebookLogin);
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>

</html>