<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>

<?php
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "phpecom";

//   creating database connection
  $con = mysqli_connect($host , $username , $password , $database );

//   check database connection
if(!$con)
{
    die("connection failed:" . mysqli_connect_error());
}


?>

<?php
// echo "working";
// session_start();

// include('./admin/config/dbcon.php');
// include('authcode.php');
// require 'userfunction.php';


if(isset($_SESSION['auth']))
{
  if (isset($_POST['add-address']))
  {   
   $name = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $number = mysqli_real_escape_string($con, $_POST['number']);
   $place = mysqli_real_escape_string($con, $_POST['place']);
   $area = mysqli_real_escape_string($con, $_POST['area']);
   $landmark = mysqli_real_escape_string($con, $_POST['landmark']);
   $pincode = mysqli_real_escape_string($con, $_POST['pincode']);    
   $city = mysqli_real_escape_string($con, $_POST['city']);
   $state = mysqli_real_escape_string($con, $_POST['state']);
   $userId =  $_SESSION['auth_user']['user_id'];
  
   if($name == "" || $email == "" || $number == "" || $place == "" || $area == "" || $landmark == "" || $pincode == "" || $city == "" || $state == "" )
         {
           $_SESSION['message'] = "All fields are mandatory";
           header('Location: ../ checkout.php');
           exit(0);
         }
  
          $tracking_no = "user".rand(1111,9999).substr($number,2);
          $insert_query = "INSERT INTO address (tracking_no, user_id, name, email, number, place, area, landmark, pincode, city, state, cart_total, payment_mode) VALUES ('$tracking_no' ,'$userId', '$name', '$email', '$number', '$place', '$area', '$landmark', '$pincode', '$city', '$state' , '$cart_total' ,'$payment_mode')";
          $insert_query_run = mysqli_query($con, $insert_query);
          
          if($insert_query_run)
           {
            $_SESSION['message'] = "Address Added Sucessfully";
             header('Location: /clara ecommerce website/checkout.php' );
              die();
    }else{
       echo"something went wrong";
    }
  }
     else if (isset($_POST['edit-address']))
   {   
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $place = mysqli_real_escape_string($con, $_POST['place']);
    $area = mysqli_real_escape_string($con, $_POST['area']);
    $landmark = mysqli_real_escape_string($con, $_POST['landmark']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);    
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $userId =  $_SESSION['auth_user']['user_id'];
   
      $update_query = "UPDATE address SET name='$name' , email='$email' , number='$number' , place='$place' ,
      area='$area' , landmark='$landmark' , pincode='$pincode' ,
      city='$city' , state='$state'  WHERE id='$id' AND user_id='$userId'";

     $update_query_run = mysqli_query($con , $update_query);

     if($update_query_run)
     {
        $_SESSION['message'] = "Address Edited Sucessfully";
         header('Location: /clara ecommerce website/profile.php' );
         die();
     }else{
        echo"something went wrong";
     }
}

}
?>