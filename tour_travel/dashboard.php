<?php
session_start();

// Redirect if not authenticated
if (!isset($_SESSION['user'])) {
    header('Location: form_login.php');
    exit();
}

$user = $_SESSION['user'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Get all bookings for this user
$user_email = $user['email'];
$bookings = [];
$result = $conn->query("SELECT * FROM booking WHERE email = '$user_email' ORDER BY booking_date DESC");
if ($result) {
    $bookings = $result->fetch_all(MYSQLI_ASSOC);
}

// Get latest booking from session if available
$latest_booking = $_SESSION['latest_booking'] ?? null;
unset($_SESSION['latest_booking']); // Clear after displaying
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style></style>
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
            font-family: "Poppins", serif;
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


     
        .user-name {
            font-size: 16px;
            font-weight: 600;
            margin-right: 20px;
            color: white;
        }

        .logout-btn {
            padding: 8px 15px;
            background-color: rgb(227, 72, 41);
            color: white;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
        }
        
        .logout-btn:hover {
            border:2px solid #EB4837;
           
            color: black;
        }


        h2 {
            text-align: center;
            /* font-family: 'Arima', cursive; */
            /* font-size: 36px; */
            color:  #EB4837;
            margin-top: 20px;
        }

        .profile {
            display: flex;
            justify-content: center;
            padding: 30px;
            gap: 40px;
            margin: 20px;
        }

        .profile-left {
            width:320px;
            height:37vh;
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
            background-color: rgb(236, 82, 51);
            color: white;
        }

        .details {
            flex-grow: 1;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .details p {
            font-size: 18px;
            margin: 5px 0;
            color: #333;
        }

        .details strong {
            color: rgb(234, 68, 56);
        }

        /* Header Style */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: rgb(2, 15, 67);
            border-bottom: 2px solid #e0e0e0;
        }

       

        .user-name {
            font-size: 16px;
            font-weight: 600;
            margin-right: 20px;
            color: white;
        }

        .logout-btn {
            padding: 8px 15px;
            /* background-color: rgb(235, 38, 38); */
            border:2px solid  rgb(227, 72, 41);
            /* color: white; */
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
        }

        .logout-btn:hover {
            background-color: rgb(227, 72, 41);
            /* border: rgb(227, 72, 41); */
            color: white;
            font-weight: bold;
        }

        /* Booking cards */
        .booking-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        
        .booking-card:hover {
            transform: translateY(-5px);
        }
        
        .latest-booking {
            border: 2px solid #28a745;
            background-color: #f8f9fa;
        }

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

            header {
                flex-direction: column;
                align-items: center;
            }

            .logo h1 {
                font-size: 20px;
            }

            .user-name {
                font-size: 14px;
            }

            .logout-btn {
                font-size: 14px;
                padding: 8px 12px;
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

            .user-name {
                font-size: 12px;
            }

            .logout-btn {
                font-size: 12px;
                padding: 6px 10px;
            }
            .navbar-brand img {
            width: 60vw;
            height: 65px;
        }
        }
        @media (max-width: 992px) {
            .navbar-collapse {
                background-color: #212121;
                padding: 10px;
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
                        <div class="user-info">
            <span class="user-name">
                Welcome, <?php echo htmlspecialchars($user['name']); ?>!
            </span>
            <a href="form_logout.php">
                <button class="logout-btn">Logout</button>
            </a>
        </div>
                        <!-- <li class="nav-item ms-auto ">
                            <a href="form_login.php" class="login-btn">Login</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <h2>Your Dashboard</h2>
    
    <div class="profile">
        <div class="profile-left">
            <ul>
                <li><a href="dashboard.php">Profile Information</a></li>
                <li><a href="#">Change Password</a></li>
                <li><a href="form_logout.php">Logout</a></li>
            </ul>
        </div>


    <!----------------------------Profile Section------------------------------------------------------>
        <div class="details">

            <div id="profile" class="mb-5">
                <h3 class="mb-4">Profile Information</h3>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Contact No:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                        <p><strong>Address:</strong> <?php echo htmlspecialchars($user['city']); ?></p>
                    </div>
                </div>
            </div>
            
<!------------------------------------Bookings Section----------------------------------------------->
<div id="bookings">
    <h3 class="mb-4">Your Bookings</h3>
    
    <?php if (isset($latest_booking)): ?>
    <div class="alert alert-success">
        <h4>🎉 Latest Booking Confirmed!</h4>
        <p><strong>Package:</strong> <?= htmlspecialchars($latest_booking['package_name']) ?></p>
        <p><strong>Booked By:</strong> <?= htmlspecialchars($user['name']) ?></p>
        <p><strong>Total Paid:</strong> ₹<?= number_format($latest_booking['total_amount'], 2) ?></p>
        <p><strong>Booking ID:</strong> <?= htmlspecialchars($latest_booking['payment_id']) ?></p>
    </div>
    <?php endif; ?>
    
    <div class="row">
        <?php if (empty($bookings)): ?>
            <div class="col-12">
                <div class="alert alert-info">You haven't made any bookings yet.</div>
            </div>
        <?php else: ?>
            <?php foreach ($bookings as $booking): ?>
            <div class="col-md-6">
                <div class="card booking-card <?= ($latest_booking && $latest_booking['payment_id'] == $booking['payment_id']) ? 'latest-booking' : '' ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($booking['package_name']) ?></h5>
                        <p class="card-text">
                        <strong>Package:</strong> <?= htmlspecialchars($booking['package_name']) ?><br>
                            <strong>Booked By:</strong> <?= htmlspecialchars($user['name']) ?><br>
                            <strong>Booking Date:</strong> <?= date('d M Y', strtotime($booking['booking_date'])) ?><br>
                            <strong>Travelers:</strong> <?= $booking['quantity'] ?><br>
                            <strong>Price per person:</strong> ₹<?= number_format($booking['price'], 2) ?><br>
                            <strong>Total Amount:</strong> ₹<?= number_format($booking['total_amount'], 2) ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">Payment ID: <?= htmlspecialchars(substr($booking['payment_id'], 0, 8)) ?>...</small>
                            <span class="badge bg-success">Confirmed</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
        </div>
    </div>


    <script>
    <?php if (isset($_SESSION['success'])) { ?>
    Swal.fire({
        title: 'Success',
        text: '<?php echo $_SESSION['success']; ?>',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    <?php unset($_SESSION['success']); } ?>

    <?php if (isset($_SESSION['error'])) { ?>
    Swal.fire({
        title: 'Error',
        text: '<?php echo $_SESSION['error']; ?>',
        icon: 'error',
        confirmButtonText: 'OK'
    });
    <?php unset($_SESSION['error']); } ?>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize Bootstrap dropdowns
            var dropdownElements = document.querySelectorAll('.dropdown-toggle');
            dropdownElements.forEach(function (dropdown) {
                new bootstrap.Dropdown(dropdown);
            });

            let navbarToggler = document.querySelector(".navbar-toggler");
            let navbarCollapse = document.querySelector("#navbarNavDropdown");

            navbarToggler.addEventListener("click", function () {
                navbarCollapse.classList.toggle("show");
            });

            // Close navbar when clicking a link (for mobile)
            document.querySelectorAll(".nav-link").forEach(function (link) {
                link.addEventListener("click", function () {
                    if (navbarCollapse.classList.contains("show")) {
                        navbarCollapse.classList.remove("show");
                    }
                });
            });
        });
    </script>

<!--------------------------- footer section----------------------------------------------------- -->
<?php include 'components/footer.php'; ?>
</body>

</html>