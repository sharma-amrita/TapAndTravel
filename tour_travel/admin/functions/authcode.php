<?php

if(isset($_POST ['login']))
  {  
    $email = mysqli_real_escape_string($con , $_POST['email']);
    $password = mysqli_real_escape_string($con , $_POST['password']);

    $login_query = " SELECT * FROM admin WHERE email = '$email' AND password = '$password' ";
    $login_query_run = mysqli_query($con , $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {  
      $_SESSION['auth'] = true;

     $userdata = mysqli_fetch_array($login_query_run);
    //  $userid = $userdata['user_id'];
     $useremail = $userdata['email'];
     $userpassword = $userdata['password'];
    
     $_SESSION['auth_user'] = [
        // 'user_id' => $userid,
        'email' => $useremail,
        'password' => $userpassword
      ];
     { 
      $_SESSION['message'] = "Logged In Successfully"; 
      header('Location: index.php');
     }   
    }
    else
    {
     $_SESSION['message'] = "Invalid Credentials"; 
     header('Location: login.php');
     }
   } 
?>