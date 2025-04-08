
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
    <!-- Bootstrap 5 JS (Required for toggling navbar in mobile) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap JS (Required for Navbar & Dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<?php
include 'components/header.php';
?>
 <div id="packagesContainer" class="row px-5">
        <?php
        $sql = "SELECT * FROM add_city";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card package-card">
                        <img src="./Uploads/<?=$row['image1']; ?>" class="card-img-top" alt="Package Image">
                        <div class="card-body">
                        <!-- <p><strong style="color:#FF4500;text-align:center;"><?= $row['location'] ?></strong> </p> -->
                            <h5 class="card-title text-center" style="color:#FF4500;"><strong ><?= $row['city_name'] ?></strong></h5>
                       
                            <!-- <p><strong>Duration:</strong> <?= $row['duration'] ?></p> -->
                            <p><strong >Starting Price:</strong> Rs.<?= number_format($row['price']) ?></p>
                            <!-- <a href="package_details.php?id=<?= $row['id'] ?>" class="btn btn-info">View Details</a> -->
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No packages available.</p>";
        }
        ?>
    </div>
    <?php
include 'components/footer.php';
?>