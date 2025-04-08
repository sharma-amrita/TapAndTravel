<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$database = "tour_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);
$response = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = "";
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $password = $_POST['password'];  

    $sql = "INSERT INTO registration  (name ,email,phone,city,password) VALUES ('$name','$email','$phone','$city','$password')";
    $result = mysqli_query($conn, $sql);
    if ($result == TRUE) {
        // echo "Registration successful";
        $response = "success";
    } else {
        $response = "failed";
    }
} else {

    $response = "error";
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

        .container-register {
            width: 400px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .container-register h2 {
            text-align: center;
            color: rgb(235, 59, 46);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: calc(100% - 10px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background: #ff6f61;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .form-group button:hover {
            background: #e65b50;
        }
    </style>
</head>

<body>
    <div class="container-register">
        <h2>Registration</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required placeholder="Enter your full name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" required placeholder="Enter your phone number" maxlength="10" minlength="10">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required placeholder="Enter your location">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>

            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        let response = "<?php echo $response; ?>";

        if (response === "success") {
            Swal.fire({
                title: 'Success!',
                text: 'Your Registration has been successful!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = "form_login.php";
            });
        } else if (response === "failed") {
            Swal.fire({
                title: 'Error!',
                text: 'Please try again',
                icon: 'error'
            });
        }
    });
    </script>
</body>
</html>
