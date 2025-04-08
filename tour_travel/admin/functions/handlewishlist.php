<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

session_start();
include('../config/dbcon.php');
include('authcode.php');


if(isset($_SESSION['auth']))
{
    if(isset($_POST['scope']))
    {
       $scope = $_POST['scope'];
       switch ($scope)
       {
          case "add":
            $prod_id = $_POST['prod_id'];
          //  $size = $_POST['size'];

            $user_id = $_SESSION['auth_user']['user_id'];

            $chk_existing_cart = "SELECT * FROM wishlist WHERE prod_id='$prod_id' AND user_id='$user_id' ";
            $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart); 
             
            if(mysqli_num_rows($chk_existing_cart_run) > 0)
            {
              echo "existing";
            }
            else
            {
               $insert_query = "INSERT INTO wishlist (user_id, prod_id) VALUES ('$user_id' , '$prod_id' )";
                $insert_query_run = mysqli_query($con , $insert_query);
           
              if($insert_query_run) 
              {
                $_SESSION['message'] = "Added To Wishlist";
                header('Location: ');
              }
             else
              {
                // echo 500;
              }
            }
            break;

              case "delete":
                
                $cart_id = $_POST['cart_id'];

                $user_id = $_SESSION['auth_user']['user_id'];

              //   $chk_existing_cart = "SELECT * FROM carts WHERE id='$cart_id' AND user_id='$user_id' ";
              //   $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart); 
            
              //   if(mysqli_num_rows($chk_existing_cart_run) > 0)
              // {
                $delete_query = "DELETE FROM wishlist WHERE id='$cart_id' OR prod_id='$cart_id'";
                $delete_query_run = mysqli_query($con , $delete_query);
                if($delete_query_run)
                {
                  $_SESSION['message'] = "Removed From Wishlist";
                  header('Location: ');
                }else{
                  echo "Something Went Wrong";
                }
              // }
              // else
              // {
              //   echo"Something Went Wrong";
              // }
                break;

                default:
              echo 500;
        }
    } 
}
else
{
    echo  401;
}
?>