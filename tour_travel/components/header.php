<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TapAndTravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar {
            background-color: rgb(2, 15, 67);
            color: white;
            font-size: 17px;
        }

        .navbar-nav .nav-link {
            font-size: 20px;
            font-family: "Poppins", serif;
            color: #ffffff;
        }

        .nav-item .nav-link:hover {
            color: #EB4837;

        }

        .navbar-brand {
            color: white;
            font-size: 28px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand img {
            width: 20vw;
            height: 65px;
        }

        .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=UTF8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" fill="white"%3E%3Cpath stroke="white" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"/%3E%3C/svg%3E');
        }

        .dropdown-menu {
            border-radius: 8px;
            padding: 10px 0;
            min-width: 200px;
        }

        .dropdown-item:hover {
            background-color: #EB4837;
            color: white;
            border-radius: 5px;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
            display: none;
            position: absolute;
        }

        .dropdown-submenu:hover .dropdown-menu {
            display: block;
        }

        .login-btn {
            font-size: 17px!important;
            color: white!important;
            /* margin-top: 30px; */
            line-height: 0 !important;
            border: 1px solid #EB4837!important;
            padding: 20px 15px!important;
            border-radius: 5px!important;
        }

        .login-btn:hover {
            background-color: red !important;
            color: white !important;
        }
        @media(max-width:768px) {
            .navbar-brand img {
                width: 60vw;
            }
            /* .dropdown-item {
            width: 63%;
            } */

            .dropdown-submenu .dropdown-menu {
             top: 0;
             left: 25%;
            }


        }
    </style>
</head>

<body>
    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand ms-2" href="index.php">
                    <img src="img/logpo-removebg-preview.png" alt="TapAndTravel">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="allPackages.php">Packages</a></li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="allPackages.php" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown">All Packages</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle"
                                        href="http://localhost/tour_travel/fetch_packages.php?id=1">Indonesia</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=1">4
                                                Night/5 Day Bali Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=2">2
                                                Night 3 Days Yogyakarta Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=3">1
                                                Day ATV Quad Bike Adventure</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu ">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=2">Thailand</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_packages.php?id=2">2Nights 2Days Krabi,Phuket
                                             </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=36">5
                                                Night 6 Days Thailand Trip</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=37">8
                                                Night 9 Days Thailand Tour</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=3">Dubai</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=9">5
                                                Night 6 Days Ferrari World </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=13">3
                                                Night 4 Days Dubai Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=35">5
                                                Night 6 Days Community Trip
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=14">5
                                                Night 6 Days honeymoon </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=15">4
                                                Night 5 Days  Honeymoon </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=4">Bhutan</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href=" http://localhost/tour_travel/fetch_city_package.php?city_id=10">6
                                                Nights 7 days land Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=11">9
                                                Night 10 Days Bhutan Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=12">5
                                                Night and 6 Days Road Trip</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=5">Russia</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=18">5
                                                Night 6 Days Russia Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=19">5
                                                Nights 6 days  Honeymoon </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=20">4
                                                Night 5 Days Russia Tour</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=21">3
                                                Night 4 Days Honeymoon </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=38">6
                                                Night 7 Days Russia Tour</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=6">Nepal</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=5">5
                                                Night 6 Days Nepal Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=6">4
                                                Night 5 Days Nepal Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=7">3
                                                Night 4 Days Nepal Tour</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=7">Maldives</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=8">3
                                                Night 4 Days Maldives Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=16">4
                                                Night 5 Days Honeymoon </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=17">3
                                                Night 4 Days Maldives Tour </a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=8"> Philipines</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=22">9
                                                Night 10 Days Philippnes Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=24">5
                                                Night 6 Days  Honeymoon </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=25">5
                                                Night 6 Days  Honeymoon </a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=9">Egypt</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=26">9
                                                Night 10 Days Egypt Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=27">9
                                                Night 10 Days Honeymoon Tour</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=39">7
                                                Night 8 Days Egypt Tour </a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=10">Malaysia</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=33">8
                                                Night 9 Days Malaysia Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=34">4
                                                Night 5 Days Malaysia Tour
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=41">5
                                                Night 6 Days Malaysia Tour </a></li>

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=11">France</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=28">3
                                                Night 4 Days Paris Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=29">2
                                                Night 3 Days Paris Honeymoon </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=40">5
                                                Night 6 Days Paris Trip </a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="http://localhost/tour_travel/fetch_packages.php?id=12">Greece</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=30">6
                                                Night 7 Days Greece Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=31">4
                                                Night 5 Days Greece Tour </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=32">3
                                                Night 4 Days  Honeymoon Tour</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="try_dashboard.php">View Booking</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                        <li class="nav-item">
                            <a href="form_login.php" class="login-btn btn">Login</a>
                        </li>

                        <!-- <li class="nav-item"><a href="form_login.php" class="login-btn">Login</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>

</html>