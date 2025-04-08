<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TapAndTravel</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .collapse {
            margin-right: 40px;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            background: rgb(5, 3, 78);
        }

        .nav-link {
            color: white;
            font-size: 18px;
        }

        .nav-link:hover {
            color: #EB4837;
            font-size: bold;
        }

        .nav-item {
            color: white;
        }

        .navbar img {

            width: 65%;
        }

        .bg-light {
            background-color: rgb(5, 3, 78) !important;
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
        
/* Make sure the submenu shows on hover */
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    display: none;
    position: absolute;
    top: 0;
    left: 100%;
    margin-top: -1px; /* Align with the parent item */
}

.dropdown-submenu:hover .dropdown-menu {
    display: block;
}

        @media(max-width:768px) {
            .icon {
                width: 85%;
            }

            .navbar-toggler {
                background-color: white;
            }

            .navbar {
                padding-top: 20px;
                padding-bottom: 25px;
            }

            .nav-pills {
                flex-direction: column;
                padding-top: 26px;

            }

            .ms-auto {
                margin-left: 11px !important;
                padding-top: 20px;
            }

            .login-btn {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>
    
    <div class="main">
        <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="icon">
                <a href="index.php"><img src="img/logpo-removebg-preview.png" alt=""></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class=" nav nav-pills ms-auto">
                    <li class="nav-item">
                        <a class="nav-link ab" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="about.php" tabindex="-1" aria-disabled="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ab" aria-current="page" href="allpackages.php">Package</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="allPackages.php"
                            role="button" aria-expanded="false">All Packages</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="corporate profile.php">Indonesia</a>

                            </li>
                            <li class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="about.php">Thailand</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="bangkok.php">Bangkok</a></li>
                <li><a class="dropdown-item" href="phuket.php">Phuket</a></li>
                <li><a class="dropdown-item" href="chiangmai.php">Chiang Mai</a></li>
                <li><a class="dropdown-item" href="pattaya.php">Pattaya</a></li>
            </ul>
        </li>
                            <!-- <li><a class="dropdown-item" href="managemant team.php">Thailand</a></li> -->
                            <li><a class="dropdown-item" href="our vision.php">Dubai</a></li>
                            <li><a class="dropdown-item" href="quality commitment.php">Bhutan</a>
                            </li>
                            <li><a class="dropdown-item" href="social commitment.php">Russia</a></li>
                            <li><a class="dropdown-item" href="safety&risk commitment.php">Nepal</a></li>
                            <li><a class="dropdown-item" href="safety&risk commitment.php">Maldives</a></li>
                            <li><a class="dropdown-item" href="safety&risk commitment.php">Philippines</a></li>
                            <li><a class="dropdown-item" href="safety&risk commitment.php">Egyptt</a></li>
                            <li><a class="dropdown-item" href="safety&risk commitment.php">Malaysia</a></li>
                            <li><a class="dropdown-item" href="safety&risk commitment.php">France</a></li>
                            <li><a class="dropdown-item" href="safety&risk commitment.php">Greece</a></li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="dashboard.php" tabindex="-1" aria-disabled="true">View Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="contact.php" tabindex="-1">Contact Us</a>
                    </li>
                    <li class="nav-item ms-auto ">
                        <a href="form_login.php" class="login-btn">Login</a>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</body>

</html>