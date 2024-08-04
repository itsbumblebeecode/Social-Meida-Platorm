<?php
session_start();
include "auth_check.php";
include "header.php";
include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $role = mysqli_real_escape_string($mysqli, $_POST['role']);
}


?>

<section id="detail-form">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Please provide the details as asked and remember your details will not be shared.</h1>
            </div>
            <div class="col-md-6">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="d-flex">
                            <input type="text" name="fname" class="form-control" placeholder="First Name">
                            <input type="text" name="lname" class="form-control mx-2" placeholder="Last Name">
                        </div>
                        <input type="email" name="email" class="form-control mt-3" placeholder="Enter Email" style="width: 98%;">
                        <input type="text" name="username" class="form-control mt-3" placeholder=" Enter Username" style="width: 98%;">
                        <select name="role" class="form-control mt-3" style="width: 98%;">
                            <option value="0">Subscriber</option>
                            <option value="1">As a Guest</option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-outline-success mt-3">Modify</button>
                </form>
            </div>
        </div>
    </div>
</section>