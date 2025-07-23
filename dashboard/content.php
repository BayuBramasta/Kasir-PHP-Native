<?php
$name = $_SESSION['name'];
if($_SESSION['level']=='admin'){
  $GetTransaksi = mysqli_query($conn, "SELECT SUM(total_item) AS total_transaksi, SUM(total_harga*total_item) AS total_harga  FROM tb_transaksi;");  
}else{
  $GetTransaksi = mysqli_query($conn, "SELECT SUM(total_item) AS total_transaksi, SUM(total_harga*total_item) AS total_harga  FROM tb_transaksi WHERE operator = '$name'; ");  
} 
$transaksi = mysqli_fetch_array($GetTransaksi);
$GetUsers = mysqli_query($conn, "SELECT COUNT(id) AS total_users FROM tb_users;");
$users = mysqli_fetch_array($GetUsers);
$GetGudang = mysqli_query($conn, "SELECT SUM(stok) AS total_barang FROM tb_barang;");
$gudang = mysqli_fetch_array($GetGudang);
 ?>    
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="kotak content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php if(mysqli_fetch_row($GetTransaksi)>=0){echo $transaksi['total_transaksi'];}else{echo 0;} ?></h3>

                <p>Barang Terjual</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="index.php?page=kasir" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><sup style="font-size: 20px">Rp. </sup><?=number_format($transaksi['total_harga']) ?></h3>

                <p><?php if ($_SESSION['level']=='admin'){echo "Pendapatan Perusahaan";}else{echo "Pendapatan kamu";} ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="index.php?page=kasir" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <?php
          $user =  $users['total_users'];
          if ($_SESSION['level']=='admin'){
            echo "
          <div class='col-lg-3 col-6'>
            <!-- small box -->
            <div class='small-box bg-warning'>
              <div class='inner'>
                <h3>$user</h3>

                <p>User Terdaftar</p>
              </div>
              <div class='icon'>
                <i class='ion ion-person-add'></i>
              </div>
              <a href='index.php?page=users'' class='small-box-footer'>More info <i class='fas fa-arrow-circle-right'></i></a>
            </div>
          </div>
            ";
          }else{
            echo "";
          } ?>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$gudang['total_barang']?></h3>

                <p>Barang di gudang</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="index.php?page=stok_barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
