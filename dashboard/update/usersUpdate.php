<?php
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = base64_encode($_POST['password']);
    $level = $_POST['level'];
    $nama_file = $_FILES["foto_profile"]["name"];
    $tmp = $_FILES["foto_profile"]["tmp_name"];
    $folder = "uploads/" . $nama_file;
    move_uploaded_file($tmp, $folder);

    mysqli_query($conn, "UPDATE tb_users SET name = '$name', username = '$username', password = '$password', foto_profile = '$folder' ,level = '$level' WHERE id = $id");
    header('location: index.php?page=users&status=editusers_berhasil');
}
   
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Data Users</h1>
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
                            <h3 class='card-title'>Update Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <?php
                                    $id = $_GET['id'];
                                    $queryusers = mysqli_query($conn, "SELECT * FROM tb_users WHERE id=$id");
                                    while ($users = mysqli_fetch_array($queryusers)) {
                                        // $_SESSION['name'] = $users['name'];
                                        // $_SESSION['foto_profile'] = $users['foto_profile'];
                                    ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $users['name'] ?>" placeholder="Enter Nama Produk" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Username</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $users['username'] ?>" placeholder="Enter Label Barcode" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?= base64_decode($users['password'])?>" placeholder="Enter users" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Level</label>                                    
                                        <select name="level" class="form-control">
                                            <option value="<?= $users['level'] ?>"><?= $users['level'] ?></option>
                                            <?php if($users['level'] == 'operator'){echo"<option value='admin'>admin</option>";}else{echo"<option value='operator'>operator</option>";} ?>
                                        </select>
                                    </div>    
                                      <div class="form-group mt-3">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input type="file" name="foto_profile" class="custom-file-input" id="exampleInputFile" value="<?=$users['foto_profile']?>" require>
                                            <label class="custom-file-label" name="foto_profile" for="exampleInputFile"><?=$users['foto_profile']?></label>
                                          </div>
                                        </div>
                                      </div>
                                    <div class="form-group">
                                        <button name="submit" type="submit" class="btn btn-primary mt-3">Submit</button>                                        
                                    </div> 
                                </div>                                       
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