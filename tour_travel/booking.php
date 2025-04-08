<?php
// Retrieve the city name and price from the URL parameters
$city_name = isset($_GET['city_name']) ? urldecode($_GET['city_name']) : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
   <style>
        .contact-form {
            border: 2px solid black;
            padding: 30px;
            border-radius: 20px;
        }
        .quantity-control {
            display: flex;
            align-items: center;
        }
        .quantity-btn {
            width: 30px;
            height: 30px;
            font-size: 18px;
            text-align: center;
            cursor: pointer;
        }
        .quantity-input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
            font-size: 16px;
        }
        .col-lg-3 {
            flex: 0 0 auto!important;
            width: 25%!important;
            border: 2px solid black!important;
            height: 45vh !important;
            padding: 30px;
            border-radius: 20px;
            margin-left:6vw;
        }
        .payment-screen {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
    </style>
</head>
<body>
    <div class="container py-3">
        <div class="row">
            <!-- First Column (3/4) -->
            <div class="col-lg-8">
                <div class="contact-form">
                    <h5 class="mb-3 text-center">Get in touch with our travel expert</h5>
                    <form action="order.php" method="POST" id="registrationForm">
                        <div class="row mt-3 mb-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label for="first_Name" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstName" placeholder="Your First Name"
                                    pattern="^[A-Za-z\s]+$" title="Please enter a valid first name (letters only)" required
                                    oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label for="last_Name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastName" placeholder="Your Last Name"
                                    pattern="^[A-Za-z\s]+$" title="Please enter a valid last name (letters only)" required
                                    oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Your Email Address" required>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" name="number" minlength="10" maxlength="10" placeholder="Mobile Number"
                                    pattern="^[0-9]{10}$" title="Please enter a valid 10-digit phone number" required
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>

                        <!-- Package and Price Section -->
                        <div class="row mt-3 mb-3">
                            <!-- Package -->
                            <div class="col-md-6">
                                <label for="package" class="form-label">Packages</label>
                                <input type="text" class="form-control" name="package" id="package" value="<?= htmlspecialchars($city_name) ?>" readonly>
                            </div>

                            <!-- Price -->
                            <div class="col-md-6">
                                <label for="price" class="form-label">Package Price</label>
                                <input type="number" class="form-control" name="price" id="price" value="<?= htmlspecialchars($price) ?>" readonly>
                            </div>
                        </div>

                        <!-- Quantity Control Section -->
                        <div class="row mt-3 mb-3">
                            <div class="col-md-6">
                                <label for="quantity" class="form-label">Quantity</label>
                                <div class="quantity-control">
                                    <button type="button" class="quantity-btn" onclick="changeQuantity(-1)">-</button>
                                    <input type="number" class="quantity-input" id="quantity" name="quantity" value="1" min="1" readonly>
                                    <button type="button" class="quantity-btn" onclick="changeQuantity(1)">+</button>
                                </div>
                            </div>
                        </div>
                    
                        <ul>
                            <li class="text-muted mx-auto">We assure the privacy of your contact data.</li>
                            <li class="text-muted mx-auto">This data will only be used by our team to contact you and no other purposes.</li>
                        </ul>
                        
                        
                    </form>
                </div>
            </div>

            <!-- Second Column (1/4) -->
            <div class="col-lg-3">
                <div class="payment-summary">
                    <h3>Amount to Pay</h3>
                    <p>Amount: ₹<span id="amount">0</span></p>
                    <p>GST (5%): ₹<span id="gst">0</span></p>
                    <p><strong>Total: ₹<span id="total">0</span></strong></p>
                    <button  id="book-now-btn" style="display: none;" class="btn btn-success w-100">Book Now</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>