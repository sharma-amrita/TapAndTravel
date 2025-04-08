<?php

if(!isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Login To Continue";
    header('Location:login.php');
}
?>