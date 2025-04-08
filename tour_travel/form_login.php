
<?php
session_start();

// Store booking details if coming from Book Now
if(isset($_GET['redirect_to']) && $_GET['redirect_to'] == 'booking') {
    $_SESSION['redirect_to'] = 'booking';
    $_SESSION['booking_details'] = [
        'city_name' => $_GET['city_name'] ?? '',
        'price' => $_GET['price'] ?? ''
    ];
}
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$database = "tour_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);
$response = "";
// ... [rest of your existing database connection code] ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... [your existing validation code] ...
    $email = $_POST['email_or_phone'];
    $password = $_POST['password'];
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // SQL query to check if the user exists
    $sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row;

        // Check if this is a booking flow
        if(isset($_SESSION['redirect_to']) && $_SESSION['redirect_to'] == 'booking') {
            $booking_details = $_SESSION['booking_details'];
            unset($_SESSION['redirect_to']);
            unset($_SESSION['booking_details']);
            
            // Redirect to booking form with parameters
            header("Location: amit.php?city_name=".urlencode($booking_details['city_name'])."&price=".$booking_details['price']);
            exit();
        } else {
            $response = "success"; // Normal login
        }
    } else {
        $response = "error";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TapAndTour</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        .login-container h2 {
            color:  rgb(235, 59, 46);
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            margin-bottom: 15px;
        }

        .login-button {
            padding: 12px;
            background-color: #ff6f61;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s ease;
            width: 100%;
        }

        .login-button:hover {
            background-color: #e65b50;
        }

        .forgot-password a {
            font-size: 12px;
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .signup p {
            font-size: 14px;
            margin-top: 15px;
            text-align: center;
        }

        .signup a {
            color: #007bff;
            text-decoration: none;
        }

        .signup a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Welcome!</h2>
        <form action="form_login.php" method="POST">
            <!-- <label for="name">Name</label>
            <input type="text" id="name" name="name" required placeholder="Enter your Name"> -->
            <label for="email_or_phone">Email</label>
            <input type="text" id="email_or_phone" name="email_or_phone" required placeholder="Enter your Email or Phone Number">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter your Password">
            <div class="forgot-password">
                <a href="form_forgetPass.php">Forgot Password?</a>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
        <div class="signup">
            <p>Don't have an account? <a href="form_registration.php">Sign Up</a></p>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    let response = "<?php echo $response; ?>";

    if (response === "success") {
        Swal.fire({
            title: 'Success!',
            text: 'You are Logged In!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = "try_dashboard.php";
        });
    } else if (response === "booking") {
        // Redirect to booking form with parameters
        window.location.href = "amit.php?city_name=<?= urlencode($_SESSION['booking_city'] ?? '') ?>&price=<?= $_SESSION['booking_price'] ?? '' ?>";
    } else if (response === "error") {
        Swal.fire({
            title: 'Error!',
            text: 'Your User Id or Password is Invalid',
            icon: 'error'
        });
    }
});
    </script>
</body>

</html>
