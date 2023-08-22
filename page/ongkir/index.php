
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="?page=page/ongkir/tambah"><button class="btn btn-success">Tambah Ongkir </button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                      <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                            <th>No</th>
                                            <th>Tempat Asal</th>
                                            <th>Tempat Tujuan</th>
                                            <th>Ongkir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                         <th>No</th>
                                            <th>Tempat Asal</th>
                                            <th>Tempat Tujuan</th>
                                            <th>Ongkir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                         <?php error_reporting(0);
            $no =1;
            $ongkir=$koneksi->query("SELECT * FROM ongkir   order by id_ongkir desc");
            while($m=mysqli_fetch_array($ongkir)){
                  $per= number_format($m['ongkir'],0,",",".");
          ?> 
                            <tr>
                                <th><?php echo $no;?></th>
                                 <td><?php echo $m['dari'];?></td>
                                 <td><?= $m['ke'];?></td>
                                 <td>Rp. <?= $per;?></td>
                                <td>
                                    <a href="?page=page/ongkir/edit&id=<?php echo $m['id_ongkir'];?>&data=Edit Level Driver" class="btn btn-success btn-circle btn-sm">
                                         <img src="img/pencil.png">
                                    </a>
                                     <a href="?page=page/ongkir/hapus&id=<?php echo $m['id_ongkir'];?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">
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

  