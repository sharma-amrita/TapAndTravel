<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\tour_travel\PHPMailer\Exception.php';
require 'C:\xampp\htdocs\tour_travel\PHPMailer\PHPMailer.php';
require 'C:\xampp\htdocs\tour_travel\PHPMailer\SMTP.php';

// $sql="select * from regisjsf where id=?";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $package = $_POST['package'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity']; // Ensure this field has a name attribute in the form
   

    // Calculate total amount
    $amount = $price * $quantity;
    $gst = $amount * 0.05;
    $total = $amount + $gst;

    // Email content
    $subject = "Booking Confirmation";
    $body = "Dear $firstName $lastName,\n\n";
    $body .= "Thank you for booking with us. Below are your booking details:\n\n";
    $body .= "Package: $package\n";
    $body .= "Quantity: $quantity\n";
    $body .= "Total Amount: ₹$total\n\n";
    $body .= "We will contact you shortly for further details.\n\n";
    $body .= "Best Regards,\nTravel Team";

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through (e.g., Gmail)
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'sharma81amrita@gmail.com'; // SMTP username (your email address)
        $mail->Password = 'joux mfpm awgf xuxy'; // SMTP password (your email password or app password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom('sharma81amrita@gmail.com', 'Travel Team'); // Sender email and name
        $mail->addAddress($email, "$firstName $lastName"); // Recipient email and name

        // Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Send the email
        $mail->send();
        //echo "Booking confirmed and email sent successfully!";
        echo "Your booking has been received. A confirmation email has been sent.";
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
}
?>





