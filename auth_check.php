<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("location: http://localhost/technoweb/login-user.php");
    exit();
}
?>