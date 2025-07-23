<?php ob_start(); ?>
<?php
include "../conf/config.php";
session_start();
if (is_null($_SESSION['name']) && is_null($_SESSION['level'])) {
    header('location: ../index.php?session=expired');
}
$name = $_SESSION['name'];
$level = $_SESSION['level'];
?>
<!-- Navbar -->
<?php include 'navbar.php'; ?>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-fluid">
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == 'tambahbarang') {
            include "create/createBarang.php";
        } elseif ($page == 'update') {
            include "update/gudangUpdate.php";
        } elseif ($page == 'stok_barang') {
            include "gudang.php";
        } elseif ($page == 'kasir') {
            include "transaksi.php";
        } elseif ($page == 'tambahtransaksi') {
            include "create/createTransaksi.php";
        } elseif ($page == 'tambahkeranjang') {
            include "create/createTransaksi.php";
        } elseif ($page == 'users') {
            include "users.php";
        } elseif ($page == 'usersupdate') {
            include "./update/usersUpdate.php";
        } elseif ($page == 'tambahusers') {
            include "./create/createUsers.php";
        } elseif ($page == 'companyprofile') {
            include "./companyProfile.php";
        } else {
            include "404.php";
        }
    } else {
        include "content.php";
    }
?>
    <!-- Main Sidebar Container -->
    <?php
if ($level == 'operator') {
    include "./sidebar/operator.php";
} else {
    include "./sidebar/admin.php";
}
?>
    <!-- /.sidebar -->

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include "footer.php" ?>
</div>
<?php ob_end_flush(); ?>

<!-- 
ob_start() & ob_end_flush() digunakan agar tidak ada warning pada saat penginputan data
-->