<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

session_start();



// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => "Connection failed: " . $conn->connect_error]));
}

// Get logged in user ID from session
if (!isset($_SESSION['user']['id'])) {
    die(json_encode(['success' => false, 'error' => 'User not logged in']));
}
$user_id = $_SESSION['user']['id'];

// Get POST data and sanitize
$firstName = trim($conn->real_escape_string($_POST['firstName'] ?? ''));
$lastName = trim($conn->real_escape_string($_POST['lastName'] ?? ''));
$email = trim($conn->real_escape_string($_POST['email'] ?? ''));
$number = trim($conn->real_escape_string($_POST['number'] ?? ''));
$package = trim($conn->real_escape_string($_POST['package'] ?? ''));
$price = floatval($_POST['price'] ?? 0);
$quantity = intval($_POST['quantity'] ?? 1);
$gst = $price * $quantity * 0.05; // 5% GST
$total = ($price * $quantity) + $gst;
$payment_id = trim($conn->real_escape_string($_POST['payment_id'] ?? ''));

// Validate required fields
if (empty($firstName) || empty($lastName) || empty($email) || empty($number) || empty($package) || empty($payment_id)) {
    die(json_encode(['success' => false, 'error' => 'Missing required fields']));
}

// Additional validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die(json_encode(['success' => false, 'error' => 'Invalid email format']));
}

if (!preg_match('/^[0-9]{10,15}$/', $number)) {
    die(json_encode(['success' => false, 'error' => 'Invalid phone number']));
}

// Store booking in database
$sql = "INSERT INTO booking (
        user_id,
        first_name, 
        last_name, 
        email, 
        phone, 
        package_name, 
        price, 
        quantity, 
        gst, 
        total_amount, 
        payment_id
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die(json_encode(['success' => false, 'error' => 'Prepare failed: ' . $conn->error]));
}

// Debug: Output the package name before binding
error_log("Package name to be stored: " . $package);

// Bind parameters
$bind_result = $stmt->bind_param(
    "issssdiddss",
    $user_id,
    $firstName,
    $lastName,
    $email,
    $number,
    $package,
    $price,
    $quantity,
    $gst,
    $total,
    $payment_id
);

if (!$bind_result) {
    die(json_encode(['success' => false, 'error' => 'Bind failed: ' . $stmt->error]));
}

header('Content-Type: application/json');

if ($stmt->execute()) {
    // Debug: Verify what was actually stored
    $debug_sql = "SELECT package_name FROM booking WHERE payment_id = ?";
    $debug_stmt = $conn->prepare($debug_sql);
    $debug_stmt->bind_param("s", $payment_id);
    $debug_stmt->execute();
    $debug_result = $debug_stmt->get_result();
    $debug_row = $debug_result->fetch_assoc();
    error_log("Package name actually stored: " . $debug_row['package_name']);
    $debug_stmt->close();
    
    // Store in session for dashboard
    $_SESSION['latest_booking'] = [
        'payment_id' => $payment_id,
        'package_name' => $package,
        'quantity' => $quantity,
        'price' => $price,
        'gst' => $gst,
        'total_amount' => $total,
        'booking_date' => date('Y-m-d H:i:s'),
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email
    ];
    
    // Send email confirmation
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sharma81amrita@gmail.com';
        $mail->Password = 'joux mfpm awgf xuxy';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('sharma81amrita@gmail.com', 'TapAndTour');
        $mail->addAddress($email, "$firstName $lastName");
        $mail->isHTML(true);
        $mail->Subject = "Booking Confirmation - $package";
        $mail->Body = "
            <h2>Booking Confirmation</h2>
            <p>Dear $firstName $lastName,</p>
            <p>Your booking for <strong>$package</strong> was successful!</p>
            <p><strong>Details:</strong></p>
            <ul>
                <li>Travelers: $quantity</li>
                <li>Price per person: ₹" . number_format($price, 2) . "</li>
                <li>GST: ₹" . number_format($gst, 2) . "</li>
                <li>Total Amount: ₹" . number_format($total, 2) . "</li>
                <li>Payment ID: $payment_id</li>
            </ul>
            <p>Thank you for choosing TapAndTour!</p>
        ";

        $mail->send();
        echo json_encode([
            'success' => true,
            'redirect' => 'try_dashboard.php',
            'message' => 'Booking successful! Redirecting...'
        ]);
    } catch (Exception $e) {
        error_log("Email sending failed: " . $mail->ErrorInfo);
        echo json_encode([
            'success' => true,
            'redirect' => 'try_dashboard.php', 
            'message' => 'Booking successful! (Email failed to send)'
        ]);
    }
} else {
    error_log("Database execution failed: " . $stmt->error);
    echo json_encode(['success' => false, 'error' => 'Booking Failed: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>