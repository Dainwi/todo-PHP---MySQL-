<?php
$dbusername = "root";
$dbpassword = "";
$dbname = "todo";
$dbhost = "localhost";

define('url', 'http://localhost/todo/');

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>