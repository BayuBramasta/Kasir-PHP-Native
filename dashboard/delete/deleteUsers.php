<?php
include "../../conf/config.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_users WHERE id=$id");
header('location: ../index.php?page=users&status=hapus_berhasil');
