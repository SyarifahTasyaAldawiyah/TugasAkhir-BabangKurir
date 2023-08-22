
    <div class="container-fluid">
<?php  if($_SESSION['level']=="Driver"){ $drip=$koneksi->query("SELECT * FROM driver where id_driver='$_SESSION[id]' ");
$driv=mysqli_fetch_array($drip);}else{
  // code...
}?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Detail Laporan Orderan</h1>
                 
                    <div class="card shadow mb-4">
                       
                        <?php $p=mysqli_num_rows($koneksi->query("select * from kode_order "));?>
                        <div class="card-body" style="background-color: ;">
                            <div class="table-responsive">
                     <table class="table table-bordered"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align:center;background-color: #f6c23e; color: black;">
                                            <th colspan="2">Data</th>
                                            <th colspan="<?= $p;?>">Jenis Orderan</th>
                                            <th colspan="5">Rekapan</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                         <tr style="background-color: #1cc88a; color: black;">
                                            <th colspan="">No</th>

                                            <th>Alamat/Rute</th>
                                            <?php
                      $no=1;
                      $tampil = $koneksi->query("SELECT * FROM kode_order  ");
                      while($m=mysqli_fetch_array($tampil)){
                        
                        
                      ?>
                                            <th><?= $m['nama_order'];?></th>
                                          <?php }?>
                                            <th>Titik</th>
                                            <th>Total Belanja</th>
                                            <th>Ongkir</th>
                                            <th>Total Ongkir</th>
                                            <th>Selesai / Batal</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                       
                                         <?php 
            $no =1;
            $admina=$koneksi->query("SELECT * FROM detailorderan  where id_driver='$_GET[id_driver]' and tglorder='$_GET[id]' order by id_detailorder desc");
            while($ma=mysqli_fetch_array($admina)){
            $pa=mysqli_num_rows($koneksi->query("select * from detailorderan where status='Baru' and tglorder='$ma[tglorder]' "));
            $aong=$koneksi->query("SELECT * FROM ongkir  where id_ongkir='$ma[id_ongkir]' ");
         $ongkir=mysqli_fetch_array($aong);
         $jmorder+=$ma['jmlorderan'];
                   
          ?> 
                            <tr> 
                                <td ><?php echo $no;?></td>
                               

                                    
                                 <td><?php echo $ongkir['dari'];?> - <?php echo $ongkir['ke'];?></td>
                                   <?php
                     
                      $tampil = $koneksi->query("SELECT * FROM kode_order  ");
                      while($m=mysqli_fetch_array($tampil)){
                        
                        if($m['id_kode']==$ma['jenisorderan']){
                          ?>

<th><?= $ma['jmlorderan'];?></th>
                          <?php 
                        }else{
                      ?>
                                            <th></th>
                                          <?php } }?>

                                 <td><?php echo $ma['titik'];?></td>
                                 <td>Rp. <?php echo number_format($ma['ttlbelanja'],0,",","."); ?></td>
                                 <td>Rp. <?php echo number_format($ma['ongkir'],0,",","."); ?></td>
                                 <td>Rp. <?php echo number_format($ma['totalongkir'],0,",","."); ?></td>
                                 <td><?php echo $ma['keorder'];?></td>
                              
                            </tr>
                            <?php 
                              $no++;
                            } 

                             ?>
                             
                                    </tbody>
                                </table>
                                <div class="form-group mb-n">
                                    <div class="col-sm-8">
            <a href="?page=page/rincianlaporan/index" type="button"class = "btn btn-danger">Kembali</a>
        </div>
        </div>
                            </div>
                        </div>
                    </div>

                </div>

  