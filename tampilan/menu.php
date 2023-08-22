<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="beranda.php">
                <div class="sidebar-brand-icon rotate-n-45">
                   <img src="img/BabangKurir.png" width="200px">
                   
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="?page=page/home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <?php if($_SESSION['level']=="Admin"){?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Driver</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=page/level_driver/index&id=Data Level Driver">Level Driver</a>
                        <a class="collapse-item" href="?page=page/driver/index&id=Data Driver">Data Driver</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=page/kodeorder/index&id=Kode Order">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kode Order</span></a>
            </li>
          <li class="nav-item">
                <a class="nav-link" href="?page=page/rincianlaporan/indexadmin">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan Orderan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=page/laporanharian/indexadmin">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan Harian </span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="?page=page/gaji/index">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Gaji Driver </span></a>
            </li>
 <li class="nav-item">
                <a class="nav-link" href="?page=page/ongkir/index">
                    <i class="fa fa-truck"></i>
                    <span>Ongkir </span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="?page=page/admin/index&id=Data Admin">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Admin</span></a>
            </li>
<?php }else{?>

    <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
<li class="nav-item">
                <a class="nav-link" href="?page=page/rincianlaporan/index">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan Orderan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=page/laporanharian/index&id=Data Laporan Harian">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan Harian</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="?page=page/gaji/index&id=Data Gaji">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Gaji</span></a>
            </li>
<?php }?>
           
            <!-- Divider -->
           

        </ul>