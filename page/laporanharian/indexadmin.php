
    <div class="container-fluid">
<?php  if($_SESSION['level']=="Driver"){ $drip=$koneksi->query("SELECT * FROM driver where id_driver='$_SESSION[id]' ");
$driv=mysqli_fetch_array($drip);}else{
  // code...
}?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Laporan Harian</h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                      
                                    <td></td>
                                    <td>Tanggal Awal <input type="date" name="tglawal" <?php  if(isset($_POST['pencarian'])){?> value="<?= $_POST['tglawal']?>"<?php }else{}?> ></td>
                                    <td></td>
                                    <td>Tanggal Akhir <input type="date" name="tgllakhir" <?php  if(isset($_POST['pencarian'])){?> value="<?= $_POST['tgllakhir']?>"<?php }else{}?>>
                                </td>
                                <td><input type="submit" class="btn btn-primary" name="pencarian" value="Cari"></td>
 <?php 
                                    if(isset($_POST['pencarian'])){?>
                                <td></td>
                                <td><a href="page/laporanharian/laporanharian.php?id_driver=<?= $_POST['id_driver'];?>&tglawal=<?= $_POST['tglawal']?>&tgllakhir=<?= $_POST['tgllakhir']?>" class="btn btn-warning" target="_BLANK">Cetak Gaji</a></td>
<?php  }else{}?>
                                </tr>
                                </table>
                            </form>
                        </div>
                        <div class="card-body" style="background-color: ;">
                            <div class="table-responsive">
                                

                               
<table style='border:solid black 1.0pt;' class="table table-bordered" id="dataTable" width="100%" border="1" cellspacing="0" >
                                   
<tr style="background-color: #1cc88a; color: black; text-align: center;">

  <td  style='border:solid black 1.0pt;' rowspan="2">No</td>
  <td  style='border:solid black 1.0pt;' rowspan="2">Action</td>
  <td  style='border:solid black 1.0pt;' rowspan="2">NAMA DRIVER</td>
  <td style='border:solid black 1.0pt;' colspan="2" rowspan="2" >ORDERAN</td>
  <td style='border:solid black 1.0pt;' rowspan="2" >MODAL</td>
  <td style='border:solid black 1.0pt;' rowspan="2">INCOME</td>
  <td style='border:solid black 1.0pt;' rowspan="2" > KANTOR (+)</td>
  <td style='border:solid black 1.0pt;' nowrap rowspan="2" > KETERANGAN KANTOR (+)</td>
  <td style='border:solid black 1.0pt;' rowspan="2">BON</td>
  <td style='border:solid black 1.0pt;' nowrap colspan="6" ><center>TRANSFER</center></td>
  <td style='border:solid black 1.0pt;' nowrap rowspan="2" >KANTOR (-)</td>
  <td style='border:solid black 1.0pt;' nowrap rowspan="2" >KETERANGAN KANTOR (-)</td>
  <td style='border:solid black 1.0pt;' nowrap rowspan="2">SETORAN</td>
 </tr>

