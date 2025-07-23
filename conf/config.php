<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_kasir";
$conn = mysqli_connect($host,$user,$password,$database);

if (!$conn) {
    echo "Connection Failed";
}
?>