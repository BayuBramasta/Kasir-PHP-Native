<?php
$total_harga = 0;
$harga_semua_item = 0;
$kembalian = 0;
$button_bayar_condition = "disabled" ;
$_SESSION['bayar'] = 0;
// untuk mengupdate keranjang
if (isset($_POST['update'])) {
    $id = $_POST['id_item'];
    $jumlah_item = $_POST['jumlah_item'];
    // $harga_total = (int)$_POST['harga_total']*$jumlah_item;
    mysqli_query($conn, "UPDATE tb_keranjang SET jumlah_item = $jumlah_item WHERE id = $id");
}
if (isset($_POST['cetak'])) {
    // menyimpan pada session untuk strok
    $_SESSION['total_harga'] = $_POST['total_harga'];
    $_SESSION['kembalian'] = $_POST['kembalian'];
    header("location: ./strok/index.php");
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kasir</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Cari Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Label Barcode</label>
                      <input type="text" name="barcode" class="form-control" id="exampleInputEmail1" placeholder="Enter Label Barcode [ENTER]">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.card-body -->
            <div class="col-md-6">
              <div class='card card-primary'>
              <!-- /.card-header -->
                <div class='card-header'>
                  <h3 class='card-title'>Hasil Pencarian</h3>
                </div>
                <div class="card-body">
                <!--pencarian barang  -->
              <?php if (empty($_POST['barcode'])) {
                  echo '';
              } else {
                  $i = 0;
                  strtoupper($label_barcode = $_POST['barcode']);
                  $getProduct = mysqli_query($conn, "SELECT * FROM tb_barang WHERE label_barcode = '$label_barcode' OR  produk LIKE '%$label_barcode%' ");
                  echo "
                    <table id='example3' class='table table-striped'>
                      <thead>
                        <tr>
                          <td>#</td>
                          <td>produk</td>
                          <td>label_barcode</td>
                          <td>stok</td>
                          <td>harga Rp.</td>
                          <td>aksi</td>
                        </tr>
                      </thead>
                      <tbody>                      
                ";
                  while ($produk = mysqli_fetch_array($getProduct)) {
                      $i++;
                      $id = $produk['id'];
                      $nama_produk = $produk['produk'];
                      $label_produk = $produk['label_barcode'];
                      $stok = $produk['stok'];
                      $harga = $produk['harga'];
                      echo "
                        <tr>
                          <td>$i</td>
                          <td>$nama_produk</td>
                          <td>$label_produk</td>
                          <td>$stok</td>
                          <td>$harga</td>
                          <td><a href='index.php?page=tambahkeranjang&barang=$id' class='btn btn-success'>Add</a></td>
                        </tr>  
                      ";
                  }
                  echo "
                  </tbody>
                </table>";
              }?>
              </div>
            </div>
            </div>
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class='card-title'>Keranjang</h3>
                </div>
              <!-- table keranjang start -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <td style="width: 5%;">NO.</td>
                        <td>NAMA BARANG</td>
                        <td style="width: 15%;">JUMLAH ITEM</td>
                        <td>HARGA/pcs Rp.</td>
                        <td>AKSI</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_GET['barang'])) {
                        $id_barang = ($_GET['barang']);
                        $ambil_produk = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id = $id_barang");
                        $produk = mysqli_fetch_array($ambil_produk);
                        $np = $produk['produk'];
                        $hp = $produk['harga'] ;

                        // input ke keranjang
                        $opt = $_SESSION['name'];
                        $tambahKeranjang = mysqli_query($conn, "INSERT INTO tb_keranjang (nama_barang,jumlah_item,harga,operator) VALUES ('$np', 1, $hp,'$opt')");
                        header("location: index.php?page=tambahkeranjang");
                    } else {
                        $op = $_SESSION['name'];
                        $itteration = 1;
                        $ambil_keranjang = mysqli_query($conn, "SELECT * FROM tb_keranjang WHERE operator = '$op'");
                        while ($keranjang = mysqli_fetch_array($ambil_keranjang)) {
                            $total_harga += $keranjang['harga'] * $keranjang['jumlah_item'];
                            $harga_semua_item += $keranjang['harga'] * $keranjang['jumlah_item']; ?>              
                      <tr>
                        <form method="POST">
                          <td><?=$itteration++?></td>
                          <td><input type="hidden" value="<?=$keranjang['id']?>" name="id_item"><?=$keranjang['nama_barang']?></td>
                          <td><input class="jumlah_item form-control" name="jumlah_item" type="number" value="<?=$keranjang['jumlah_item']?>"></td>
                          <td><input type="hidden" value="<?=($keranjang['harga'])?>" name="harga_total"><?=number_format($keranjang['harga'])?></td>
                          <td>
                            <button type="submit" name="update" class="btn btn-warning">Update</button>
                            <a href="./delete/deleteKeranjang.php?id_keranjang=<?=$keranjang['id']?>" class="btn btn-danger">Delete</a>
                          </td>
                        </form>
                      </tr>
                  <?php }
                        }?>                  
                    </tbody>
                </table>
              </form>
                </div>
                <!-- fungsi bayar -->
                <?php
                  if (isset($_POST['bayar'])) {
                      $_SESSION['Bayar'] = $_POST['pay_nominal'];
                      $harga_total = (int)$_POST['total_harga'];
                      $bayar = (int)$_POST['pay_nominal'];
                      if ($bayar < $total_harga) {
                          echo "<script>alert('Nominal bayar kurang')</script>";
                      } else {
                          $button_bayar_condition = "";
                          $kembalian = $bayar - $total_harga;
                          $gKeranjang = mysqli_query($conn, "SELECT * FROM tb_keranjang");
                          while ($dKeranjang = mysqli_fetch_array($gKeranjang)) {
                              $item = $dKeranjang['nama_barang'];
                              $total_item = $dKeranjang['jumlah_item'];
                              $total_harga = $dKeranjang['harga'];
                              $operator = $_SESSION['name'];
                              mysqli_query($conn, "INSERT INTO tb_transaksi (item,total_item,total_harga,operator) VALUES ('$item',$total_item,$total_harga,'$operator')");
                              // update tabel barang
                              $gBarang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE produk = '$item'");
                              $dBarang = mysqli_fetch_array($gBarang);
                              $stokBaru = (int)$dBarang['stok'] - $total_item;
                              mysqli_query($conn, "UPDATE tb_barang SET stok = $stokBaru WHERE produk = '$item'");
                          }
                          echo "<script>alert('Pembayaran berhasil')</script>";
                      }
                  }

?>                
                <div class="container" style="width:50%">
                  <form method="POST">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Total Harga Rp.</label>
                        <input type="text" readonly value="<?=number_format($harga_semua_item)?>" name="total_harga" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Bayar Rp.</label>
                        <input type="number" name="pay_nominal" class="form-control" placeholder="Enter Nominal Pembayaran [ENTER]">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kembalian Rp.</label>
                        <input type="text" name="kembalian" readonly name="kembalian" value="<?=number_format($kembalian)?>" class="form-control" id="exampleInputEmail1">
                      </div>
                      <div class="form-group">
                        <button type="submit" name="bayar" class="btn btn-success">Bayar</button>
                        <button type="submit" name="cetak" class="btn btn-primary" <?=$button_bayar_condition?> >Cetak</button> 
                      </div>                                                                                  
                  </form>                     
                </div>
                <div class="card-footer">
                  <!-- button reset -->
                  <a href="./delete/deleteKeranjang.php" class="btn btn-lg btn-danger">reset</a>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->