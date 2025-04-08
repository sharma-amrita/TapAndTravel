
<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$database = "tour_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT  city_id AS id, city_name AS name, image1 AS image FROM add_city UNION ALL SELECT id, name, image FROM add_country ORDER BY id";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>


