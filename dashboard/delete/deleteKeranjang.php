<?php
include "../../conf/config.php";

if (isset($_GET['id_keranjang'])) {
	$id = $_GET['id_keranjang'];
	mysqli_query($conn, "DELETE FROM tb_keranjang WHERE id = $id");
	header('location: ../index.php?page=tambahtransaksi');	
}else{
	session_start();
	unset($_SESSION['total_harga']);
    unset($_SESSION['bayar']);
    unset($_SESSION['kembalian']);
	mysqli_query($conn, "DELETE FROM tb_keranjang");
	header('location: ../index.php?page=tambahtransaksi');	
}
