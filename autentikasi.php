<?php

include "conf/config.php";
session_start();
$username = htmlspecialchars($_POST['username']);
$password = base64_encode(htmlspecialchars($_POST['password']));
$query = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username' AND password = '$password'");
if (mysqli_fetch_row($query) > 0) {
    $data = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username' AND password = '$password'");
    $user = mysqli_fetch_array($data);
    $_SESSION['name'] = $user['name'];
    $_SESSION['level'] = $user['level'];
    $_SESSION['foto_profile'] = $user['foto_profile'];
    header("location: dashboard/");
    // print_r($_SESSION);
} elseif ($username == "" || $password == "") {
    header("location: index.php?kode_error=2");
} else {
    header("location: index.php?kode_error=1");
}
