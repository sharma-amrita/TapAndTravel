<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> TapAndTours</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        .landing-video {
            width: 100%;
            height: 50vh;
            display: block;
            font-size: 4rem;
            font-weight: bolder;
            object-fit: cover;
        }

        .sidebar {
            /* background-color: rgb(190, 238, 251);     */
            background-color: rgb(255, 255, 255);
            padding: 18px 25px 18px 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(19, 8, 8, 0.1);
            text-align: justify;
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
    </style>
</head>

<body>
    <!-- header  -->
    <?php
    include 'components/header.php';
    ?>



    <div class="container-fluid video-container p-0" >
        <video autoplay loop muted playsinline class="landing-video" >
            <source src="img/video.mp4" type="video/mp4">
        </video>
        <div class="video-text ml-5">
            <!-- <span style="color:#EB4837;  font-size: 2rem;font-weight:bold;">Welcome to TapAndTours! </span> -->
        </div>
    </div>
    



    <div class="about-container">

        <div class="gallery pl-5 mb-5">
            <div class="about-card" data-aos="zoom-in-up" style="margin-top:10vh; ">
                <img src="img/buddha.png" alt="Gallery Image 1">
            </div>
            <div class="card-about" data-aos="zoom-in-up" style=" margin-top:21vh; ">
                <img src="img/indoanasia-lake.png" alt="Gallery Image 2">
            </div>

            <div class="about-card" data-aos="zoom-in-up" style=" margin-bottom:5vh;">
                <img src="img/bhutan/aerial-drone-view-nature-romania.png" alt="Gallery Image 4">
            </div>
            <div class="card-about" data-aos="zoom-in-up">
                <img src="img/view-chantilly-castle-france_126.png" alt="Gallery Image 3">
            </div>
        </div>
        <div class="about-content ">
            <div class="section-title">
                <span> About Us</span>
            </div>
            <h2 style="text-align:center">Who We Are</h2>
            <p style="text-align: justify; color:black">
                Founded in the year 2024 as TapAndTours.in, an online travel booking platform with an aim of
                providing assured quality services and worry less travel to its customers.At Tap & Tours, we take pride
                in offering curated travel experiences that cater to every traveler’s needs. Our meticulously designed
                itineraries ensure that you get the best of every destination while enjoying the convenience of
                well-planned tours, comfortable accommodations, and hassle-free bookings.<br><br> We provide a diverse
                range of services, including domestic and international tour packages, personalized trip planning, group
                tours, honeymoon getaways, adventure trips, and business travel solutions.Our user-friendly platform
                allows you to browse, compare, and book tours effortlessly. Whether you prefer a pre-designed package or
                a custom itinerary tailored to your specific interests, we make it easy for you to explore the world
                with just a few taps. With our 24/7 customer support, you can travel with confidence, knowing that
                assistance is always available whenever you need it.
                At Tap & Tours, we don’t just sell trips;
            </p>
            <!-- <a href="about.php" class="learn-more-btn">Learn More</a> -->
        </div>
    </div>


    <?php
    include 'components/about_card.php';
    ?>

    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-8 mt-4 mb-4">
                <div class="container package-container bg-white">
                    <h3 class="text-danger">Overview</h3>
                    <p class="text-secondary">Experience the best of Dubai with our exclusive 7-day guided tour. Explore
                        iconic landmarks, enjoy comfortable accommodations, delicious meals, and expert-guided
                        sightseeing tours.</p>
                    <h6>The Process of Booking and Enjoying a Tour with Our Company</h6>
                    <p class="text-secondary">✅ <strong>Tour Planning & Customization – </strong>The company offers
                        various travel packages, which can be customized based on customer preferences, including
                        destinations, activities, duration, and budget.


                    </p>
                    <p class="text-secondary">✅ <strong>Booking Process – </strong>Customers can browse available tours
                        and trips online or through a travel agent, with options to book and pay for tours through a
                        website, phone, or in-person consultation.</p>
                    <p class="text-secondary">✅ <strong>Customer Consultation – </strong>Travel experts assist customers
                        in choosing the right tour by offering recommendations, answering questions, and providing
                        information about destinations, accommodations, and itineraries.
                    </p>
                    <p class="text-secondary">✅ <strong> Partnerships with Vendors – </strong>The company collaborates
                        with hotels, transportation providers, and local tour operators to secure services for
                        accommodations, transfers, meals, and activities.
                    <p class="text-secondary">✅ <strong> Travel Support & Assistance - </strong>he company provides
                        pre-trip support, including help with travel documents, visas, and packing tips, along with
                        emergency assistance during the trip if needed.
                    </p>

                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="sidebar">
                    <h5 class="text-center text-danger">Why Choose Us?</h5>
                    <p class="text-dark text-center text-justify">TapAndTours Pvt. Ltd. is an award-winning travel
                        organization that excels with quality services from its experienced staff.Over the years, the
                        company has received positive feedback from its existing clients, so one can expect a cordial
                        reception.Our company's IATA certification ensures that we provide the best booking deals
                        available.</p>

                </div>
                <div class="sidebar" style=" margin-top: 20px;">
                    <h5 class="text-center" style="color:#FF4500;">Need Help for any Details?</h5>
                    <p class="text-center text-secondary">Our destination expert will be happy to help you resolve your
                        queries for this tour.</p>
                    <p style="margin-bottom: 3px;"><strong class="text-danger ">Call 24/7 For Any Help</strong></p>
                    <p style="margin-bottom:3px;"><i class="bi bi-telephone"></i> 9990205804</p>
                    <p style="margin-bottom:3px;"><i class="bi bi-clock"></i> 10:00 AM - 07:00 PM (Mon to Sat)</p>
                </div>
            </div>
        </div>

    </div>
    <?php
    include 'components/popularPackages.php';
    ?>

    </section>


    <!-- Footer -->
    <?php
    include 'components/footer.php';
    ?>
    <!-- Footer -->






    <script>
        AOS.init();
    </script>

</body>

</html>