<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> TapAndTours</title>

  <link rel="stylesheet" href="styles.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


  <style>
    .container-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
      margin: 5% 0 5% 0;
    }


    .contactin {
      display: flex;
      height: 80%;
      width: 80%;
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      justify-content: space-between;
      margin: 5px 10px;
      flex-wrap: wrap;
    }


    .contactmap {
      flex: 1;
      height: 400px;
      width: 100%;
    }

    .contactmap iframe {
      width: 100%;
      height: 100%;
    }

    .contactform {
      flex: 1;
      margin: 2% 0 5% 0;
      margin-left: 5%;
    }

    .contactform h1 {
      color: #EB4837;
      ;
      text-align: center;
    }

    .contactform input,
    .contactform textarea {
      width: 80%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }


    /*Contact Responsive Design */
    @media (max-width: 429px) {
      #main h1 {
        font-size: 2rem;
      }

      #main p {
        font-size: 1rem;
      }

      .contactin {
        flex-direction: column;
        width: 80% !important;
        align-items: center;
      }

      .contactmap {
        width: 100%;
        margin-bottom: 20px;
      }

      .contactform h1 {
        margin-top: 2%;
        margin-right: 31%;
        margin-bottom: 2%;
        margin-left: 5%;


      }

      .contactbtn {
        width: 55%;
        margin-bottom: 2%;
        margin-left: 25%;

      }
    }
  </style>
</head>

<body>
  <!-- header  -->
  <?php
  include 'components/header.php';
  ?>

  <div class="cards-container">
    <div class="contact-card" data-aos="flip-left">
      <i class="fas fa-home"></i>
      <h3>Address</h3>
      <p>Sector 62, Near Metro Station</p>
    </div>
    <div class="contact-card" data-aos="flip-left">
      <i class="fas fa-phone-alt"></i>
      <h3>Phone Number</h3>
      <p>+123 456 7890</p>
    </div>
    <a href="https://mail.google.com/mail/u/0/#inbox">
    <div class="contact-card" data-aos="flip-up">
      <i class="fas fa-envelope"></i>
      <h3>Email</h3>
      <p>tour@trip.com</p>
    </div></a>
    <div class="contact-card" data-aos="flip-left">
      <i class="fas fa-clock"></i>
      <h3>Working Hours</h3>
      <p>Mon-Fri: 10 AM - 8 PM</p>
    </div>
  </div>
  <!-------------------------------------Social Media-icons-------------------------------------------->
  <div class="container pb-0">

    <section class="mb-4 d-flex justify-content-center">
      <!-- Facebook -->
      <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!"
        role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Twitter -->
      <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!"
        role="button"><i class="fab fa-twitter"></i></a>

      <!-- Google -->
      <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!"
        role="button"><i class="fab fa-google"></i></a>

      <!-- Instagram -->
      <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!"
        role="button"><i class="fab fa-instagram"></i></a>

      <!-- Linkedin -->
      <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!"
        role="button"><i class="fab fa-linkedin-in"></i></a>
      <!-- Github -->
      <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!"
        role="button"><i class="fab fa-github"></i></a>
    </section>

  </div>

  <div class="container-wrapper">
    <div class="contactin">
      <div class="contactmap">


        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.990381136194!2d77.37635177416851!3d28.630050384195837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ceff8864e0cf1%3A0xa20290bf75099ebd!2sBSI%20Business%20Park%20H15!5e0!3m2!1sen!2sin!4v1743580013737!5m2!1sen!2sin"
          width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>

      <div class="contactform">
        <h1>Contact Us</h1>
        <form id="contactForm" method="POST">
          <input type="text" name="name" placeholder="Enter The Name" class="contactform-txt" required>
          <input type="email" name="email" placeholder="Enter The Email" class="contactform-txt" required>
          <input type="tel" name="number" placeholder="Enter The Number" class="contactform-txt" pattern="\d{10}"
            maxlength="10" required title="Please enter a valid 10-digit contact number"
            oninput="this.value= this.value.replace(/[^0-9]/g, '');">
          <textarea name="message" placeholder="Message" class="contactform-txt-area" required></textarea>
          <div class="contactbtn">
            <button type="submit" class="btn" style="background-color: #EB4837; color: white;">Submit</button>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>

  <script>
    document.getElementById("contactForm").addEventListener("submit", function (event) {
      event.preventDefault();
      let formData = new FormData(this);

      fetch("process_form.php", {
        method: "POST",
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          Swal.fire({
            icon: data.success ? 'success' : 'error',
            title: data.success ? 'Success!' : 'Error!',
            text: data.message,
          });
          if (data.success) {
            document.getElementById("contactForm").reset();
          }
        })
        .catch(error => {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Something went wrong. Please try again.',
          });
        });
    });
  </script>
  <!----------------------------------------------FOOTER--SECTIONS---------------------------------->
  <?php
  include 'components/footer.php';
  ?>
</body>

</html>