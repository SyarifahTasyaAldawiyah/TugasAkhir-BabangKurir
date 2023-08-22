<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="?page=page/admin/tambah&id=Tambah Data Admin"><button class="btn btn-success">Tambah Admin</button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>No Hp</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>No Hp</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                         <?php 
            $no =1;
            $admin=$koneksi->query("SELECT * FROM admin   order by id_admin desc");
            while($m=mysqli_fetch_array($admin)){
                   
          ?> 
                            <tr>
                                <th><?php echo $no;?></th>
                                 <td><?php echo $m['nama'];?></td>
                                 <td><?php echo $m['username'];?></td>
                                 <td><?php echo $m['no_hp'];?></td>
                                  <td><img src="img/admin/<?php echo $m['foto'];?>" height="50"></td>
                                <td>
                                        <a href="?page=page/admin/edit&id=<?php echo $m['id_admin'];?>&data=Edit Admin" class="btn btn-warning btn-circle btn-sm">
                                            <img src="img/pencil.png">
                                        </a>
                                         <a href="?page=page/admin/hapus&id=<?php echo $m['id_admin'];?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a></td>
                            </tr>
                            <?php 
                            $no++;
                            } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

  