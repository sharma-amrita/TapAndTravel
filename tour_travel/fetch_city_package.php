<?php
include('./admin/functions/userfunction.php');

if (isset($_GET['city_id'])) {
    $category_slug = $_GET['city_id'];
    $data = getCityActive("add_city", $category_slug);

    if (!$data) {
        die('Query failed: ' . mysqli_error($con));  // Error handling
    }

    $id = mysqli_fetch_array($data);

    if ($id) {
        $cid = $id['id']; // Country ID
        $heading = $id['heading'];
        $city_name = $id['city_name'];
        $price = $id['price'];
        $location = $id['location'];
        $description = $id['description'];
        $image1 = $id['image1'];
        $image2 = $id['image2'];
        $image3 = $id['image3'];
        $image4 = $id['image4'];


        $products = getProdByCategory($cid);
        // $cityy = getProductByCity( $city_id);

        ?>

        <?php
        include 'components/header.php';
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $heading ?></title>
            <link rel="stylesheet" href="styles.css">

            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
            <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

            <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
            <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
                rel="stylesheet"> -->

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

            <style>
                body {
                    background-color: rgb(251, 252, 248);

                    font-family: 'Poppins', sans-serif;
                }

                .container {
                    margin-top: 40px;
                }

                .content-section {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }

                .text-content {
                    margin-bottom: 50px;
                    width: 60%;
                    font-size: 40px;
                }

                .image-gallery {
                    width: 39%;
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 10px;
                }

                .image-gallery img {
                    width: 100%;
                    height: 100%;
                    border-radius: 10px;
                    object-fit: cover;
                }

                .modal {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(40, 37, 37, 0.9);
                }

                .modal-content {
                    width: 60%;
                    height: 90%;
                    object-fit: cover;

                }

                .prev,
                .next {
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    background-color: rgba(0, 0, 0, 0.5);
                    color: white;
                    border: none;
                    padding: 10px 20px;
                    cursor: pointer;
                    font-size: 24px;
                }

                .prev {
                    left: 5%;
                }

                .next {
                    right: 5%;
                }

                .close {
                    position: absolute;
                    top: 10px;
                    right: 20px;
                    font-size: 30px;
                    cursor: pointer;
                }

                .grid-container {
                    display: flex;
                    gap: 20px;
                    margin-top: 40px;
                }

                .left-column {
                    width: 70%;
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                }

                .right-column {
                    width: 26%;
                    height: 50%;
                    background: #ffffff;
                    padding: 16px;
                    border-radius: 12px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                    text-align: center;
                }

                .inclusion-card {
                    background: #f1f8ff;
                    padding: 10px 20px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                }

                .price-details h2 {
                    color: #007bff;
                    font-size: 32px;
                }

                .per-person {
                    background: #e1f0ff;
                    padding: 5px 10px;
                    border-radius: 12px;
                }

                .query-button {
                    margin-top: 20px;
                    display: flex;
                    justify-content: center;
                    gap: 10px;
                }

                .whatsapp-button {
                    background: #25d366;
                    color: #fff;
                    padding: 10px 20px;
                    border-radius: 20px;
                    border: none;
                    cursor: pointer;
                }

                .send-query {
                    background: transparent;
                    color: #007bff;
                    padding: 10px 20px;
                    border: 1px solid #007bff;
                    border-radius: 20px;
                    cursor: pointer;
                }

                #popupOverlay {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.5);
                    z-index: 999;
                }

                #contactForm {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background: #f9f9f9;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    z-index: 1000;
                    display: none;
                    max-width: 400px;
                    width: 90%;
                }

                input,
                textarea {
                    width: 100%;
                    padding: 10px;
                    margin: 10px 0;
                    border: 1px solid #EB4837;
                    ;
                    border-radius: 5px;
                }

                button {
                    padding: 10px 20px;
                    background-color: #EB4837;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }

                .feature-container {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                    margin-top: 20px;
                    margin-bottom: 20px;
                }

                .feature-item {
                    background: #fff4e5;
                    padding: 20px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 8px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    width: 150px;
                    height: 90px;
                }

                .feature-icon i {
                    color: #ff7b00;
                    font-size: 18px;
                }

                .feature-text {
                    font-size: 14px;
                    font-weight: bold;
                }

                .payment-policy table {
                    width: 124%;
                    border-collapse: collapse;
                    margin-top: 1rem;
                }

                .payment-policy th,
                .payment-policy td {
                    padding: 0.75rem;
                    text-align: center;
                    border: 1px solid #ddd;
                }

                .payment-policy th {
                    background-color: #f9fafb;
                    font-weight: bold;
                }


                .cancellation-policy {
                    /* padding: 20px; */
                    border-radius: 10px;
                }

                table {
                    width: 91%;
                    border-collapse: collapse;
                    text-align: center;
                }

                th,
                td {
                    border: 1px solid #ddd;
                    padding: 10px;
                }

                th {
                    background-color: #f9fafb;
                }

             p{
                padding: 0 10px 0 10px;
             }


                strong {
                    font-weight: bold;
                }

                @media (min-width: 768px) {
                    .content-section {
                        flex-direction: row;
                        justify-content: space-between;
                    }

                    .text-content {
                        width: 60%;
                        text-align: left;
                        font-size: 40px;
                    }

                    .image-gallery {
                        width: 39%;
                        grid-template-columns: repeat(2, 1fr);
                    }

                    .image-gallery img:hover {
                        transform: translateY(-10px);
                        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                        transition: 0.3s ease;
                    }

                    a:hover {
                        text-decoration: none !important;
                    }

                    @media screen and (max-width: 768px) {
                        .left-column {
                            display: grid;
                            grid-template-columns: repeat(2, 1fr);
                            gap: 10px;
                        }

                        .feature-container {
                            display: grid;
                            grid-template-columns: repeat(2, 1fr);
                            gap: 10px;
                        }

                        .payment-policy,
                        .cancellation-policy {
                            width: 100%;
                            padding: 10px;
                        }

                        table {
                            font-size: 12px;
                        }

                        th,
                        td {
                            padding: 5px;
                        }

                    }
                }

                @media (max-width: 767px) {
                    .content-section {
                        flex-direction: column;
                    }

                    .text-content {
                        width: 100%;
                        font-size: 20px;
                        text-align: center;
                        text-align: justify;
                    }

                    .image-gallery {
                        width: 100%;
                        display: flex;
                        flex-direction: column;
                        gap: 10px;
                    }

                    .image-gallery img {
                        width: 100%;
                        height: 40vh;
                    }

                    .left-column {
                        display: none;
                    }

                    .right-column {
                        width: 100%;
                        text-align: center;
                    }

                    .price-details h2 {
                        font-size: 24px;
                    }

                    .per-person {
                        display: inline-block;
                        font-size: 14px;
                    }

                    .query-button {
                        flex-direction: column;
                        align-items: center;
                    }

                    .whatsapp-button,
                    .send-query {
                        width: 100%;
                        padding: 12px;
                    }
                }
            </style>
        </head>

        <body>
            <!---------------------------Country Details Section---------------------------------------------------->
            <div class="container ">
                <div class="content-section">

                    <div class="text-content">
                        <h3 style="color:#FF4500;margin-bottom:10px;">
                            <?= $city_name ?>
                        </h3>
                        <p><strong>Location:</strong> <?= $location ?></p>
                        <p><strong>Starting Price:</strong> Rs.<?= number_format($price) ?></p>
                        <p><?= $description ?></p>
                    </div>

                    <!-- Image Gallery -->
                    <div class="image-gallery">
                        <img src="./Uploads/<?= $image1 ?>" alt="Image" onclick="openModal(0)" onclick="openModal(0)">
                        <img src="./Uploads/<?= $image2 ?>" alt="Image" onclick="openModal(1)" onclick="openModal(1)">
                        <img src="./Uploads/<?= $image3 ?>" alt="Image" onclick="openModal(2)" onclick="openModal(2)">
                        <img src="./Uploads/<?= $image4 ?>" alt="Image" onclick="openModal(3)" onclick="openModal(3)">
                    </div>
                </div>

                <!------------------Modal for Fullscreen Image------------->
        <div id="imageModal" class="modal" style="display: none;">
            <span class="close" onclick="closeModal()">&times;</span>
            <button class="prev" onclick="changeImage(-1)">&#10094;</button>
            <img id="modalImage" class="modal-content">
            <button class="next" onclick="changeImage(1)">&#10095;</button>
        </div>
    </div>


    <!-------------------------------featured iteration---------------------------------------------------->
            <div class="grid-container px-5">
                <!-- First Column  -->
                <div class="left-column">
                    <div class="inclusion-card">
                        <span class="inclusion-icon">🍽️</span><span class="inclusion-text">Meals</span>
                    </div>
                    <div class="inclusion-card">
                        <span class="inclusion-icon">🏨</span><span class="inclusion-text">Stays</span>
                    </div>
                    <div class="inclusion-card">
                        <span class="inclusion-icon">🎉</span><span class="inclusion-text">Activities</span>
                    </div>
                    <div class="inclusion-card">
                        <span class="inclusion-icon">📸</span><span class="inclusion-text">Sightseeing</span>
                    </div>
                    <div class="inclusion-card">
                        <span class="inclusion-icon">🚐</span><span class="inclusion-text">Transfers</span>
                    </div>

                    <!------------------------------Feature Container Inclusions----------------------------------------->
            <div class="feature-container">
                <div class="feature-item">
                    <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                    <p class="feature-text">Safe Travel</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fas fa-calendar-times"></i></div>
                    <p class="feature-text">Flexible Cancellation</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fas fa-credit-card"></i></div>
                    <p class="feature-text">Easy EMI</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fas fa-user-check"></i></div>
                    <p class="feature-text">Certified Captains</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fas fa-clock"></i></div>
                    <p class="feature-text">24/7 Support</p>
                </div>
            </div>

            <!---------------------------------------payment-policy------------------------------------------------>
                    <div class="payment-policy">
                        <h2>Payment Policy</h2>
                        <table>
                            <tr>
                                <th>30-0 days</th>
                                <th>Upto 60 days</th>
                                <th>59-46 days</th>
                                <th>45-31 days</th>
                                <th>30-15 days</th>
                            </tr>
                            <tr>
                                <td>Booking Amount</td>
                                <td>✔️</td>
                                <td>✔️</td>
                                <td>✔️</td>
                                <td>✔️</td>
                            </tr>
                            <tr>
                                <td>50% Payment</td>
                                <td>Optional</td>
                                <td><span>Compulsory</span></td>
                                <td>❌</td>
                                <td>❌</td>
                            </tr>
                            <tr>
                                <td>75% Payment</td>
                                <td>Optional</td>
                                <td>Optional</td>
                                <td><span>Compulsory</span></td>
                                <td>❌</td>
                            </tr>
                            <tr>
                                <td>100% Payment</td>
                                <td>Optional</td>
                                <td>Optional</td>
                                <td>Optional</td>
                                <td><span>Compulsory</span></td>
                            </tr>
                        </table>
                    </div>

                    <!-------------------------------------cancellation-policy-------------------------------------------->
                    <div class="cancellation-policy">
                        <h2>Cancellation Policy</h2>
                        <table>
                            <tr>
                                <th></th>
                                <th>Upto 60 days</th>
                                <th>59-46 days</th>
                                <th>45-31 days</th>
                                <th>30-0 days</th>
                            </tr>
                            <tr>
                                <td>Batch Shifting</td>
                                <td>✔️</td>
                                <td>❌</td>
                                <td>❌</td>
                                <td>❌</td>
                            </tr>
                            <tr>
                                <td>Cancellation Charge</td>
                                <td><strong>Free Cancellation</strong></td>
                                <td><strong>25% of the Trip Amount</strong></td>
                                <td><strong>50% of the Trip Amount</strong></td>
                                <td><strong>100% of the Trip Amount</strong></td>
                            </tr>
                            <tr>
                                <td>Booking Amount</td>
                                <td>Refunded in mode of Credit Note</td>
                                <td>Adjusted in Refund Deduction</td>
                                <td>Adjusted in Refund Deduction</td>
                                <td>No Refund</td>
                            </tr>
                            <tr>
                                <td>Remaining Amount</td>
                                <td>Full Refund (minus) booking amount</td>
                                <td>Refund (minus) 25% of the trip amount</td>
                                <td>Refund (minus) 50% of the trip amount</td>
                                <td>No Refund</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-----------------Second Column --------------->
        <div class="right-column">

            <div class="price-details">
                <p>Starting From <span class="info-icon">ℹ️</span></p>
                <h2>₹
                    <?php echo htmlspecialchars($price); ?>
                </h2>
                <span class="per-person">Per Person</span>
            </div>

            <div class="query-button" id="whatsappIcon">
                <!-- <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp Icon"> -->
                <button class="whatsapp-button">💬</button>
                </a>
                <a href="form_login.php?redirect_to=booking&city_name=<?= urlencode($city_name) ?>&price=<?= $price ?>">
                    <button class="send-query">Book Now</button>
                </a>
            </div>
        </div>
    </div>
    <!----------------------------popup for te whatsup button--------------------------------------------->
    <div id="popupOverlay"></div>

    <form id="contactForm">
        <input style="color:black; font-size:12px;" type="text" id="name" placeholder=" Name" required>
        <input style="color:black; font-size:12px;" type="email" id="email" placeholder="Email" required>
        <input style="color:black; font-size:12px;" type="phone" id="phone" placeholder="Phone Number" required>

        <textarea id="message" placeholder="Your Message" rows="4" required></textarea>
        <button type="submit">Send to WhatsApp</button>
    </form>

    <!----------------------------------all City Cards----------------------------------------------------->
    <h2 Style="text-align: center;margin-top:40px;">Explore Our Packages</h2>
    <p Style="text-align: center;">Your journey begins here, with options galore,Explore our packages and find so much
        more.</p>


    <div style="margin:0px;" id="packagesContainer" class="row px-3 ">
        <?php
        if (mysqli_num_rows($products) > 0) {
            foreach ($products as $item) {
                ?>
        <div class="col-md-4 mb-4">
            <a href="fetch_city_package.php?city_id=<?= $item['city_id'] ?>" class="no-hover-underline">
                <div class="card package-card">
                    <img src="./Uploads/<?= $item['image1']; ?>" class="card-img-top" alt="Package Image">
                    <div class="card-body">
                        <h5 class="card-title text-center text-decoration-none" style="color:#FF4500;">
                            <strong>
                                <?= $item['city_name'] ?>
                            </strong>
                        </h5>
                        <p style="color:black;"><strong>Starting Price:</strong> Rs.
                            <?= number_format($item['price']) ?>
                            Per Person
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <?php

            }
        } else {
            echo "no data available";
        }

        ?>
    </div>



    


    <!---------------------------------------footer section----------------------------------------------->
    <?php
            include 'components/footer.php';
            ?>
</body>

</html>

<?php
    } else {
        echo "Something went wrong";
    }
} else {
    echo "Something went wrong";
}
?>
<script>
    function openModal(index) {
        const images = ["<?= $image1 ?>", "<?= $image2 ?>", "<?= $image3 ?>", "<?= $image4 ?>"];
        document.getElementById("modalImage").src = "./Uploads/" + images[index];
        document.getElementById("imageModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("imageModal").style.display = "none";
    }

    function changeImage(step) {
        const images = ["<?= $image1 ?>", "<?= $image2 ?>", "<?= $image3 ?>", "<?= $image4 ?>"];
        let currentIndex = images.indexOf(document.getElementById("modalImage").src.split('/').pop());
        let newIndex = (currentIndex + step + images.length) % images.length;
        document.getElementById("modalImage").src = "./Uploads/" + images[newIndex];
    }
</script>
<!-------------------------------script for the whatup button-------------------------------------->
<script>
    const whatsappIcon = document.getElementById('whatsappIcon');
    const contactForm = document.getElementById('contactForm');
    const popupOverlay = document.getElementById('popupOverlay');

    // Toggle Contact Form as Popup
    whatsappIcon.addEventListener('click', function () {
        const isVisible = contactForm.style.display === 'block';
        contactForm.style.display = isVisible ? 'none' : 'block';
        popupOverlay.style.display = isVisible ? 'none' : 'block';
    });

    // Close Popup when Clicking Outside Form
    popupOverlay.addEventListener('click', function () {
        contactForm.style.display = 'none';
        popupOverlay.style.display = 'none';
    });

    // Send Form Data to WhatsApp
    contactForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();
        const phone = document.getElementById('phone').value.trim();

        const phoneNumber = '918171015245'; // Replace with your WhatsApp number in international format

        if (!name || !email || !message) {
            alert('Please fill in all fields.');
            return;
        }

        const whatsappMessage = `Name: ${encodeURIComponent(name)}%0AEmail: ${encodeURIComponent(email)}%0APhone: ${encodeURIComponent(phone)}%0AMessage: ${encodeURIComponent(message)}`;
        const whatsappURL = `https://wa.me/${phoneNumber}?text=${whatsappMessage}`;

        console.log('Redirecting to:', whatsappURL);

        window.open(whatsappURL, '_blank');

        // Close the popup after sending
        contactForm.style.display = 'none';
        popupOverlay.style.display = 'none';
    });
</script>