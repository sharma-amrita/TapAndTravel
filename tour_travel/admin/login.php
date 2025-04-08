<?php
session_start();
include('config/dbcon.php');
include('functions/authcode.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title>Login Page</title>
    <!-- <style>
        body {
          
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card-form {
            max-width: 350px; 
            margin: auto;
            padding: 20px;
            background: #beeaf7; 
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); 
        }
        .custom-container {
            max-width: 500px;
        } -->
    </style>
</head>

<body>
    <div class="container mt-5 custom-container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Sign into your account</h5>

                <div class="card card-form">
                    <div class="card-body">
                        <form id="admin-login-form" action="" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"  id="password" placeholder="Password" required />
                            </div>
                            <div class="text-center">
                                <input type="submit" class="" value="login" id="submi" name="login">

                            </div>
                        </form>
                        <p class="mt-3 text-center">
                            Not registered? <a href="register.php">Create an account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
