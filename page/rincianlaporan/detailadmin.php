
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
                                <form action="" method="POST" enctype="multipart/form-data">
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
                                            <th>Status Laporan</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                       
                                         <?php 
            $no =1;
            $abs=$koneksi->query("SELECT * FROM detailorderan  where id_driver='$_GET[id_driver]' and tglorder='$_GET[id]' order by id_detailorder desc");
            $absa=$koneksi->query("SELECT * FROM detailorderan  where id_driver='$_GET[id_driver]' and tglorder='$_GET[id]' order by id_detailorder desc");
         $cek=mysqli_fetch_array($absa);
            while($ma=mysqli_fetch_array($abs)){
                  
            $pa=mysqli_num_rows($koneksi->query("select * from detailorderan where status='Baru' and tglorder='$ma[tglorder]' "));
            $pap=mysqli_num_rows($koneksi->query("select * from detailorderan where  id_driver='$_GET[id_driver]' and tglorder='$_GET[id]' "));
            $aong=$koneksi->query("SELECT * FROM ongkir  where id_ongkir='$ma[id_ongkir]' ");
         $ongkir=mysqli_fetch_array($aong);
                   
          ?> 
                            <tr> 
                                <td ><input type="hidden" name="ttl" value="<?= $pap;?>"><?php echo $no;?></td>
                               

                                    
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

                                 <td>
                                    <?php echo $ma['titik'];?></td>
                                 <td>Rp. <?php echo number_format($ma['ttlbelanja'],0,",","."); ?></td>
                                 <td>Rp. <?php echo number_format($ma['ongkir'],0,",","."); ?></td>
                                 
                                 <td>Rp. <?php echo number_format($ma['totalongkir'],0,",","."); ?></td>
                                 <td><?php if ($ma['keorder']=="Selesai"){ echo $ma['keorder'];?> <?php }else{?> <div class="container">
       
        <button type="button"  data-toggle="modal" data-target="#myModal1">
           Lihat Bukti Pembatalan
        </button>


        <div class="modal" id="myModal1">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-header">
                        <h4 class="modal-title"> Bukti Pembatalan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


                    <div class="modal-body">
                       <img src="img/order/<?=$ma['file'];?>" width="200px;">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>

    </div><?php }?></td>
   
                              <td rowspan="">
                                    <?php echo $ma['status'];?></td> 
                            </tr>
                            <?php 
                              $no++;
                            } 

                             ?>
                                    </tbody>
                                </table>
                                  <div class="form-group mb-n">
                                    <div class="col-sm-8">
                                       <?php if($cek['status']=='Terlapor'){?><h5><button class="btn btn-success"><input type="radio" name="status" value="Di Terima"></button>Di Terima <h5><button class="btn btn-warning"><input type="radio" name="status" value="Di Tolak"></button>Di Tolak </h5>
                                    <textarea name="kettolak" class="form-control" style="width:500px;" placeholder="Keterangan Jika Ditolak"></textarea>
                               <?php }else{}?>
                                       
        </div>
        </div>
                                <div class="form-group mb-n">
                                    <div class="col-sm-8">
                                       <?php if($cek['status']=='Terlapor'){?> <input type="submit" name="simpan" value="Validasi" class="btn btn-info"><?php }else{}?>
            <a href="?page=page/rincianlaporan/indexadmin" type="button"class = "btn btn-danger">Kembali</a>
        </div>
        </div></form>
                            </div>
                        </div>
                    </div>

                </div>

  <?php if(isset($_POST['simpan'])){
$total = $_POST['ttl'];
      

    $status = $_POST['status']; 
  
  $sql=$koneksi->query( "UPDATE detailorderan SET 
        status = '$status',
        kettolak='$_POST[kettolak]'
        WHERE tglorder='$_GET[id]' and id_driver='$_GET[id_driver]'
        ");
 
 

   echo"<script>alert('Data Berhasil di Validasi !!!'); window.location = '?page=page/rincianlaporan/indexadmin'</script>";
}
?>