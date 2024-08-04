<?php

define('hostname' , 'localhost');
define('username' , 'root');
define('password', '');
define('db_name' , 'technoweb');


$mysqli = new mysqli(hostname, username, password, db_name);

if($mysqli->connect_error) {
    die("connection Failed");
}

?>