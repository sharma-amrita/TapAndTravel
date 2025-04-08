<?php
// Database connection
$servername = "localhost";
$username = "root";  // Change if needed
$password = "";       // Change if needed
$dbname = "tour_db";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Razorpay API Credentials
$api_key = "rzp_test_QDWPYakgW8Jdu1";  
$api_secret = "FVsf0Bbn0bIKsCLCBbfaVn2q";       

// Get the data sent from the frontend
$payment_id = $_POST['payment_id'];
$order_id = $_POST['order_id'];
$amount = $_POST['amount'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

// $payment_status = $_POST['pending'];
// Verify payment using Razorpay API
$ch = curl_init('https://api.razorpay.com/v1/payments/' . $payment_id);
curl_setopt($ch, CURLOPT_USERPWD, $api_key . ":" . $api_secret);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$payment = json_decode($response, true);

if ($payment['status'] == 'captured') {
    // Payment was successfully captured
    // Insert booking data into database
    $sql = "INSERT INTO booking (first_name, last_name, email, phone, package, price, quantity, total_amount, payment_id, payment_status)
            VALUES ('$name', '$name', '$email', '$mobile', '$order_id', '$amount', 1, '$amount', '$payment_id', 'Success')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Payment successful and booking saved']);
    } else {
        echo json_encode(['error' => 'Failed to save booking: ' . $conn->error]);
    }
} else {
    echo json_encode(['error' => 'Payment failed!']);
}

$conn->close();
?>
