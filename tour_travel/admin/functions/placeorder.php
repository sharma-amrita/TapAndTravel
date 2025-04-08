<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();
echo"working";

include('../config/dbcon.php');
// include('authcode.php');
// require 'userfunction.php';


if(isset($_SESSION['auth']))
{
       $order_id = mysqli_real_escape_string($con, $_POST['order_id']);
       $order_status = mysqli_real_escape_string($con, $_POST['order_status']);
       $payment_id =mysqli_real_escape_string($con,$_POST['payment_id']);
  
       $userId =  $_SESSION['auth_user']['user_id'];
       $query = "SELECT c.id as cid, c.prod_id, c.size, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price
       FROM carts c, products p WHERE  c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC";
       $query_run = mysqli_query($con, $query);
    //    print_r($query_run);

       $cart_total = 0;

       while($citem=$query_run->fetch_assoc())
       {
                $prod_id = $citem['prod_id'];
                $size = $citem['size'];
                $prod_qty = $citem['prod_qty'];         
                $cart_total = $citem['selling_price'] * $citem['prod_qty'];
            
                $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, cart_total,size,payment_id,order_status) VALUES ('$order_id', '$prod_id', '$prod_qty',  '$cart_total', '$size', '$payment_id' ,'$order_status')";
                $insert_items_query_run = mysqli_query($con , $insert_items_query);
            }
             if($insert_items_query_run)
            {

             $deleteCartQuery = "DELETE FROM carts WHERE user_id='$userId'";
             $deleteCartQuery_run = mysqli_query($con , $deleteCartQuery);

            $_SESSION['message'] = "Order Placed Sucessfully";
          
        }

                    //////////////////// MAIL NOTIFICATION ////////////////////////       

     $msg="";
     $userId =  $_SESSION['auth_user']['user_id'];
     $query = "SELECT * FROM registration WHERE Sno='$userId'";
     $query_run = mysqli_query($con, $query);
     $row = mysqli_fetch_assoc($query_run) ;

     $name = $row ['name'];
     $email = $row ['email'];
     $number = $row ['number'];
     $message = "<h4>Dear $name </h4><br>
     <h2> Your Order has confirmed <br>
     Thank you for choosing us </h2>";

    //  echo $email;

  include('smtp/PHPMailerAutoload.php');
  $mail=new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host="smtp.gmail.com";
  $mail->Port=587;
  $mail->SMTPSecure="tsl";
  $mail->SMTPAuth=true;
  $mail->Username="psstechno80@gmail.com";
  $mail->Password="tpsd zseo wgsi vvpg";
  $mail->SetFrom("psstechno80@gmail.com");
  $mail->addAddress($email);
  $mail->IsHTML(true);
  $mail->Subject="Clara Couture";
  $mail->Body= "$message";
  $mail->SMTPOptions=array('ssl'=>array(
      'verify_peer'=>false,
      'verify_peer_name'=>false,
      'allow_self_signed'=>false
  ));
  if($mail->send()){
    //   echo  $email;
  }else{
     echo "Error occur"; 
  }
//   echo "not working";
//   header('Location: /clara ecommerce website/.php' );
//   die();


                        ////////////// SMS NOTIFICATION /////////////////////



// $userId =  $_SESSION['auth_user']['user_id'];
// $query = "SELECT * FROM registration WHERE Sno='$userId'";
// $query_run = mysqli_query($con, $query);
// $row = mysqli_fetch_assoc($query_run) ;
// $number = $row ['number'];
// $message = "Dear $name 
// Your Order has confirmed 
// Thank you for choosing us ";

// $fields = array(
//   "message" => $message,
//   "language" => "english",
//   "route" => "q",
//   "numbers" => $number,
// );

// $curl = curl_init();

// curl_setopt_array($curl, array(
// CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
// CURLOPT_RETURNTRANSFER => true,
// CURLOPT_ENCODING => "",
// CURLOPT_MAXREDIRS => 10,
// CURLOPT_TIMEOUT => 30,
// CURLOPT_SSL_VERIFYHOST => 0,
// CURLOPT_SSL_VERIFYPEER => 0,
// CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// CURLOPT_CUSTOMREQUEST => "POST",
// CURLOPT_POSTFIELDS => json_encode($fields),
// CURLOPT_HTTPHEADER => array(
//   "authorization: YvwrHIV5obl4aNPmKi62kZqsuLfcMzXj8GDx9WQ13UnE0ChRBTht6sRoSXVlivc4dbyarPYZWETgu9Kx",
//   "accept: */*",
//   "cache-control: no-cache",
//   "content-type: application/json"
// ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
// echo "cURL Error #:" . $err;
// } else {
// echo $response;
// }
    
// } 
// else{
//     header('Location:../index.php');}
}



 

	
