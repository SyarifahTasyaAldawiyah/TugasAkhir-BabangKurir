
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
                                            <th>Nama Driver</th>
                                            <th>Total Orderan</th>
                                            <th>Total Belanja</th>
                                            <th>Total Ongkir</th>
                                            <th>Keterangan</th>
                                       <th>Lihat Detail Orderan</th>
                                        </tr>
                                    </thead>
                                   <tfoot>
                                     <tr style="background-color: #1cc88a; color: black;">
                                            <th colspan="">No</th>

                                            <th>Tanggal</th>
                                            <th>Nama Driver</th>
                                            <th>Total Orderan</th>
                                            <th>Total Belanja</th>
                                            <th>Total Ongkir</th>
                                            <th>Keterangan</th>
                                       <th>Lihat Detail Orderan</th>
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
                $dr=$koneksi->query("SELECT * FROM driver   where id_driver='$ma[id_driver]'");
           
           $driv=mysqli_fetch_array($dr);
                $adminaan=$koneksi->query("SELECT SUM(jmlorderan) AS jmodrr FROM detailorderan  where keorder='Selesai' and id_driver='$ma[id_driver]' and tglorder='$ma[tgllaporan]' ");
                $mann=mysqli_fetch_array($adminaan);
                $adminaantb=$koneksi->query("SELECT SUM(ttlbelanja) AS jmla FROM detailorderan  where keorder='Selesai' and id_driver='$ma[id_driver]' and tglorder='$ma[tgllaporan]' ");
                $tb=mysqli_fetch_array($adminaantb);
                $atb=$koneksi->query("SELECT SUM(ongkir) AS jmlong FROM detailorderan  where keorder='Selesai' and id_driver='$ma[id_driver]' and tglorder='$ma[tgllaporan]' ");
                $manca=mysqli_fetch_array($atb);
                  $atba=$koneksi->query("SELECT *FROM detailorderan  where keorder='Selesai' and id_driver='$ma[id_driver]' and tglorder='$ma[tgllaporan]' ");
                $test=mysqli_fetch_array($atba);
                $jmlorderan1=$mann['jmodrr'];
                $ttlbelanja=$tb['jmla'];
                $tong=$manca['jmlong'];
            
                 $admina=$koneksi->query("SELECT * FROM detailorderan  where id_driver='$ma[id_driver]' and tglorder='$ma[tgllaporan]' order by id_detailorder desc");
         $mam=mysqli_fetch_array($admina);

           
                   
          ?> 
                            <tr> 
                                <td rowspan="<?= $pa;?>"><?php echo $no;?></td>
                                 <td><?php echo tgl_indonesia($ma['tgllaporan']);?></td>
                                 <td><?php echo $driv['nama_driver'];?></td>
                                 <td><?php echo $jmlorderan1;?></td>
                                 <td>Rp. <?php echo number_format($ttlbelanja,0,",","."); ?></td>
                                 <td>Rp. <?php echo number_format($tong,0,",","."); ?></td>
                                 <td><?php if($test['status']=='Baru'){
                                        echo "Belum Validasi";?>
                                    <?php }elseif($test['status']=='Terlapor'){
                                        echo "Belum Validasi";?>
                                    <?php }elseif($mam['status']=='Di Tolak'){?>Laporan <?= $mam['status'];?><br> Dikarenakan <?= $mam['kettolak'];?>
                                <?php }else{ echo "Sudah Validasi"; }?>
                                        </td>
                                <td>
                                        

                                         <a href="?page=page/rincianlaporan/detailadmin&id=<?php echo $ma['tgllaporan'];?>&id_driver=<?php echo $ma['id_driver'];?>" class="btn btn-primary ">
                                            <i class="fas fa-eye"> Lihat Detail Laporan</i>
                                        </a><p></p>

                                       
                                 
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

  