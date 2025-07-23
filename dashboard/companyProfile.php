<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $nama_pemilik = $_POST['nama_pemilik'];
    mysqli_query($conn, "UPDATE tb_company_profile SET nama_perusahaan = '$nama_perusahaan',  pemilik = '$nama_pemilik'");
    header('location: index.php?page=companyprofile&status=edit_berhasil');
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
                    <h1>Company Profile</h1>
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
                            <h3 class='card-title'>Company Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form method="POST">
                                <div class="card-body">
                                    <?php
                                    $queryCompanyProfile = mysqli_query($conn, "SELECT * FROM tb_company_profile");
while ($cp = mysqli_fetch_array($queryCompanyProfile)) {
    ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Perusahaan</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $cp['nama_perusahaan'] ?>" placeholder="Enter Nama Perusahaan" name="nama_perusahaan">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pemilik</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $cp['pemilik'] ?>" placeholder="Enter Nama Perusahaan" name="nama_pemilik">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Update</button>
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
