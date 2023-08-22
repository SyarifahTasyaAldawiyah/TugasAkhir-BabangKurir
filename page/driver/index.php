
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="?page=page/driver/tambah&id=Tambah Data driver"><button class="btn btn-success">Tambah driver</button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                            <th>No</th>
                                            <th>No BB</th>
                                            <th>Nama</th>
                                            <th>Ttl</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Hp</th>
                                            <th>Level</th>
                                            <th>Foto</th>
                                            <th>KTP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                       <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                            <th>No</th>
                                            <th>No BB</th>
                                            <th>Nama</th>
                                            <th>Ttl</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Hp</th>
                                            <th>Level</th>
                                            <th>Foto</th>
                                            <th>KTP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                         <?php 
            $no =1;
            $driver=$koneksi->query("SELECT * FROM driver as d, level_driver as l where d.id_level=l.id_level   order by id_driver desc");
            while($m=mysqli_fetch_array($driver)){
                   
          ?> 
                            <tr>
                                <th><?php echo $no;?></th>
                                 <td><?php echo $m['nobb'];?></td>
                                 <td><?php echo $m['nama_driver'];?></td>
                                 <td><?php echo $m['ttl'];?></td>
                                 <td><?php echo $m['jk'];?></td>
                                 <td><?php echo $m['no_hp'];?></td>
                                 <td><?php echo $m['nama_level'];?></td>
                                  <td><img src="img/driver/<?php echo $m['foto'];?>" height="50"></td>
                                  <td><img src="img/ktp/<?php echo $m['ktp'];?>" height="50"></td>
                                <td>
                                    <a href="?page=page/driver/edit&id=<?php echo $m['id_driver'];?>&data=Edit Driver" class="btn btn-success btn-circle btn-sm">
                                         <img src="img/pencil.png">
                                    </a>
                                     <a href="?page=page/driver/hapus&id=<?php echo $m['id_driver'];?>" class="btn btn-danger btn-circle btn-sm"onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">
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

  