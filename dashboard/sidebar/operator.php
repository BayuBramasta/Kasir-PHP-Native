<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;">
        <span class="brand-text font-weight-light">POS KASIR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php $profile = $_SESSION['foto_profile'];
                if ($_SESSION['foto_profile'] == '') {
                    echo "<img src='dist/img/user2-160x160.jpg' class='img-circle elevation-2'>";
                } else {
                    echo "<img src='$profile' class='img-circle elevation-2'>";
                } ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['name'] ?> | <?= $_SESSION['level'] ?> </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>        
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Kasir & Stok barang
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?page=kasir" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kasir</p>
                            </a>
                        </li>
                            <li class="nav-item">
                                <a href="index.php?page=stok_barang" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Stok_barang</p>
                                </a>
                            </li>        
                    </ul>
                </li>    
                <li class="nav-item">
                    <a href="./logout.php" class="text-red nav-link">
                        <i class="fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>