<?php

// session_start();
 include('../admin/config/dbcon.php');
 function getAll($table)
 {
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con , $query);

 }
 function getByID($table , $city_id)
 {
    global $con;
    $query = "SELECT * FROM $table WHERE city_id='$city_id' ";
    return $query_run = mysqli_query($con , $query);

 }
 function getByCountryID($table , $id)
 {
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con , $query);

 }
 function redirect($url , $message)
 {
    $_SESSION['message'] = $message;
    header('Location:' .$url);
    exit();
 }

?>