<?php
session_start();
include('./admin/config/dbcon.php');
include('authcode.php');

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ";
    return $query_run = mysqli_query($con , $query);
}
function getAllTrending()
{
    global $con;
    $query = "SELECT * FROM	products WHERE trending='1' ";
    return $query_run = mysqli_query($con , $query);
}
function getAllNewArrival()
{
    global $con;
    $query = "SELECT * FROM	products WHERE new_arrival='1' ";
    return $query_run = mysqli_query($con , $query);
}
function getslugActive($table , $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    return $query_run = mysqli_query($con , $query);

}
function getCityActive($table , $city_id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE city_id='$city_id' ";
    return $query_run = mysqli_query($con , $query);

}
function getProdByCategory($id)
{
    global $con;
    $query = "SELECT * FROM add_city WHERE id='$id' ";
    return $query_run = mysqli_query($con , $query);
}
function getProductByCity($city_id)
{
    global $con;
    $query = "SELECT * FROM add_city WHERE city_id='$city_id' ";
    return $query_run = mysqli_query($con , $query);
}
function getProdByproduct($country_id)
{
    global $con;
    $query = "SELECT * FROM add_city WHERE id='$country_id'";
    return $query_run = mysqli_query($con , $query);
}
function getIDActive($table , $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND STATUS'0'";
    return $query_run = mysqli_query($con , $query);

}
function getCartItems()
{
    global $con;
    $userId =  $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.size, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price, p.slug
    FROM carts c, products p WHERE  c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}
function getwishItems()
{
    global $con;
    $userId =  $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, p.id as pid, p.name, p.image, p.selling_price, p.slug
    FROM wishlist c, products p WHERE  c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}
function getSavedAddresses()
{
    global $con;
    $userId =  $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, p.id as pid, p.name, p.image, p.selling_price
     FROM wishlist c, products p WHERE  c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}
function redirect($url , $message) 
{
    $_SESSION['message'] = $message;
    header('Location:' .$url);
    exit(0);
}
?>