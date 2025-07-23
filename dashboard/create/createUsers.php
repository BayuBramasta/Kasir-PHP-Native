<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = base64_encode($_POST['password']);
    $level = $_POST['level'];
    $checkUsername = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'");
    if (mysqli_fetch_row($checkUsername) > 0) {
        header('location: index.php?page=users&status=tambahusers_gagal');
    } else {
        $insertBarang = mysqli_query($conn, "INSERT INTO tb_users (name, username, password, foto_profile ,level) VALUES ('$nama','$username', '$password', '' ,'$level');");
        header('location: index.php?page=users&status=tambah_berhasil');
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
                    <h1>Tambah Users</h1>
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
                            <h3 class='card-title'>Tambah Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form method="POST">
                                <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Username</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="password">
                                        </div>
                                            <label for="exampleInputPassword1">Level</label>
                                            <select name="level" class="form-control">
                                                <option value="operator">Operator</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        <div class="form-group mt-3">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>        
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