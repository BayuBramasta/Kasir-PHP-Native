<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $produk = $_POST['produk'];
    $barcode = $_POST['barcode'];
    $stok = (int) $_POST['stok'];
    $harga = (int) $_POST['harga'];
    $updateBarang = mysqli_query($conn, "UPDATE tb_barang SET produk = '$produk', label_barcode = '$barcode', stok = $stok, harga = $harga WHERE id = $id");
    header('location: index.php?page=stok_barang&status=edit_berhasil');
    exit;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Data Barang</h1>
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
                            <h3 class='card-title'>Update Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form method="POST">
                                <div class="card-body">
                                    <?php
                                    $id = $_GET['id'];
                                    $queryStok = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id=$id");
                                    while ($stok = mysqli_fetch_array($queryStok)) {
                                    ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Produk</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $stok['produk'] ?>" placeholder="Enter Nama Produk" name="produk">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Label Barcode</label>`
                                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $stok['label_barcode'] ?>" placeholder="Enter Label Barcode" name="barcode">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Stok</label>
                                            <input type="number" class="form-control" id="exampleInputPassword1" value="<?= $stok['stok'] ?>" placeholder="Enter Stok" name="stok">
                                        </div>
                                        <label for="exampleInputPassword1">Harga Rp.</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1" value="<?= $stok['harga'] ?>" placeholder="Enter Harga" name="harga">
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                    <?php }; ?>
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