
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="?page=page/kodeorder/tambah&id=Tambah Data Kode Order"><button class="btn btn-success">Tambah <?php echo $_GET['id'];?></button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                            <th>No</th>
                                            <th>Nama Order</th>
                                            <th>Kode Order</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                           <th>No</th>
                                            <th>Nama Order</th>
                                            <th>Kode Order</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                         <?php error_reporting(0);
            $no =1;
            $level_driver=$koneksi->query("SELECT * FROM kode_order   order by id_kode desc");
            while($m=mysqli_fetch_array($level_driver)){
          ?> 
                            <tr>
                                <th><?php echo $no;?></th>
                                 <td><?php echo $m['nama_order'];?></td>
                                 <td><?php echo $m['code_order'];?></td>
                                <td>
                                    <a href="?page=page/kodeorder/edit&id=<?php echo $m['id_kode'];?>&data=Edit Kode Order" class="btn btn-success btn-circle btn-sm">
                                       <img src="img/pencil.png">
                                    </a>
                                     <a href="?page=page/kodeorder/hapus&id=<?php echo $m['id_kode'];?>" class="btn btn-danger btn-circle btn-sm">
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

  