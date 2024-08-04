<?php
session_start();
include "config.php";
include "links.php"; ?>

<div class="navbar navbar-expand-lg bg-light pt-3 pb-3">
    <div class="container inner-header">
        <div class="row">
        <div class="col-sm-2">
        <img src="images/site-logo.png" alt="site-logo" class="img-fluid" style="width: 50%;">
        </div>
        <div class="col-sm-4">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="blogs.php">Blogs</a></li>
            <li class="nav-item"><a class="nav-link" href="about-us.php">About</a></li>
            </ul>
        </div>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <button class="btn btn-success"><a href="admin-panel.php" style="text-decoration: none; color: #fff">Admin Panel</a></button>
            <button class="btn btn-warning"><a href="login-user.php" style="text-decoration: none; color: #000;">Logout</a></button>         
        </div>
        </div>
    </div>
</div>