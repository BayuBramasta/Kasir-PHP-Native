<?php
include "../../conf/config.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_barang WHERE id=$id");
header('location: ../index.php?page=stok_barang&status=hapus_berhasil');
