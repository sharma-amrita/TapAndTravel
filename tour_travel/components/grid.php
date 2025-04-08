<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$response = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    // $address = $_POST['address'];
    $message = $_POST['message'];

    require 'phpmailer/Exception.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/PHPMailer.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sharma81amrita@gmail.com';
        $mail->Password = 'joux mfpm awgf xuxy';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('sharma81amrita@gmail.com', 'contact');
        $mail->addAddress('sharma81amrita@gmail.com', 'amrita');

        $mail->isHTML(true);
        $mail->Subject = 'Test Contact';
        $mail->Body = "Sender Name - $name <br> Sender Email - $email <br> Message - $message";

        $mail->send();
        $response = "success";

    } catch (Exception $e) {
        $response = "error";
    }
}
?>






<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- Bootstrap 5 JS (Required for toggling navbar in mobile) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap JS (Required for Navbar & Dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<style>
    .sidebar {
        background-color: rgb(255, 255, 255);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(19, 8, 8, 0.1);
        margin: 0px 0 20px 0;
    }

    .sidebar:hover {
        background-color: rgb(248, 239, 207);
    }

    .package-container {
        background-color: rgb(255, 255, 255);
        position: relative;
        padding: 20px 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(19, 8, 8, 0.1);
    }
    form{
        margin-bottom:20px;
    }
    .itinerary-section {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .day-heading {
        background: #e0e5f5;
        padding: 5px 15px;
        font-weight: bold;
        display: inline-block;
        border-radius: 5px;
    }

    .day-content {
        margin-top: 10px;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: initial !important;
        /* Default font */
        font-size: initial !important;
        /* Default font size */
        line-height: initial !important;
    }
        .popup {
            display: none;
            position: fixed;
            top: 100%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgb(5, 18, 162);
            padding: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            z-index: 1000;
            text-align: center;
        }

        .popup-content {
            font-size: 1.2rem;
            color: #333;
        }

        .popup.success {
            background-color: #24a75f;
        }

        .popup.error {
            border: 2px solid red;
        }

        .close-btn {
            float: right;
            font-size: 20px;
            cursor: pointer;
        }

        /* Default line height */
  
</style>


<div class="container ">
    <div class="row px-0">
        <div class="col-md-8  mb-4">
            <div class="container package-container bg-white">
                <h3 style="color:#FF4500; text-align: center;">Overview</h3>
                <p class="text-dark">Experience the best of Dubai with our exclusive 7-day guided tour. Explore iconic
                    landmarks, enjoy comfortable accommodations, delicious meals, and expert-guided sightseeing tours.
                </p>
                <h6 style="color:#FF4500;">The Process of Booking and Enjoying a Tour with Our Company</h6>
                <p class="text-dark">✅ <strong>Tour Planning & Customization – </strong>The company offers various
                    travel packages, which can be customized based on customer preferences, including destinations,
                    activities, duration, and budget.


                </p>
                <p class="text-dark">✅ <strong>Booking Process – </strong>Customers can browse available tours and trips
                    online or through a travel agent, with options to book and pay for tours through a website, phone,
                    or in-person consultation.</p>
                <p class="text-dark">✅ <strong>Customer Consultation – </strong>Travel experts assist customers in
                    choosing the right tour by offering recommendations, answering questions, and providing information
                    about destinations, accommodations, and itineraries.
                </p>
                <p class="text-dark">✅ <strong> Partnerships with Vendors – </strong>The company collaborates with
                    hotels, transportation providers, and local tour operators to secure services for accommodations,
                    transfers, meals, and activities.
                <p class="text-dark">✅ <strong> Travel Support & Assistance - </strong>he company provides pre-trip
                    support, including help with travel documents, visas, and packing tips, along with emergency
                    assistance during the trip if needed.
                </p>

            </div>
        </div>
        <div class="col-md-4">
            <div class="sidebar">
                <h5 class="text-center" style="color:#FF4500;">Why Choose Us?</h5>
                <p class="text-dark text-center text-justify mb-0">TapAndTours Pvt. Ltd.' is an award-winning travel
                    organization that excels with quality services from its experienced staff.Over the years, the
                    company has received positive feedback from its existing clients, so one can expect a cordial
                    reception.Our company's IATA certification ensures that we provide the best booking deals available.
                </p>
            </div>

            <div class="sidebar">
                <h5 class="text-center" style="color:#FF4500;">Need Help for any Details?</h5>
                <p class="text-center text-secondary">Our destination expert will be happy to help you resolve your
                    queries for this tour.</p>
                <p style="margin-bottom: 5px;"><strong class="text-danger ">Call 24/7 For Any Help</strong></p>
                <p style="margin-bottom:5px;"><i class="bi bi-telephone"></i> 9990205804</p>
                <p style="margin-bottom:5px;"><i class="bi bi-clock"></i> 10:00 AM - 07:00 PM (Mon to Sat)</p>
            </div>
        </div>
    </div>

    <div class="row px-0">
        <div class="col-md-8 mt-4 mb-4">
            <div class="package-container">
                <h3 style="color:#FF4500; text-align: center;">Itinerary</h3>
                <div class="accordion" id="itineraryAccordion">

                    <!-- Day 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header text-dark" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What is an early Bagpack Package Offer?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#itineraryAccordion">
                            <div class="accordion-body">
                                <p>An early Bagpack Package travel sale takes place before the beginning of the summer
                                    season to ensure that you get the best deals before it’s too late. The difference
                                    between a good traveler and a bad traveler is planning. If you are someone who
                                    travels with flight plans, you should plan your trip in advance to get the best
                                    price. And that’s where the early Package offer comes in.</p>
                            </div>
                        </div>
                    </div>

                    <!-- iteration 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header text-dark" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                I don’t have flights included in my journey. Should I book through the early Package
                                travel sale?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#itineraryAccordion">
                            <div class="accordion-body">
                                <p>Absolutely YES. The early Package offers not only flight deals but also better rates
                                    on hotels, transportation, etc. When the season is in full swing, prices will be
                                    higher than usual. So, the early Package offer helps you secure your arrangements
                                    before demand drives up the prices. When demand is high and supply is limited,
                                    prices automatically increase. We are helping you book your trip before those higher
                                    prices come into play. Friends who care for each other are the best travel partners,
                                    like you and us.</p>

                            </div>
                        </div>
                    </div>

                    <!--iteration 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header text-dark" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What if I want to shift my booking after booking, since I am booking for June?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#itineraryAccordion">
                            <div class="accordion-body">
                                <p>You are more than welcome to do that. JustWravel provides you with the option to
                                    shift your booking according to the trip calendar. You can book the trip and, if
                                    anything goes wrong, get in touch with our team, and we will assist you with the
                                    process.</p>
                            </div>
                        </div>
                    </div>

                    <!--iteration 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header text-dark" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What types of trips can I book with the early Package offer?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#itineraryAccordion">
                            <div class="accordion-body">
                                <p>With our early Package offer, you have a variety of options to choose from. Whether
                                    you're interested in backpacking across scenic landscapes, biking through thrilling
                                    trails, enjoying a relaxing weekend getaway, interested on exciting treks, or
                                    exploring international destinations, our early Package deals cover a wide range of
                                    travel experiences. You can select the type of adventure that best suits your
                                    interests and travel style.</p>
                            </div>
                        </div>
                    </div>
                    <!--iteration 5  -->
                    <div class="accordion-item">
                        <h2 class="accordion-header text-dark" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                What Makes JustWravel's Early Bird Sale Different from Others?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#itineraryAccordion">
                            <div class="accordion-body">
                                <p>

                                    ✅Biggest on-ground crew – we’ve got your back everywhere!<br>
                                    ✅Certified trip captains – not just leads, but legends.<br>
                                    ✅No-cost EMI – adventure now, pay later!<br>
                                    ✅Free cancellations – because plans change.<br>
                                    ✅Adventure Medical Insurance – because you deserve peace of mind.<br>
                                    ✅70,000+ reviews on Google – travelers trust us!<br>
                                    ✅MSME, TripAdvisor, and Economic Times award winners – recognized for
                                    excellence.<br>
                                    ✅Official tour partners of Uttar Pradesh and West Bengal Tourism.<br>
                                    ✅More than that – India’s safest and most trusted travel community!</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="contact-form">
                <h5 class="mb-3 text-center">Get in touch with our travel expert</h5>
                <form action="" method="post" id="frmContactus" >
                    <div class="mt-3 mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Your Name"
                            pattern="^[A-Za-z\s]+$" title="Please enter a valid name (letters only)" required
                            oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                    </div>
                    <div class="mt-3 mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="mt-3 mb-3">
                        <input type="tel" class="form-control" name="number" minlength="10" maxlength="10"
                            placeholder="Mobile Number" pattern="^[0-9]{10}$"
                            title="Please enter a valid 10-digit phone number" required
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div class="mt-3 mb-3">
                        <textarea id="message" name="message" class="form-control" rows="2"
                            placeholder="Enter your message" required pattern="^[A-Za-z\s]+$"
                            title="Please enter a valid name (letters only)" required
                            oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"></textarea>
                    </div>
                    <ul>
                        <li class="text-muted ">We assure the privacy of your contact data.</li>
                        <li class="text-muted ">This data will only be used by our team to contact you and no
                            other purposes.</li>
                    </ul>
                    <button type="submit" id="submit" name="submit" class="btn btn-danger w-100">Submit</button>
                </form>

                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close-btn" onclick="closePopup()">&times;</span>
                        <p id="popup-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    function showPopup(type, message) {
        var popup = document.getElementById("popup");
        var popupMessage = document.getElementById("popup-message");

        popupMessage.innerHTML = message;
        popup.classList.add(type);
        popup.style.display = "block";

        setTimeout(() => {
            closePopup();
        }, 3000);
    }

    function closePopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "none";
        popup.classList.remove("success", "error");
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        let response = "<?php echo $response; ?>";

        if (response === "success") {
            Swal.fire({
                title: 'Success!',
                text: 'Your query has been submitted successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            })
        } else if (response === "error") {
            Swal.fire({
                title: 'Error!',
                text: 'Some thing Went Wrong Please try again.',
                icon: 'error'
            });
        }
    });
</script>