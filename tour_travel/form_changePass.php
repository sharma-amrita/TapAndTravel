<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Get the user data from the session
$user = $_SESSION['user'];
$email = $user['email'];

// Include the database connection
include("db.php");

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// Fetch the current password from the database based on the email
$oldPasswordQuery = "SELECT Password FROM registration  WHERE email=?";
$stmt = $conn->prepare($oldPasswordQuery);
$stmt->bind_param("s", $user['email']);
$stmt->execute();
$result = $stmt->get_result();

// Check if a user is found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentPassword = $row['Password']; // Store the current password for comparison
} else {
    $response = "error";
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if the old password matches the one in the database
    if ($oldpass !== $currentPassword) {
        $response = "errorr"; // Old password is incorrect
    } elseif ($newpass !== $confirmPassword) {
        $response = "errorp"; // New password and confirm password do not match
    } else {
        // Update the password in the database
        $updateQuery = "UPDATE  registration  SET Password=? WHERE email=?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ss", $newpass, $user['email']);

        if ($stmt->execute()) {
            $response = "success"; // Password successfully updated
        } else {
            $response = "error"; // An error occurred while updating the password
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TapAndTravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
        .logout-btn {
            padding: 8px 15px;
            
            border:2px solid  rgb(227, 72, 41);
         
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
        }
        .user-info {
            display: flex;
            align-items: center;
            color: rgb(227, 72, 41);
            font-weight: bold;
            font-size: 17px;
            font-family: "Poppins", serif;
        }
        /* .logout-btn:hover {
            background-color: rgb(227, 72, 41);
           
            color: white;
            font-weight: bold;
        } */
         /* -------------------------------dashboard------------------------------------------ */
         
         h2 {
        text-align: center;
        font-family: 'Arima', cursive;
        font-size: 36px;
        color: #333;
        margin-top: 20px;
    }

    .profile {
        display: flex;
        justify-content: center;
        padding: 30px;
        gap: 40px;

    }

    .profile-left {
        width: 250px;
        height:199px;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .profile-left ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .profile-left ul li {
        margin-bottom: 15px;
    }

    .profile-left ul li a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        display: block;
        padding: 10px;
        background-color: #f0f0f0;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .profile-left ul li a:hover {
        background-color: #EB4837;;
        color: white;
    }
    .navbar-nav .nav-link.active, .navbar-nav .nav-link.show {
    color: white!important;
}
    .details {
        flex-grow: 1;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .details .first,
    .details .second {
        margin-bottom: 20px;
    }

    .details p {
        font-size: 18px;
        margin: 5px 0;
        color: #333;
    }

    .details strong {
        color: #EB4837;
    }
/* swati detail chnge */

.details {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0px 72px;
        }

        /* Form labels */
        .details form label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
            display: block;
        }

        /* Form inputs */
        .details form input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        /* Input focus styles */
        .details form input:focus {
            outline: none;
            border-color: #EB4837;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }

        /* Error message styles */
        #passwordError {
            color: red;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 10px;
            display: none;
        }

        /* Submit button */
        .details form button {
            width: 100%;
            padding: 14px;
            font-size: 18px;
            border:2px solid #EB4837;
            /* background-color: #EB4837; */
            color: black;
            /* border: none; */
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Button hover effect */
        .details form button:hover {
            background-color: #EB4837;
            color:white;
            font-weight: bold;
        }
/*  */
      /* Responsive styles */
      @media only screen and (max-width: 768px) {
        .profile {
            flex-direction: column;
            align-items: center;
        }

        .profile-left {
            width: 100%;
            margin-bottom: 20px;
        }

        .details {
            width: 100%;
        }

    }
    @media only screen and (max-width: 480px) {
        h2 {
            font-size: 28px;
        }

        .profile-left ul li a {
            font-size: 14px;
            padding: 8px;
        }

        .details p {
            font-size: 16px;
        }

        .details strong {
            font-size: 16px;
        }

        .header .student-name {
            font-size: 12px;
        }}
    </style>
</head>

<body>

    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <a class="navbar-brand ms-2" href="index.php">
                    <img src="img/logpo-removebg-preview.png" alt="">

                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="allPackages.php">Packages</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown">All Packages</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle"
                                        href="http://localhost/tour_travel/fetch_packages.php?id=1">Indonesia</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=1">4
                                                Night/5 Day Bali Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=2">2
                                                Night 3 Days Yogyakarta Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=3">1
                                                Day ATV Quad Biking Adventure Tour</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Thailand</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_packages.php?id=2">2N/D Krabi,
                                                2N/D Phuket</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=36">5
                                                Night 6 Days Thailand Trip</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=37">8
                                                Night 9 Days Thailand Tour</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Dubai</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=9">5
                                                Night 6 Days Dubai Ferrari World Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=13">3
                                                Night 4 Days Dubai Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=35">5
                                                Night 6 Days Community Trip
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=14">5
                                                Night 6 Days Dubai honeymoon Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=15">4
                                                Night 5 Days Dubai Honeymoon Package</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Bhutan</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href=" http://localhost/tour_travel/fetch_city_package.php?city_id=10">6
                                                Nights 7 days Bhutan land Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=11">9
                                                Night 10 Days Bhutan Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=12">5
                                                Night and 6 Days Bhutan Road Trip</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Russia</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=18">5
                                                Night 6 Days Russia Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=19">5
                                                Nights 6 days Russia Honeymoon Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=20">4
                                                Night 5 Days Russia Tour package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=21">3
                                                Night 4 Days Russia Honeymoon Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=38">6
                                                Night 7 Days Russia Tour Package</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Nepal</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=5">5
                                                Night 6 Days Nepal Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=6">4
                                                Night 5 Days Nepal Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=7">3
                                                Night 4 Days Nepal Tour Package</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Maldives</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=8">3
                                                Night 4 Days Maldives Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=16">4
                                                Night 5 Days Maldives Honeymoon Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=17">3
                                                Night 4 Days Maldives Tour Package</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#"> Philipines</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=22">9
                                                Night 10 Days Philippnes Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=24">5
                                                Night 6 Days philippines Honeymoon Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=25">5
                                                Night 6 Days philippines Honeymoon Package</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Egypt</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=26">9
                                                Night 10 Days Egypt Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=27">9
                                                Night 10 Days Egypt Honeymoon Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=39">7
                                                Night 8 Days Egypt Tour Packages</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Malaysia</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=33">8
                                                Night 9 Days Malaysia Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=34">4
                                                Night 5 Days Malaysia Package
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=41">5
                                                Night 6 Days Malaysia Tour Package</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">France</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=28">3
                                                Night 4 Days Paris Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=29">2
                                                Night 3 Days Paris Honeymoon Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=40">5
                                                Night 6 Days Paris Trip Package</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Greece</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=30">6
                                                Night 7 Days Greece Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=31">4
                                                Night 5 Days Greece Tour Package</a></li>
                                        <li><a class="dropdown-item"
                                                href="http://localhost/tour_travel/fetch_city_package.php?city_id=32">3
                                                Night 4 Days Greece Honeymoon Package</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item me-2"><a class="nav-link" href="dashboard.php">View Booking</a></li>
                        <li class="nav-item me-3"><a class="nav-link" href="contact.php">Contact Us</a></li>
                        <div class="user-info">
                            <span class="user-name">
                                Welcome, <?php echo htmlspecialchars($user['name']); ?>!
                            </span>
                            <!-- <a href="form_logout.php">
                                <button class="logout-btn">Logout</button>
                            </a> -->
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

   


    
    <h2 id="h2">Change Password</h2>
    <div class="profile">
        <div class="profile-left">
            <ul>
                <li><a href="try_dashboard.php">Dashboard</a></li>
                
                <li><a href="TRY_CHANGE.PHP">Change Password</a></li>
                <li><a href="form_logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="details">
            <form action="" method="POST" id="passupdate">
                <label for="">Enter your Old Password</label>
                <input type="password" required name="oldpass">

                <label for="">Enter your New Password</label>
                <input type="password" required name="newpass" id="password">

                <label for="">Confirm your New Password</label>
                <input type="password" required name="confirmPassword" id="confirmPassword">

                <p id="passwordError" style="display: none; color: red;"></p>

                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    <script>
        // Password validation before submitting the form
        document.getElementById('passupdate').addEventListener('submit', function (e) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            var passwordError = document.getElementById('passwordError');

            // Check if the new password and confirm password match
            if (password !== confirmPassword) {
                e.preventDefault();
                passwordError.style.display = 'block';
                passwordError.textContent = 'New Password and Confirm Password do not match. Please try again.';
            } else {
                passwordError.style.display = 'none';
            }
        });

        // Display the response after form submission
        document.addEventListener("DOMContentLoaded", function () {
            let response = "<?php echo $response; ?>";

            if (response === "success") {
                Swal.fire({
                    title: 'Success!',
                    text: 'Password has been successfully updated!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = "index.php";
                });
            } else if (response === "error") {
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error updating your password. Please try again.',
                    icon: 'error'
                });
            } else if (response === "errorr") {
                Swal.fire({
                    title: 'Error!',
                    text: 'The old password you entered is incorrect.',
                    icon: 'error'
                });
            } else if (response === "errorp") {
                Swal.fire({
                    title: 'Error!',
                    text: 'New password and confirm password do not match.',
                    icon: 'error'
                });
            }
        });
    </script>
</body>

</html>