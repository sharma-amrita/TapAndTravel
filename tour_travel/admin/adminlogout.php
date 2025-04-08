<?php
session_start();

if(isset($_SESSION['auth']))
{
    unset($_SESSION['auth']);
   
    
}

header('Location: login.php');
// $_SESSION['message'] = "Logged out Successfully";

?>