<?php
session_start();
include "config.php";
include "links.php";

$error_messages = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($mysqli, $_POST['confirm_password']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $role = mysqli_real_escape_string($mysqli, $_POST['role']);

    if (empty($fname)) {
        $error_messages[] = "First name is required.";
    }
    if (empty($password)) {
        $error_messages[] = "Password is required.";
    }
    if (empty($username)) {
        $error_messages[] = "Username is required.";
    }
    if ($password !== $confirm_password) {
        $error_messages[] = "Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    }
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        echo "Debug: Hashed Password during registration: " . $hashed_password . "<br>";


    if (empty($error_messages)) {
        $check_user = "SELECT username FROM users WHERE username = '{$username}'";
        $result = mysqli_query($mysqli, $check_user);

        if (!$result) {
            die("Query Failed: " . mysqli_error($mysqli));
        }

        if (mysqli_num_rows($result) > 0) {
            $error_messages[] = "Username already exists.";
        } else {
            $add_user = "INSERT INTO users (first_name, last_name, email, password, username, role)
                         VALUES ('{$fname}', '{$lname}', '{$email}', '{$hashed_password}', '{$username}', '{$role}')";

            if (mysqli_query($mysqli, $add_user)) {
                header("Location: login-user.php");
                exit();
            } else {
                $error_messages[] = "Query failed: " . mysqli_error($mysqli);
            }
        }
    }
}
?>

<section id="main-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 form-box p-4">
                <?php if (!empty($error_messages)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($error_messages as $errors): ?>
                            <?php echo $errors; ?><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <h2>Registration Form</h2>
                <p>Please fill all the boxes because they are required.</p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="pt-3">
                    <div class="d-flex">
                        <input type="text" name="fname" class="form-control" placeholder="First Name">
                        <input type="text" name="lname" class="form-control mx-3" placeholder="Last Name">
                    </div>
                    <div class="d-flex mt-3">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <input type="password" name="confirm_password" class="form-control mx-3" placeholder="Confirm Password">
                    </div>
                    <input style="width: 96%;" type="email" name="email" class="form-control mt-3" placeholder="Enter Email">
                    <input style="width: 96%;" type="text" name="username" class="form-control mt-3" placeholder="Enter Username">
                    <select name="role" class="form-control mt-3" style="width: 96%;">
                        <option value="0">Subscriber</option>
                        <option value="1">Guest</option>
                    </select>
                    <button type="submit" name="submit" class="btn btn-outline-primary mt-4">Add User</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
