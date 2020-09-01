<?php
session_start();
session_destroy();
if (isset($_SESSION['user_username_login'])){
    //echo $_SESSION['user_username_login'];
    header('location:login.php');
    exit();
}
