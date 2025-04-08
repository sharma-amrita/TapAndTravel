<?php
// Database connection
$servername = "localhost";
$username = "root";  
$password = "";       
$dbname = "tour_db";  

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => "Connection failed: " . $conn->connect_error]));
}

// Razorpay API Credentials
$api_key = "rzp_test_QDWPYakgW8Jdu1"; 
$api_secret = "FVsf0Bbn0bIKsCLCBbfaVn2q"; 

// Get form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$number = $_POST['number'];
$package = $_POST['package'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

// Calculate total amount with GST (5%)
$amount = $price * $quantity;
$gst = $amount * 0.05;
$total = $amount + $gst;

// Create Razorpay Order
$orderData = [
    "amount" => $total * 100, 
    "currency" => "INR",
    "receipt" => "order_" . uniqid(),
    "payment_capture" => 1
];

$ch = curl_init('https://api.razorpay.com/v1/orders');
curl_setopt($ch, CURLOPT_USERPWD, $api_key . ":" . $api_secret);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($orderData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);
curl_close($ch);

$order = json_decode($response, true);

if (isset($order['id'])) {
    echo json_encode([
        'order_id' => $order['id'],
        'amount' => $total * 100,
        'name' => $firstName . ' ' . $lastName,
        'email' => $email,
        'mobile' => $number
    ]);
} else {
    echo json_encode(['error' => 'Failed to create Razorpay order']);
}
?>

