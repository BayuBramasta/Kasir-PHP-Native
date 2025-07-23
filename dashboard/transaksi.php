<!-- -- Content Wrapper. Contains page content --> 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>transaksi Barang</h1>
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
              <a href="index.php?page=tambahtransaksi" class="btn btn-lg btn-primary mb-2">
                <i class="fa fa-plus-circle"></i>Add</a>
              <table id="example4" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>ITEM</th>
                    <th>TOTAL ITEM</th>
                    <th>TOTAL HARGA RP.</th>
                    <?php $colspan = 3; if ($_SESSION['level'] == 'admin'){echo "<th>OPERATOR</th>"; $colspan = 3;}?>
                    <th>WAKTU TRANSAKSI</th>
                    <!-- <th>AKSI</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $itteration = 0;
                  $pendapatan = 0;
                  $operator = $_SESSION['name']; 
                  $level = $_SESSION['level'];
                  if ($level == 'admin'){
                    $queryTransaksi = mysqli_query($conn, "SELECT * FROM tb_transaksi");
                  }
                  else{
                    $queryTransaksi = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE operator = '$operator'");
                  }
                  while ($transaksi = mysqli_fetch_array($queryTransaksi)) {
                    $itteration++;
                    $pendapatan += (int) $transaksi['total_harga']*(int)$transaksi['total_item'];
                    $operator_transaksi = $transaksi['operator'];
                  ?>
                    <tr>
                      <td style="width:10%"><?= $itteration ?></td>
                      <td><?= $transaksi['item'] ?></td>
                      <td><?= $transaksi['total_item'] ?></td>
                      <td><?= number_format($transaksi['total_harga']) ?></td>
                      <?php if ($_SESSION['level'] == 'admin'){echo "<td>$operator_transaksi</td>";}?>
                      <td> <?= $transaksi['created_at'] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="<?=$colspan?>">Pendapatan</th>
                    <th colspan="1"><?='Rp.'.number_format($pendapatan)?></th>
                    <th colspan="<?php if ($_SESSION['level'] == 'admin'){echo 2;} else {echo 1;}  ?>"></th>
                  </tr>
                </tfoot>                
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