<?php
session_start();
include "auth_check.php";
include "config.php";
include "links.php";
include "header.php";


$fetch_user = "SELECT id, username, email, first_name, last_name, role FROM users ORDER BY id DESC";
$result = mysqli_query($mysqli, $fetch_user) or die("Unable to fetch users");

?>


<section id="admin-panel">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar pt-4">
            <h3 class="mb-3" id="admin_heading">Admin Panel</h3>
                <div class="button-box">
                <button class="btn btn-primary"><a href="index.php"><i class="bi bi-arrow-left-short">Back</i></a></button>
                    <button class="btn btn-danger"><a href="#">logout</a></button>
                    </div>
                 
            </div>
            <div class="col-md-10">
                <h2><?php echo "Welcome" .  $row['first_name']; ?></h2>
                <table class="table table-light table-striped" id="user_table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th socpe="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(mysqli_num_rows($result) > 0) {
                    while($row = $result->fetch_assoc()) {
                
                echo  "<tr>";
                echo  "<td>" . $row ["id"] . "</td>";
                echo  "<td>" . $row["first_name"] . "</td>";
                echo  "<td>" . $row["last_name"] . "</td>";
                echo  "<td>" . $row["username"] . "</td>";
                echo  "<td>" . $row["email"] . "</td>";
                echo  "<td>" . $row["role"] . "</td>";
                echo "<td>";
                echo "<a href='modify-details.php?id=" . $row["id"] . "' class='btn btn-outline-dark btn-sm'><i class='bi bi-pencil-square'></i></a>";
                echo "<a href='delete.php?id=" . $row["id"] . "' class='btn btn-outline-danger btn-sm mx-3'><i class='bi bi-trash'></i></a>";
                echo "</td>";
                echo  "</tr>";
            }
        } else {
            echo "No user found.";
        }
      
        ?>

                </tbody>
                </table>
            </div>
        </div>
    </div>
</section>