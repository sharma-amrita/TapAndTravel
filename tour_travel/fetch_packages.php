<?php
include('./admin/functions/userfunction.php');

if (isset($_GET['id'])) {
    $category_slug = $_GET['id'];
    $data = getslugActive("add_country", $category_slug);

    if (!$data) {
        die('Query failed: ' . mysqli_error($con));  // Error handling
    }

    $id = mysqli_fetch_array($data);

    if ($id) {
        $cid = $id['id']; // Country ID
        $heading = $id['heading'];
        $name = $id['name'];
        $price = $id['price'];
        $location = $id['location'];
        $meta_description = $id['meta_description'];
        $image = $id['image'];

        // Fetch related cities
        $products = getProdByCategory($cid);
        // $cityy = getProductByCity( $city_id);

        ?>

        <?php
        include 'components/header.php';
        include 'components/animations.php';
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $heading ?></title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="styles.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
                rel="stylesheet">

            <style>
                body {
                    background-color: rgb(251, 252, 248);
                    font-family: 'Poppins', sans-serif;

                }

                .container {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 20px;
                }

                .content-section {
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    gap: 20px;

                }

                .row {
                    padding: 0 40px 0 40px;
                }

                .text-content {
                    width: 60%;

                    font-size: 40px;
                }

                .text-content h3 {
                    color: #FF4500;
                    font-weight: bold;
                }

                .text-content p {
                    font-size: 18px;
                    text-align: justify;
                    margin: 10px 0;
                }


                /* edited----------------------- */

                .image-gallery {
                    width: 39%;
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 15px;
                }

                .image-gallery img {
                    width: 100%;
                    height: 250px;
                    border-radius: 10px;
                    object-fit: cover;
                    transition: transform 0.3s ease-in, box-shadow 0.3s ease-in;
                }

                .image-gallery img:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                    transition: 0.3s ease;
                }

                .modal {
                    display: none;
                    position: fixed;
                    z-index: 1000;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.9);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .modal-content {
                    max-width: 50%;
                    max-height: 80%;
                    border-radius: 10px;
                }

                .close {
                    position: absolute;
                    top: 20px;
                    right: 30px;
                    color: white;
                    font-size: 40px;
                    font-weight: bold;
                    cursor: pointer;
                }

                .prev,
                .next {
                    position: absolute;
                    top: 50%;
                    color: white;
                    font-size: 40px;
                    cursor: pointer;
                    transform: translateY(-50%);
                }

                .prev {
                    left: 10px;
                }

                .next {
                    right: 10px;
                }

                /* ----------------------------------------------------- */

                /* Responsive Styles */
                @media (max-width: 1024px) {
                    .content-section {
                        flex-direction: column;
                        gap: 30px;
                    }

                    .text-content {
                        font-size: 30px;
                        width: 100%;

                    }

                    .image-gallery {
                        grid-template-columns: repeat(2, 1fr);
                        width: 100%;

                    }

                    .gallery-card {
                        width: 45%;
                        height: 200px;

                    }
                }


                @media (max-width: 768px) {
                    .content-section {
                        flex-direction: column;
                        gap: 20px;
                    }

                    .text-content {
                        font-size: 24px;
                        width: 100%;
                    }

                    .image-gallery {
                        grid-template-columns: 1fr;
                        gap: 10px;
                        width: 100%;

                    }

                    .gallery-card {
                        width: 100%;
                        height: 200px;

                    }
                }


                @media (max-width: 480px) {
                    .text-content {
                        font-size: 20px;
                    }

                    .image-gallery {
                        grid-template-columns: 1fr;
                        gap: 12px;
                        width: 100%;

                    }

                    .gallery-card {
                        width: 100%;
                        height: auto;
                    }

                }

                .gallery-row {
                    display: flex;
                    justify-content: center;
                    flex-wrap: wrap;
                    gap: 10px;
                    padding: 0 0 0 0px !important;
                }

                /* Gallery card */

                .gallery-card {
                    width: 200px;
                    height: 200px;
                    margin: 10px;
                    border-radius: 10px;
                    overflow: hidden;
                    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                }

                .gallery-card img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .gallery-card:hover {
                    transform: scale(1.1) translateY(-10px);
                    border-bottom: 3px solid red;
                    /* box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); */
                }

                .package-card:hover {
                    text-decoration: none !important;

                }

                .card-body:hover {
                    text-decoration: none !important;

                }

                a:hover {
                    color: #0056b3;
                    text-decoration: none;
                }

                .no-hover-underline {
                    text-decoration: none !important;
                }

                /* .no-hover-underline:hover {
                            text-decoration: none !important;
                        }

                        a:hover {
                            text-decoration: none !important;
                        } */
            </style>
        </head>

        <body>

            <!-- Country Details Section -->
            <div class="container">
                <div class="content-section">

                    <!-- Text Content -->
                    <div class="text-content">
                        <h3 strong style="color:#FF4500;"><?= $heading ?></h3>
                        <p><strong>Location:</strong> <?= $location ?></p>
                        <p><strong>Starting Price:</strong> Rs.<?= number_format($price) ?> per person</p>
                        <p><?= $meta_description ?></p>
                    </div>

                    <div class="image-gallery" data-aos="fade-left">

                        <img src="./Uploads/<?= $image ?>" alt="Country Image" class="gallery-img" onclick="openModal(0)">

                        <?php
                        if (mysqli_num_rows($products) > 0) {
                            $index = 1;
                            foreach ($products as $city) {
                                ?>

                                <img src="./Uploads/<?= $city['image1']; ?>" alt="City Image" class="gallery-img"
                                    onclick="openModal(<?= $index ?>)">
                                <?php
                                $index++;
                            }
                        }
                        ?>
                    </div>

                    <div id="imageModal" class="modal">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <img class="modal-content" id="modalImage">
                        <a class="prev" onclick="changeImage(-1)">&#10094;</a>
                        <a class="next" onclick="changeImage(1)">&#10095;</a>
                    </div>

                </div>
            </div>

            <!-- Keep Your City Cards Below -->
            <h2 Style="text-align: center;margin-top:20px;">Explore Our Packages</h2>
            <p Style="text-align: center; padding:0 10px 0 10px;">Your journey begins here, with options galore,
                Explore our packages and find so much more.</p>
            <div id="packagesContainer" class="row  ">

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
                                            <strong><?= $item['city_name'] ?></strong>
                                        </h5>
                                        <p style="color:black;"><strong>Starting Price:</strong> Rs.<?= number_format($item['price']) ?>
                                            Per Person</p>
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

            <?php
            include 'components/grid.php';
            ?>


            <!-- Additional Image Gallery for Matching Country ID -->
            <h2 style="text-align:center; margin-top:40px;">Image Gallery</h2>
<p style="text-align:center;">Each photo is a moment frozen in time.</p>
<div class="gallery-row">
    <?php
    $query = "SELECT * FROM add_city WHERE id = '$cid'";
    $galleryImages = mysqli_query($con, $query);
    if (mysqli_num_rows($galleryImages) > 0) {
        while ($image = mysqli_fetch_assoc($galleryImages)) {
            for ($i = 1; $i <= 5; $i++) {
                $imageField = 'image' . $i;
                if (!empty($image[$imageField])) {
                    echo '<div class="gallery-card">';
                    echo '<img src="./Uploads/' . $image[$imageField] . '" class="gallery-img" alt="Gallery Image">';
                    echo '</div>';
                }
            }
        }
    }
    ?>
</div>



            <?php
            include 'components/footer.php';
            ?>

<script>
    let currentIndex = 0;
    let images = [];

    function updateImageList() {
        images = document.querySelectorAll('.gallery-img');
    }

    function openModal(index) {
        updateImageList();
        currentIndex = index;
        document.getElementById("modalImage").src = images[currentIndex].src;
        document.getElementById("imageModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("imageModal").style.display = "none";
    }

    function changeImage(step) {
        updateImageList();
        currentIndex += step;
        if (currentIndex < 0) currentIndex = images.length - 1;
        if (currentIndex >= images.length) currentIndex = 0;
        document.getElementById("modalImage").src = images[currentIndex].src;
    }

    window.onload = function () {
        updateImageList();
        images.forEach((img, index) => {
            img.onclick = () => openModal(index);
        });
    };
</script>
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