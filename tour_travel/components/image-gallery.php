<?php
include('./admin/functions/userfunction.php');

if (isset($_GET['id'])) {
    $category_slug = $_GET['id'];
    $data = getslugActive("add_country", $category_slug);

    if (!$data) {
        die('Query failed: ' . mysqli_error($con));
    }

    $id = mysqli_fetch_array($data);

    if ($id) {
        $cid = $id['id'];
        $heading = $id['heading'];
        $name = $id['name'];
        $price = $id['price'];
        $location = $id['location'];
        $meta_description = $id['meta_description'];
        $image = $id['image'];

        $products = getProdByCategory($cid);

        // include 'components/header.php';
        include 'components/animations.php';
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $heading ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: rgb(251, 252, 248);
            font-family: 'Poppins', sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 15px auto;
            padding: 0 20px;
        }
        .content-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }
        .text-content {
            width: 100%;
            max-width: 58%;
        }
        .text-content h3 {
            color: #FF4500;
            font-weight: bold;
            font-size: 36px;
        }
        .text-content p {
            font-size: 18px;
            text-align: justify;
            margin: 10px 0;
        }
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 15px;
            flex: 1;
        }
        .gallery-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            transition: 0.3s ease;
            cursor: pointer;
        }
        .gallery-img:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.9);
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            max-width: 50%;
            height: 70%;
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
        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 40px;
            color: white;
            cursor: pointer;
            user-select: none;
        }
        .prev { left: 20px; }
        .next { right: 20px; }

        .gallery-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            padding: 20px 0;
        }
        .gallery-card {
            width: 200px;
            height: 200px;
            overflow: hidden;
            border-radius: 10px;
        }

        /* Responsive tweaks */
        @media(max-width: 768px) {
            .text-content {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Main Content Section -->
<!-- <div class="container">
    <div class="content-section">
        <div class="text-content">
            <h3><?= $heading ?></h3>
            <p><strong>Location:</strong> <?= $location ?></p>
            <p><strong>Starting Price:</strong> Rs.<?= number_format($price) ?> per person</p>
            <p><?= $meta_description ?></p>
        </div>
        <div class="image-gallery" data-aos="fade-left">
            <img src="./Uploads/<?= $image ?>" class="gallery-img" alt="Main Image">
            <?php
            if (mysqli_num_rows($products) > 0) {
                foreach ($products as $city) {
                    echo '<img src="../Uploads/' . $city['image1'] . '" class="gallery-img" alt="City Image">';
                }
            }
            ?>
        </div>
    </div>
</div> -->

<!-- Modal -->
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImage">
    <span class="prev" onclick="changeImage(-1)">&#10094;</span>
    <span class="next" onclick="changeImage(1)">&#10095;</span>
</div>

<!-- Packages -->
<h2 style="text-align:center; margin-top: 30px;">Explore Our Packages</h2>
<p style="text-align:center;">Your journey begins here. Explore our packages and find the perfect adventure.</p>
<div class="container row">
    <?php
    if (mysqli_num_rows($products) > 0) {
        foreach ($products as $item) {
            ?>
            <div class="col-md-4 mb-4">
                <a href="fetch_city_package.php?city_id=<?= $item['city_id'] ?>" style="text-decoration: none;">
                    <div class="card">
                        <img src="./Uploads/<?= $item['image1']; ?>" class="card-img-top gallery-img" alt="Package Image">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="color:#FF4500;"><strong><?= $item['city_name'] ?></strong></h5>
                            <p style="color:black;"><strong>Starting Price:</strong> Rs.<?= number_format($item['price']) ?> Per Person</p>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
    } else {
        echo "<p>No packages available.</p>";
    }
    ?>
</div>

<!-- Additional Gallery Section -->
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
                    echo '<img src="../Uploads/' . $image[$imageField] . '" class="gallery-img" alt="Gallery Image">';
                    echo '</div>';
                }
            }
        }
    }
    ?>
</div>

<!-- Modal Script -->
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
        echo "Something went wrong.";
    }
} else {
    echo "Something went wrong.";
}
?>
