<?php
session_start();


// If empty, check if we have them in session (from login redirect)
if (empty($city_name) && isset($_SESSION['booking_details'])) {
    $city_name = $_SESSION['booking_details']['city_name'];
    $price = $_SESSION['booking_details']['price'];
    unset($_SESSION['booking_details']);
}

$city_name = isset($_GET['city_name']) ? urldecode($_GET['city_name']) : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';

// If missing in GET, try session backup
if (empty($city_name) && isset($_SESSION['booking_details'])) {
    $city_name = $_SESSION['booking_details']['city_name'];
    $price = $_SESSION['booking_details']['price'];
    unset($_SESSION['booking_details']);
}
?>

 <!---------------------------------header------------------------------------------------------- -->
 <?php
  include 'components/header.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <!-- Load SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Then load SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!--  -->
    <style>
        body { background-color: #f8f9fa; }
        .main-container { max-width: 800px;  margin: 30px 0 30px 20vw; }
        .contact-form { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .quantity-control { display: flex; align-items: center; }
        .quantity-btn { background: #EB4837; color: white; border: none; padding: 5px 10px; cursor: pointer; font-size: 18px; }
        .quantity-btn:hover {border:2px solid  #EB4837; }
        .quantity-input { width: 50px; text-align: center; border: 1px solid #ddd; margin: 0 5px; }
        .amount-box { background: #e9ecef; padding: 15px; border-radius: 8px; }
        .btn-submit { background: #EB4837; color: white; align-items: center; padding: 10px; font-size: 18px; border-radius: 5px; }
        .btn-submit:hover { border:2px solid  #EB4837;font-weight: bold; }
    </style>
</head>
<body>

<div class="main-container">
    <div class="contact-form">
        <h4 class="text-center">Travel Booking Form</h4>
        <form id="bookingForm" action="process_booking.php" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstName" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastName" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mobile Number</label>
                    <input type="tel" class="form-control" name="number" maxlength="10" pattern="[0-9]{10}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Package</label>
                    <input type="text" class="form-control" name="package" id="package" value="<?= htmlspecialchars($city_name) ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Package Price</label>
                    <input type="number" class="form-control" name="price" id="price" value="<?= htmlspecialchars($price) ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Unit</label>
                    <div class="quantity-control">
                        <button type="button" class="quantity-btn" onclick="changeQuantity(-1)">-</button>
                        <input type="number" class="quantity-input" id="quantity" name="quantity" value="1" min="1" readonly>
                        <button type="button" class="quantity-btn" onclick="changeQuantity(1)">+</button>
                    </div>
                </div>
            </div>

            <div class="amount-box">
                <p>Amount: ₹<span id="amount">0</span></p>
                <p>GST (5%): ₹<span id="gst">0</span></p>
                <p><strong>Total: ₹<span id="total">0</span></strong></p>
                <button type="submit" class="btn btn-submit" id="submitBooking">Submit Booking</button>
            </div>

       
        </form>
    </div>
</div>

<script>
    // Verify SweetAlert2 is loaded
    if (typeof Swal === 'undefined') {
        // Load SweetAlert2 dynamically if missing
        var script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
        script.onload = initBookingForm;
        document.head.appendChild(script);
        
        var link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css';
        document.head.appendChild(link);
    } else {
        initBookingForm();
    }

    function initBookingForm() {
        // Initialize calculations
        updateTotal();

        function changeQuantity(change) {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value) + change;
            if (quantity < 1) quantity = 1;
            quantityInput.value = quantity;
            updateTotal();
        }

        function updateTotal() {
            const quantity = parseInt(document.getElementById('quantity').value) || 1;
            const price = parseFloat(document.getElementById('price').value) || 0;
            const amount = quantity * price;
            const gst = amount * 0.05;
            const total = amount + gst;

            document.getElementById('amount').textContent = amount.toFixed(2);
            document.getElementById('gst').textContent = gst.toFixed(2);
            document.getElementById('total').textContent = total.toFixed(2);
            
            return total;
        }

        // Quantity button event listeners
        document.querySelector('.quantity-btn:first-child').addEventListener('click', function() {
            changeQuantity(-1);
        });
        document.querySelector('.quantity-btn:last-child').addEventListener('click', function() {
            changeQuantity(1);
        });

        $("#bookingForm").submit(function(e) {
            e.preventDefault();
            
            const totalAmount = updateTotal() * 100; // Convert to paise
            
            // Prepare form data
            let formData = $(this).serializeArray();
            
            // Show loading state
            $("#submitBooking").prop('disabled', true).text('Processing...');
            
            $.ajax({
                url: "process_booking.php",
                type: "POST",
                data: formData,
                success: function(response) {
                    try {
                        let data = JSON.parse(response);
                        
                        if (data.order_id) {
                            var options = {
                                "key": "rzp_test_QDWPYakgW8Jdu1",
                                "amount": data.amount,
                                "currency": "INR",
                                "name": "Travel Booking",
                                "description": "Package: " + $("input[name='package']").val(),
                                "order_id": data.order_id,
                                "handler": function(paymentResponse) {
                                    saveBooking(paymentResponse, formData);
                                },
                                "prefill": {
                                    "name": $("input[name='firstName']").val() + ' ' + $("input[name='lastName']").val(),
                                    "email": $("input[name='email']").val(),
                                    "contact": $("input[name='number']").val()
                                },
                                "theme": {
                                    "color": "#28a745"
                                }
                            };
                            var rzp = new Razorpay(options);
                            rzp.open();
                        } else {
                            showAlert('Error', data.error || 'Payment failed', 'error');
                        }
                    } catch (e) {
                        showAlert('Error', 'Invalid server response', 'error');
                        console.error(e);
                    }
                },
                error: function(xhr) {
                    showAlert('Error', 'Server request failed', 'error');
                    console.error(xhr.responseText);
                },
                complete: function() {
                    $("#submitBooking").prop('disabled', false).text('Submit Booking');
                }
            });
        });

        function saveBooking(paymentResponse, formData) {
            // Create form object
            let formObject = {};
            formData.forEach(function(item) {
                formObject[item.name] = item.value;
            });
            formObject.payment_id = paymentResponse.razorpay_payment_id;

            // Show processing
            showAlert('Saving Booking', 'Please wait while we process your booking...', 'info', true);

            // Submit to server
            $.ajax({
                url: "save_booking.php",
                type: "POST",
                data: formObject,
                dataType: 'json',
                success: function(response) {
                    if (typeof Swal !== 'undefined') {
                        Swal.close();
                    }
                    
                    if (response.success) {
                        showAlert('Success!', response.message, 'success').then(() => {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        });
                    } else {
                        showAlert('Error', response.error || 'Failed to save booking', 'error');
                    }
                },
                error: function(xhr) {
                    showAlert('Error', 'Failed to connect to server', 'error');
                    console.error(xhr.responseText);
                }
            });
        }

        function showAlert(title, text, icon, showLoading = false) {
            if (typeof Swal !== 'undefined') {
                if (showLoading) {
                    return Swal.fire({
                        title: title,
                        html: text,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                }
                return Swal.fire(title, text, icon);
            } else {
                // Fallback to basic alert
                alert(title + "\n" + text);
                return {
                    then: function(callback) {
                        callback();
                    }
                };
            }
        }
    }
</script>


  <!---------------------------------------------- Footer----------------------------------------------->
  <?php
  include 'components/footer.php';
  ?>
</body>
</html>