<tr style='border:solid black 1.0pt;text-align:center;background-color: #f6c23e; color: black;'>
  <td style='border:solid black 1.0pt;' >QRIS</td>
  <td style='border:solid black 1.0pt;' > MANDIRI</td>
  <td style='border:solid black 1.0pt;' nowrap>BCA</td>
  <td style='border:solid black 1.0pt;' nowrap>BPD</td>
  <td style='border:solid black 1.0pt;' nowrap>BRI</td>
  <td style='border:solid black 1.0pt;' nowrap>DLL</td>
 </tr>
          <?php error_reporting(0);
           $tgl_awal=$_POST['tglawal'];
    $tgl_akhir=$_POST['tgllakhir'];
  
            $no =1;
            if(isset($_POST['pencarian'])){
               $level_driver=$koneksi->query("SELECT * FROM laporanharian as l,driver as d where  l.id_driver=d.id_driver and tgllaporan between '$tgl_awal' and '$tgl_akhir' ");
            }else{
            $level_driver=$koneksi->query("SELECT * FROM laporanharian as l,driver as d where l.id_driver=d.id_driver  order by tgllaporan desc");

}
            while($m=mysqli_fetch_array($level_driver)){

              $income+=$m['income'];

              $jml_order+=$m['jmlorderan'];
              $kode_order+=$m['anaksekolah'];
              $jumlahsetoran+=$m['setoran'];
$nom=1;
              $level_dri=$koneksi->query("SELECT * FROM detaillaporanharian where   id_driver='$m[id_driver]' and tgllaporanharian='$m[tgllaporan]'  order by id_laporanharian asc");
            while($mon=mysqli_fetch_array($level_dri)){
              $modal+=$mon['modal'];
              $kantorplus+=$mon['kantorplus'];
              $neracaplus=$modal+$income+$kantorplus;
              $bon+=$mon['bon'];
              $qris+=$mon['qris'];
              $man+=$mon['man'];
              $bca+=$mon['bca'];
              $bpd+=$mon['bpd'];
              $bri+=$mon['bri'];
              $dll+=$mon['dll'];
              $kantorminus+=$mon['kantorminus'];
              $neracamin=$bon+$qris+$man+$bca+$bpd+$bri+$dll+$kantorminus;
          ?> 
<tr>
  <?php if($nom == 1){?>
  <td style='border:solid black 1.0pt;' nowrap rowspan="4"><?= $no;?></td>
  <td style='border:solid black 1.0pt;' nowrap rowspan="4">  
                                    <div class="container"><?= tgl_indonesia($m['tgllaporan']);?><br>
       <?php if($m['status']=="Terlapor"){?>
    Laporan Belum di Validasi<br>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?= $nom;?>">
          <i class="fa fa-check">Validasi Laporan</i>
        </button>
<?php }else{ echo "Laporan $m[status]";}?><br><p></p>
<a href="?page=page/laporanharian/detailadmin&id_driver=<?php echo $m['id_driver'];?>&tanggal=<?php echo $m['tgllaporan'];?>&data=Edit Data Laporan Harian" class="btn btn-success">
                                        <i class="fas fa-eye">Lihat Detail Laporan</i>
                                    </a>
        <div class="modal" id="myModal<?= $nom;?>">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-header">
                        <h4 class="modal-title">Validasi Laporan Harian</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


<form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body">
   <input type="hidden" name="id" value="<?= $m['id_laporan'];?>">

                    <H5>   <button class="btn btn-success"><input type="radio" name="status" value="Di Terima"></button>Di Terima
                       <button class="btn btn-danger"><input type="radio" name="status" value="Di Terima"></button>Di Tolak</H5>

<textarea name="kettolak" class="form-control" placeholder="Keterangan Jika di Tolak"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button  type="submit" name="verifikasi" class="btn btn-success">Validasi</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
                                     </td>
  
  <td style='border:solid black 1.0pt;' nowrap rowspan="4"><?= $m['nama_driver'];?></td>

  <td style='border:solid black 1.0pt;' rowspan="4"><?= $m['jmlorderan'];?></td>
  <td style='border:solid black 1.0pt;' rowspan="4"><?= $m['anaksekolah'];?></td>
<?php }else{}?>
  <td style='border:solid black 1.0pt;'><?php if(empty($mon['modal'])){}else{ ?>Rp. <?=number_format($mon['modal'],0,",",".");}?></td>
  <?php if($nom == 1){?>
  <td style='border:solid black 1.0pt;'rowspan="4"><?php if(empty($m['income'])){}else{ ?>Rp. <?=number_format($m['income'],0,",",".");}?></td>
<?php }else{}?>
  <td style='border:solid black 1.0pt;'><?php if(empty($mon['kantorplus'])){}else{ ?>Rp. <?=number_format($mon['kantorplus'],0,",",".");}?></td>
  <td style='border:solid black 1.0pt;' nowrap><?= $mon['keterangan'];?></td>
  <td style='border:solid black 1.0pt;'> <?php if(empty($mon['bon'])){}else{ ?>Rp. <?=number_format($mon['bon'],0,",",".");}?></td>
  <td style='border:solid black 1.0pt;' ><?php if(empty($mon['qris'])){}else{ ?>Rp. <?=number_format($mon['qris'],0,",",".");}?></td>
  <td style='border:solid black 1.0pt;' ><?php if(empty($mon['man'])){}else{ ?>Rp. <?=number_format($mon['man'],0,",",".");}?></td>
  <td style='border:solid black 1.0pt;' nowrap><?php if(empty($mon['bca'])){}else{ ?>Rp. <?=number_format($mon['bca'],0,",",".");}?></td>
  <td style='border:solid black 1.0pt;' nowrap><?php if(empty($mon['bpd'])){}else{ ?>Rp. <?=number_format($mon['bpd'],0,",",".");}?></td>
  <td style='border:solid black 1.0pt;' nowrap><?php if(empty($mon['bri'])){}else{ ?>Rp. <?=number_format($mon['bri'],0,",",".");}?></td>
  <td style='border:solid black 1.0pt;' nowrap><?php if(empty($mon['dll'])){}else{ ?>Rp. <?=number_format($mon['dll'],0,",",".");}?></td>
  <td style='border:solid black 1.0pt;' nowrap><?php if(empty($mon['kantorminus'])){}else{ ?>Rp. <?=number_format($mon['kantorminus'],0,",",".");}?></td>
  <td style='border:solid black 1.0pt;' nowrap><?= $mon['keteranganmin'];?></td>
   <?php if($nom == 1){?>
  <td style='border:solid black 1.0pt;' nowrap rowspan="4"><?php if(empty($m['setoran'])){}else{ ?>Rp. <?=number_format($m['setoran'],0,",",".");}?></td>
<?php }else{}?>
 </tr>
<?php $nom++; }?>
 <?php $no++; } ?>
