<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produk = $_POST['produk'];
    $barcode = $_POST['barcode'];
    $stok = (int) $_POST['stok'];
    $harga = (int) $_POST['harga'];
    $checkBarcode = mysqli_query($conn, "SELECT * FROM tb_barang WHERE label_barcode = '$barcode'");
    if (mysqli_fetch_row($checkBarcode) > 0) {
        header('location: index.php?page=stok_barang&status=tambah_gagal');
    } else {
        $insertBarang = mysqli_query($conn, "INSERT INTO tb_barang (produk, label_barcode, stok, harga) VALUES ('$produk','$barcode', $stok, $harga);");
        header('location: index.php?page=stok_barang&status=tambah_berhasil');
    }
    exit;
}
// include "navbar.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Barang</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class='card-title'>Tambah Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Produk</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama Produk" name="produk">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Label Barcode</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Label Barcode" name="barcode">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Stok</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Stok" name="stok">
                                    </div>
                                    <label for="exampleInputPassword1">Harga Rp.</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Harga" name="harga">
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</section>
</div>
<!-- /.container-fluid -->