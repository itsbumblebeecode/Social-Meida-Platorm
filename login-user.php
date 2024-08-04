<?php
session_start();
include "links.php";
include "config.php";

$login_errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = $_POST['password'];

    if (empty($username)) {
        $login_errors[] = "Please Enter Your Username";
    }
    if (empty($password)) {
        $login_errors[] = "Please Enter Your Password";
    }

    if (empty($login_errors)) {
        $check_data = "SELECT username, password FROM users WHERE username = '{$username}'";
        $result = mysqli_query($mysqli, $check_data);

        if (!$result) {
            die("Query failed: " . mysqli_error($mysqli));
        }

        if (mysqli_num_rows($result) == 0) {
            $login_errors[] = "User doesn't exist.";
        } else {
            $user = mysqli_fetch_assoc($result);
            echo "Debug: Retrieved hashed password: " . $user['password'] . "<br>"; 

        
            echo "Debug: Entered Password: '" . $password . "'<br>";

            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                echo "Debug: Login Successful. Redirecting...<br>";
                header("Location: http://localhost/technoweb/index.php");
                exit();
            } else {
                $login_errors[] = "Incorrect password.";
                echo "Debug: Password verification failed.<br>";
            }
        }
    }
}
?>

<section class="login-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 form-box p-5">
            <?php if(!empty($login_errors)): ?>
                    <div class="alert alert-danger">
                        <?php foreach($login_errors as $error): ?>
                            <p><?php echo $error; ?></p> 
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <h2 class="text-center mb-3">Login Now</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <label for="username">Enter Username</label>
                    <input type="text" name="username" class="form-control">
                    <label for="password" class="mt-3">Enter Password</label>
                    <input type="password" name="password" class="form-control">
                    <button class="btn btn-outline-primary mt-3" type="submit">Submit</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>
                            