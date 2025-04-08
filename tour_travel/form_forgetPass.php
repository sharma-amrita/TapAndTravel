


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <style>
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            font-family: Arial, sans-serif;
        }

        .form-gap {
            padding-top: 70px;
        }

        .panel {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        /* .panel-body {
            padding: 30px;
        } */
        h2,
        p {
            color: #333;
        }

        .btn-primary {
            background: #ff6f61;
            border: none;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background: rgb(227, 68, 56);
        }

        .input-group-addon {
            background: #ff6f61;
            color: white;
            border: none;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .alert{
            margin:-9px 0 12px 0;
            padding:10px;
            border-radius:5px;
            color:black;
            background-color: pink;
            border:1px solid red;
        }
    </style>
</head>

<body>
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">
                                <form  action="form_OTP.php" id="register-form" role="form" autocomplete="off"
                                     method="POST">
                                    <?php
                                    $email = ""; //the field is empty 
                                    if (isset($_POST['submit'])) {
                                        $email = $_POST['email'];
                                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                            echo "email is correct";
                                       } else {
                                           ?>
                                           <div class = "alert">invalid email</div>
                                           <?php
                                            }
                                        }
                                        ?>                             
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-envelope"></i></span>
                                            <input id="email" name="email" placeholder="Email Address"
                                                class="form-control" type="email" required value="<?php echo $email?>">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="submit" class="btn btn-lg btn-primary btn-block"
                                            value="Reset Password" type="submit">
                                    </div>
                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>