<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TapAndTravel</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: rgb(2, 15, 67);
            color: white;
            font-size: 17px;
        }

        .navbar-nav .nav-link {
            font-size: 18px;
            font-family: "Poppins", serif;
            color: #ffffff;
        }

        .nav-item .nav-link:hover {
            color: #EB4837;
        }

        .navbar-brand {
            color: white;
            font-size: 28px;
            /* font-family: "Poppins", serif; */
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand img {
            width: 20vw;
            height: 65px;
        }

        /* .navbar-brand span:hover{
            color: white;
            font-size: 28px;
        } */
      


        .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=UTF8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" fill="white"%3E%3Cpath stroke="white" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"/%3E%3C/svg%3E');
        }

     
        .custom-dropdown {
            background-color: #fff;
            border-radius: 8px;
            padding: 10px 0;
            min-width: 200px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border: none;
        }

        .custom-dropdown .dropdown-item {
            font-size: 16px;
            color: #333;
            font-weight: bold;
            text-align: center;
            padding: 10px 20px;
            transition: all 0.3s ease-in-out;
        }

     
        .custom-dropdown .dropdown-item:hover {
            background-color: #EB4837;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }


        .login-btn {
            font-size: 17px;
            color: white;
            border: 1px solid #EB4837;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        .login-btn:hover {
            background-color: red !important;
            font-weight: bold;
            color: white !important;
            font-weight: bold !important;
        }

        @media (max-width: 992px) {
            .navbar-collapse {
                background-color: #212121;
                padding: 10px;
            }
            .navbar-brand img {
            width: 60vw;
            height: 65px;
        }
        }
    </style>
</head>

<body>

    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <a class="navbar-brand ms-2" href="index.php">
                    <img src="img/logpo-removebg-preview.png" alt="">
                    <!-- <span>TapAndTours</span> -->
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-2"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="allPackages.php">Packages</a></li>
                        <li class="nav-item dropdown me-2">
                            <a class="nav-link dropdown-toggle" href="allPackages.php" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                All Packages
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end custom-dropdown" style=""
                                aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="package1.php">Indonesia</a></li>
                                <li><a class="dropdown-item" href="package2.php">Thailand</a></li>
                                <li><a class="dropdown-item" href="package3.php">Dubai</a></li>
                                <li><a class="dropdown-item" href="package4.php">Bhutan</a></li>
                                <li><a class="dropdown-item" href="package5.php">Russia</a></li>
                                <li><a class="dropdown-item" href="package6.php">Nepal</a></li>
                                <li><a class="dropdown-item" href="package7.php">Maldives</a></li>
                                <li><a class="dropdown-item" href="package8.php">Philippines</a></li>
                                <li><a class="dropdown-item" href="package9.php">Egypt</a></li>
                                <li><a class="dropdown-item" href="package10.php">Malaysia</a></li>
                                <li><a class="dropdown-item" href="package11.php">France</a></li>
                                <li><a class="dropdown-item" href="package12.php">Greece</a></li>
                            </ul>
                        </li>
                        

                        <li class="nav-item me-2"><a class="nav-link" href="dashboard.php">View Booking</a></li>
                        <li class="nav-item me-3"><a class="nav-link" href="contact.php">Contact Us</a></li>

                        <li class="nav-item ms-auto ">
                            <a href="form_login.php" class="login-btn">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>