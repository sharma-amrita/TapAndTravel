<?php


include('config/dbcon.php');

if (isset($_POST['update']))
   {   
    $order_status = mysqli_real_escape_string($con, $_POST['order_status']);
    $id = mysqli_real_escape_string($con, $_POST['id']);

     $update_query = "UPDATE order_items SET order_status='$order_status' where id='$id' ";

     $update_query_run = mysqli_query($con , $update_query);

     if($update_query_run)
     {
        $_SESSION['message'] = "Update Sucessfully";
        header('Location: edit-order-staus.php?id=$id' );
      //   redirect("edit-product.php?id=$product_id" , "Something Went Wrong");
        die();
     }else{
        echo"something wrong";
     }
   }

?>