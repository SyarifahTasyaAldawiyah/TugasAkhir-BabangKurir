
    <div class="container-fluid">
<?php error_reporting(0); if($_SESSION['level']=="Driver"){ $drip=$koneksi->query("SELECT * FROM driver where id_driver='$_SESSION[id]' ");
$driv=mysqli_fetch_array($drip);}else{
  // code...
}?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Laporan Orderan</h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <?php if($_SESSION['level']=='Admin'){}else{?>
                            <a href="?page=page/laporanharian/tambah1"><button class="btn btn-success">Buat Laporan Orderan</button></a>
                        <?php }?>
                        </div>
                        
                        <div class="card-body" style="background-color: ;">
                            <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                    <thead>
                                        <tr style="background-color: #1cc88a; color: black;">
                                            <th colspan="">No</th>

                                            <th>Tanggal</th>
                                            <th>Total Orderan</th>
                                            <th>Total Belanja</th>
                                            <th>Total Ongkir</th>
                                            <th>Keterangan</th>
                                       <?php   if($_SESSION['level']=='Driver'){?> <th>Aksi</th><?php }else{?><th>Lihat Detail Orderan</th><?php }?>   
                                        </tr>
                                    </thead>
                                   <tfoot style="background-color: #1cc88a; color: black;">
                                            <tr style="background-color: #1cc88a; color: black;">
                                            <th colspan="">No</th>

                                            <th>Tanggal</th>
                                            <th>Total Orderan</th>
                                            <th>Total Belanja</th>
                                            <th>Total Ongkir</th>
                                            <th>Keterangan</th>
                                       <?php   if($_SESSION['level']=='Driver'){?> <th>Aksi</th><?php }else{?><th>Lihat Detail Orderan</th><?php }?>   
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                         <?php 
            $no =1;
            if($_SESSION['level']=='Driver'){
                 $adminaa=$koneksi->query("SELECT * FROM laporanharian where id_driver='$_SESSION[id]'   order by id_laporan desc");
           
            }else{
                 $adminaa=$koneksi->query("SELECT * FROM laporanharian   order by id_laporan desc");
           
            }
            while($ma=mysqli_fetch_array($adminaa)){
                $adminaan=$koneksi->query("SELECT SUM(jmlorderan) AS jmodrr FROM detailorderan  where keorder='Selesai' and id_driver='$ma[id_driver]' and tglorder='$ma[tgllaporan]' ");
                $mann=mysqli_fetch_array($adminaan);
                $adminaantb=$koneksi->query("SELECT SUM(ttlbelanja) AS jmla FROM detailorderan  where keorder='Selesai' and id_driver='$ma[id_driver]' and tglorder='$ma[tgllaporan]' ");
                $tb=mysqli_fetch_array($adminaantb);
                $atb=$koneksi->query("SELECT SUM(totalongkir) AS jmlong FROM detailorderan  where keorder='Selesai' and id_driver='$ma[id_driver]' and tglorder='$ma[tgllaporan]' ");
                $manca=mysqli_fetch_array($atb);
                $jmlorderan1=$mann['jmodrr'];
                $ttlbelanja=$tb['jmla'];
                $tong=$manca['jmlong'];
            
                 $admina=$koneksi->query("SELECT * FROM detailorderan  where id_driver='$_SESSION[id]' and tglorder='$ma[tgllaporan]' order by id_detailorder desc");
         $mam=mysqli_fetch_array($admina);
           
                   
          ?> 
                            <tr> 
                                <td rowspan="<?= $pa;?>"><?php echo $no;?></td>
                                 <td><?php echo tgl_indonesia($ma['tgllaporan']);?></td>
                                 <td><?php echo $jmlorderan1;?></td>
                                 <td>Rp. <?php echo number_format($ttlbelanja,0,",","."); ?></td>
                                 <td>Rp. <?php echo number_format($tong,0,",","."); ?></td>
                                 <td><?php if($mam['status']=='Baru'){?> 
                                        <a href="?page=page/laporanharian/tambah&id=<?php echo $ma['tgllaporan'];?>" class="btn btn-warning">
                                            <i class="fas fa-book"></i>Buat Laporan </a><?php }elseif($mam['status']=='Di Tolak'){?>Laporan anda <?= $mam['status'];?><br> Dikarenakan <?= $mam['kettolak'];?><br>Silahkan edit data orderan anda
                                        <?php }elseif($mam['status']=='Terlapor'){ echo "Laporan Belum Divalidasi oleh admin";?> 
                                        <?php }else{ echo"Laporan Selesai"; }?>
                                        </td>
                                <td>
                                         <?php if($_SESSION['level']=='Admin'){?>

                                         <a href="?page=page/rincianlaporan/detailadmin&id=<?php echo $ma['tgllaporan'];?>&id_driver=<?php echo $ma['id_driver'];?>" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-search"></i>
                                        </a><p></p>

                                    <?php }else{?>
                                            <a href="?page=page/rincianlaporan/detail&id=<?php echo $ma['tgllaporan'];?>&id_driver=<?php echo $ma['id_driver'];?>" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-search"></i>
                                        </a><p></p>
                                        <a href="?page=page/rincianlaporan/edit&id=<?php echo $ma['tgllaporan'];?>&id_driver=<?php echo $ma['id_driver'];?>" class="btn btn-success btn-circle btn-sm">
                                             <img src="img/pencil.png">
                                        </a><p></p>
                                         <a href="?page=page/rincianlaporan/hapus&id=<?php echo $ma['tgllaporan'];?>&id_driver=<?php echo $ma['id_driver'];?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <?php } ?>
                                       
                                 
                                    </td>

                                
                              
                            </tr>
                            <?php 
                              $no++;
                            } 

                             ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

  