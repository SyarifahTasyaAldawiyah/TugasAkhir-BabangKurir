
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="?page=page/level_driver/tambah&id=Tambah Data Level Driver"><button class="btn btn-success">Tambah Level Driver</button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                            <th>No</th>
                                            <th>Nama Level</th>
                                            <th>Hitungan Komisi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                           <th>No</th>
                                            <th>Nama Level</th>
                                            <th>Persentase Penghasilan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                         <?php error_reporting(0);
            $no =1;
            $level_driver=$koneksi->query("SELECT * FROM level_driver   order by id_level desc");
            while($m=mysqli_fetch_array($level_driver)){
                  $per= number_format($m['persentase'],0,",",".");
          ?> 
                            <tr>
                                <th><?php echo $no;?></th>
                                 <td><?php echo $m['nama_level'];?></td>
                                 <td><?php if($m['nama_level']=="STARKAN"){ echo "Income Per Hari X $m[persentase]" ;}else{  echo "Income Per Hari - Rp. $per" ; }?></td>
                                <td>
                                    <a href="?page=page/level_driver/edit&id=<?php echo $m['id_level'];?>&data=Edit Level Driver" class="btn btn-success btn-circle btn-sm">
                                         <img src="img/pencil.png">
                                    </a>
                                     <a href="?page=page/level_driver/hapus&id=<?php echo $m['id_level'];?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">
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

  