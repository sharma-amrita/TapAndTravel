
<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Packages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<?php
include 'components/header.php';
?>

<div class="container mt-5">
    <h1 class="mb-4 mt-4 text-center" style="color:#FF4500; ">Exciting Tour Packages</h1>
<p style="text-align: center;">Discover a world of unforgettable adventures with our exclusive tour packages, designed to turn your travel dreams into reality. From breathtaking escapes to thrilling explorations, every journey promises magic, comfort, and excitement!</p>
   
        

    <!-- 🔽 Packages Display Section -->
    <div id="packagesContainer" class="row py-3">
    <?php
    $sql = "SELECT * FROM add_country";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4 mb-4">
              
                <a href="fetch_packages.php?id=<?= $row['id'] ?>" class="card-link">
                    <div class="card package-card">
                        <img src="./Uploads/<?=$row['image']; ?>" class="card-img-top" alt="Package Image">
                        <div class="card-body">
                            <p class="card-title"><strong style="color:#FF4500;"><?= $row['location'] ?></strong> </p>
                            <h5 class="card-title"><strong style="color:black;"><?= $row['name'] ?></strong></h5>
                          
                            <!-- <p><strong>Duration:</strong> <?= $row['duration'] ?></p> -->
                            <!-- <p><strong>Starting Price:</strong> Rs.<?= number_format($row['price']) ?></p> -->
                            
                            <!-- <a href="fetch_packages.php?id=<?= $row['id'] ?>" class="btn btn-info">View Details</a> -->
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
</div>



<?php

include 'components/footer.php';
?>


<div id="packagesContainer"></div>



</body>
</html>