<tr>
 
  <td style='border:solid black 1.0pt;' nowrap colspan="3"><b>Total</b></td>

  <td style='border:solid black 1.0pt;'><?= $jml_order;?></td>
  <td style='border:solid black 1.0pt;' ><?= $kode_order ?></td>
  <td style='border:solid black 1.0pt;'>Rp. <?= number_format($modal,0,",",".");?></td>
  <td style='border:solid black 1.0pt;'>Rp. <?= number_format($income,0,",",".");?></td>
  <td style='border:solid black 1.0pt;'>Rp. <?= number_format($kantorplus,0,",",".");?></td>
  <td style='border:solid black 1.0pt;' nowrap></td>
  <td style='border:solid black 1.0pt;'>Rp. <?= number_format($bon,0,",",".");?></td>
  <td style='border:solid black 1.0pt;' >Rp. <?= number_format($qris,0,",",".");?></td>
  <td style='border:solid black 1.0pt;' >Rp. <?= number_format($man,0,",",".");?></td>
  <td style='border:solid black 1.0pt;' nowrap>Rp <?= number_format($bca,0,",",".");?></td>
  <td style='border:solid black 1.0pt;' nowrap>Rp. <?= number_format($bpd,0,",",".");?></td>
  <td style='border:solid black 1.0pt;' nowrap>Rp. <?= number_format($bri,0,",",".");?></td>
  <td style='border:solid black 1.0pt;' nowrap>Rp. <?= number_format($dll,0,",",".");?></td>
  <td style='border:solid black 1.0pt;' nowrap>Rp. <?= number_format($kantorminus,0,",",".");?></td>
  <td style='border:solid black 1.0pt;' nowrap></td>
  
  <td style='border:solid black 1.0pt;' > Rp. <?= number_format($neracaplus-$neracamin,0,",",".");?></td>

 </tr>
 <tr>
 
  <td style='border:solid black 1.0pt;' nowrap colspan="3"><b>Balance</b></td>

  <td style='border:solid black 1.0pt;background-color: blue;' nowrap colspan="6"><center><b style="color: white;">Rp. <?= number_format($modal+$income+$kantorplus,0,",",".");?></b></center></td>

  <td style='border:solid black 1.0pt;background-color: red;' nowrap  nowrap colspan="10"><center><b style="color:white;">Rp. <?= number_format($bon+$qris+$man+$bca+$bri+$dll+$neracaplus-$neracamin,0,",",".");?></b></center></td>

 </tr>
</table>

                            </div>
                        </div>
                    </div>

                </div>

  <?php if(isset($_POST['verifikasi'])){

    $mas=$koneksi->query("UPDATE laporanharian SET 
                    status     = '$_POST[status]',
                    kettolak='$_POST[kettolak]'
                    WHERE id_laporan='$_POST[id]'");
    echo"<script>alert('Data  Berhasil di Validasi !!!'); window.location = '?page=page/laporanharian/indexadmin'</script>";
  }?>