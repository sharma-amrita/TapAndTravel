<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> TapAndTours</title>
  <link rel="stylesheet" href="styles.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</head>
<body>

  <!---------------------------------header11------------------------------------------------------- -->
  
  <?php
   include 'components/header.php';
  ?>


  <section >
    <div class="carousel-container">
      <!------------------------hero section video------------------------------------------------>
      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <video autoplay loop muted playsinline class="landing-video">
              <source src="img/VDO.mp4" type="video/mp4">
            </video>
          </div>

        </div>

      </div>




      <!--------------------------------- trending destinations----------------------------------------------->
      <div class="destination-container mt-5">
        <div class="row  text-center">
          <div class="col-12 mt-4">
            <div class="section-title">
              <span> Customer Choice</span>
            </div>
            <h2 class="text-center ">Top Trending Destinations</h2>
            <p class="paragraph">Experience the magic of the world’s most loved and trending destinations, where
              breathtaking landscapes, rich cultures, and unforgettable adventures come together to create memories that
              last a lifetime.</p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4 text-center">
            <a href="fetch_packages.php?id=5" class="text-decoration-none text-dark">
              <div class="bg-image rounded-circle mx-auto"
                style="background-image: url('img/russia/landscape-religious-transilvania.png'); height: 250px; width: 250px; background-size: cover; background-position: center; background-repeat: no-repeat;">
              </div>
              <h4>Russia</h4>
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4 text-center">
            <a href="fetch_packages.php?id=10" class="text-decoration-none text-dark">
              <div class="bg-image rounded-circle mx-auto"
                style="background-image: url('img/malaysia/malacca-straits-mosque-masjid-se.png'); height: 250px; width: 250px; background-size: cover; background-position: center; background-repeat: no-repeat;">
              </div>
              <h4>Malaysia</h4>
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4 text-center">
            <a href="fetch_packages.php?id=2" class="text-decoration-none text-dark">
              <div class="bg-image rounded-circle mx-auto"
                style="background-image: url('img/Thailand/beautiful-sunset-wat-arun-temple.png'); height: 250px; width: 250px; background-size: cover; background-position: center; background-repeat: no-repeat;">
              </div>
              <h4>Thailand</h4>
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4 text-center">
            <a href="fetch_packages.php?id=3" class="text-decoration-none text-dark">
              <div class="bg-image rounded-circle mx-auto"
                style="background-image: url('img/dubai/Dubai Marina.jpeg'); height: 250px; width: 250px; background-size: cover; background-position: center; background-repeat: no-repeat;">
              </div>
              <h4>Dubai</h4>
            </a>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4 text-center">
            <a href="fetch_packages.php?id=11" class="text-decoration-none text-dark">
              <div class="bg-image rounded-circle mx-auto"
                style="background-image: url('img/eiffel.jpeg'); height: 250px; width: 250px; background-size: cover; background-position: center; background-repeat: no-repeat;">
              </div>
              <h4>France</h4>
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4 text-center">
            <a href="fetch_packages.php?id=7" class="text-decoration-none text-dark">
              <div class="bg-image rounded-circle mx-auto"
                style="background-image: url('img/maldives/beaches.jpg'); height: 250px; width: 250px; background-size: cover; background-position: center; background-repeat: no-repeat;">
              </div>
              <h4>Maldives</h4>
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4 text-center">
            <a href="fetch_packages.php?id=4" class="text-decoration-none text-dark">
              <div class="bg-image rounded-circle mx-auto"
                style="background-image: url('img/bhutan/aerial-drone-view-nature-romania.png'); height: 250px; width: 250px; background-size: cover; background-position: center; background-repeat: no-repeat;">
              </div>
              <h4>Bhutan</h4>
            </a>
          </div>

          <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4 text-center">
            <a href="fetch_packages.php?id=9" class="text-decoration-none text-dark">
              <div class="bg-image rounded-circle mx-auto"
                style="background-image: url('img/egypt/sphinx-against-backdrop-great-eg.png'); height: 250px; width: 250px; background-size: cover; background-position: center; background-repeat: no-repeat;">
              </div>
              <h4>Egypt</h4>
            </a>
          </div>
        </div>
      </div>
</div>



      <!---------------------------------------- Carousel Controls------------------------------------>
      <!-- <button class="carousel-control-prev" type="button" data-bs-target="#trendingDestinationsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#trendingDestinationsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button> -->
  
          

          <?php
          include 'components/popularPackages.php';
          ?>

      <!----------------------------------------FAQ--------------------------------------------->
      <?php
      include 'components/Faq.php';
      ?>
      <!----------------------------- Reviews-Testimonials----------------------------------->
      <div class="mb-5 mt-3">
        <div class="section-title">
          <span> Reviews</span>
        </div>
        <h2 style="text-align: center;">What our Clients Say About Us</h2>
        <div class="testimonial-carousel-wrapper">
          <button class="carousel-btn prev-btn" onclick="scrollCarousel(-1)">←</button>
          <div class="testimonial-carousel me-2 ml-2">
            <div class="testimonial-card">
              <p>"Amazing TaopAnd Tour company. Can trust them with their services. Very prompt and professional."</p>
              <div class="testimonial-info">
                <span class="rating">★★★★★</span>
                <span class="name">Shyamlee Khanna</span>
                <span class="trip">Russia Package Tour</span>

              </div>
            </div>

            <div class="testimonial-card">
              <p>"I recently did a trip to Leh Ladakh with TapAndTour team, and boy, was it an experience for a
                lifetime!"</p>
              <div class="testimonial-info">
                <span class="rating">★★★★★</span>
                <span class="name">Shriti Chatterjee</span>
                <span class="trip">Egypt Tour</span>

              </div>
            </div>

            <div class="testimonial-card">
              <p>"Had ATV Quad Biking Adventure in August with very experienced trip lead Namit. Great arrangements!"
              </p>
              <div class="testimonial-info">
                <span class="rating">★★★★★</span>
                <span class="name">Apeksha Godre</span>
                <span class="trip">ATV Quad Biking Adventure Tour</span>

              </div>
            </div>

            <div class="testimonial-card">
              <p>"Our Nepal Tour was beyond amazing. The guides were super friendly and well-organized."</p>
              <div class="testimonial-info">
                <span class="rating">★★★★★</span>
                <span class="name">Rajeev Sharma</span>
                <span class="trip">Nepal Tour</span>

              </div>
            </div>

            <div class="testimonial-card">
              <p>"The best trip experience with amazing facilities and great leadership!"</p>
              <div class="testimonial-info">
                <span class="rating">★★★★★</span>
                <span class="name">Priya Nair</span>
                <span class="trip">Bhutan Trip</span>

              </div>
            </div>

            <div class="testimonial-card">
              <p>"Incredible journey through Maldives Honeymoon with awesome company and well-managed itinerary."</p>
              <div class="testimonial-info">
                <span class="rating">★★★★★</span>
                <span class="name">Vikas Mehta</span>
                <span class="trip">Maldives Honeymoon Package</span>

              </div>
            </div>
          </div>
          <button class="carousel-btn next-btn" onclick="scrollCarousel(1)">→</button>
        </div>
      </div>


      <script>
        const carousel = document.querySelector('.testimonial-carousel');
        const cardWidth = carousel.clientWidth / 3;

        function scrollCarousel(direction) {
          const scrollAmount = direction * cardWidth;
          carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
      </script>
  </section>

  <!---------------------------------------------- Footer----------------------------------------------->
  <?php
  include 'components/footer.php';
  ?>


</body>

</html>