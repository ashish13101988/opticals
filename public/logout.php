<?php


$_SESSION['id']=null;
$_SESSION['email']=null;
session_start();
session_destroy();



header('location:user-login.php');
