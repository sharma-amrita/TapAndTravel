<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

header('Content-Type: application/json');

$response = ["success" => false, "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $number = trim($_POST['number'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        $response["message"] = "All fields are required.";
        echo json_encode($response);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["message"] = "Invalid email format.";
        echo json_encode($response);
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sharma81amrita@gmail.com'; 
        $mail->Password   = 'joux mfpm awgf xuxy'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('sharma81amrita@gmail.com', 'amrita sharma');
        $mail->addAddress('sharma81amrita@gmail.com', 'Receiver Name');

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "Sender Name: <strong>$name</strong><br>Sender Email: <strong>$email</strong><br>Message:<br>$message";

        $mail->send();
        $response["success"] = true;
        $response["message"] = "Your message has been sent successfully!";
    } catch (Exception $e) {
        $response["message"] = "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}

echo json_encode($response);
?>