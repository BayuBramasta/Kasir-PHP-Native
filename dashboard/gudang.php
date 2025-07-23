<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Stok Barang</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="index.php?page=tambahbarang" class="btn btn-lg btn-primary mb-2">
                <i class="fa fa-plus-circle"></i>Add</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>PRODUK</th>
                    <th>LABEL BARCODE</th>
                    <th>STOK</th>
                    <th>HARGA Rp.</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $itteration = 0;
                  $queryStok = mysqli_query($conn, "SELECT * FROM tb_barang");
                  while ($stok = mysqli_fetch_array($queryStok)) {
                    $itteration++
                  ?>
                    <tr>
                      <td style="width:10%"><?= $itteration ?></td>
                      <td><?= $stok['produk'] ?></td>
                      <td><?= $stok['label_barcode'] ?></td>
                      <td> <?= $stok['stok'] ?></td>
                      <td> <?= number_format($stok['harga']) ?></td>
                      <td>
                        <a href="index.php?page=update&id=<?= $stok['id'] ?>" class="btn btn-warning">
                          <i class="far fa-edit"></i>Edit</a>
                        <a data-id="<?= $stok['id'] ?>" class="btnDel btn btn-danger">
                          <i class="far fa-trash-alt"></i>Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>