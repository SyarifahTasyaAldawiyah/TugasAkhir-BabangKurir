 
  <script src="tampilan/jquery.min.js" type="text/javascript"></script>
  <script src="my.js" type="text/javascript"></script>
  

  <?php
 
            $lh=$koneksi->query("SELECT * FROM laporanharian where id_driver='$_GET[id_driver]'  and tgllaporan='$_GET[tanggal]'");
            $dlh=mysqli_fetch_array($lh);
 $pa=mysqli_num_rows($koneksi->query("SELECT * from detailorderan where id_driver='$_GET[id_driver]' and tglorder='$_GET[tanggal]' "));
if(isset($_POST['simpan']))
{   

  $status = $_POST['status'];
  $kettolak = $_POST['kettolak'];
             
    $id_laporan= $_POST["id_laporan"];
   
      $sql=$koneksi->query( "UPDATE laporanharian SET 

        
        status = '$status',
        kettolak = '$kettolak' 
        WHERE id_laporan='$id_laporan'
        ");     

 

if($sql)
  {
    ?>
      <script>
    alert('Laporan Berhasil berhasil di Validasi');
    window.location.href='?page=page/laporanharian/indexadmin';
    </script> 
        <?php
  }
  else
  {
    ?>
        <script>
    alert('Laporan Gagal di Validasi ');
    </script>
        <?php
  }
}
?>
 <?php 
            $i =1;
            $driver=$koneksi->query("SELECT * FROM driver as d, level_driver as l where d.id_level=l.id_level and d.id_driver='$_GET[id_driver]'   order by id_driver desc");
            $m=mysqli_fetch_array($driver);
            $level_driver=$koneksi->query("SELECT * FROM laporanharian  where id_driver='$_GET[id_driver]' and tgllaporan='$_GET[tanggal]' order by tgllaporan desc");

            $edit=mysqli_fetch_array($level_driver);
                   
          ?> 
   <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['data'];?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           
                        </div>
                        <div class="card-body" style="background-color: ;">
                            <div class="table-responsive">
                                

 <div id="angka">
            
         <form class="user" action="" method="post" enctype="multipart/form-data">
           <div id="input">
  Detail Laporan Harian <input type="date" name="tgllaporanharian"  value="<?= $_GET['tanggal'];?>" readonly>
  <input type="hidden" name="total"  value="4">
 
<table style='border:solid black 1.0pt;' class="table table-bordered" id="dataTable" border="1" cellspacing="0" >
                                   
<tr style="background-color: #1cc88a; color: black; text-align: center;">

  <td  style='border:solid black 1.0pt;' rowspan="2">NAMA</td>
  <td style='border:solid black 1.0pt;' colspan="2" rowspan="2" >ODR</td>
  <td style='border:solid black 1.0pt;' rowspan="2" >MODAL</td>
  <td style='border:solid black 1.0pt;' rowspan="2">INCOME</td>
  <td style='border:solid black 1.0pt;' rowspan="2" > KANTOR (+)</td>
  <td style='border:solid black 1.0pt;' nowrap rowspan="2" > KETERANGAN</td> 
  <td style='border:solid black 1.0pt;' rowspan="2">BON</td>
  <td style='border:solid black 1.0pt;' nowrap colspan="6" ><center>TRANSFER</center></td>
  <td style='border:solid black 1.0pt;' nowrap rowspan="2" >KANTOR (-)</td>
  <td style='border:solid black 1.0pt;' nowrap rowspan="2" >KETERANGAN</td>
 </tr>
<tr style='border:solid black 1.0pt;text-align:center;background-color: #f6c23e; color: black;'>
  <td style='border:solid black 1.0pt;' >QRIS</td>
  <td style='border:solid black 1.0pt;' > MAN</td>
  <td style='border:solid black 1.0pt;' nowrap>BCA</td>
  <td style='border:solid black 1.0pt;' nowrap>BPD</td>
  <td style='border:solid black 1.0pt;' nowrap>BRI</td>
  <td style='border:solid black 1.0pt;' nowrap>DLL</td>
 </tr>

     
 <?php 
 $no=1;
  $level_dri=$koneksi->query("SELECT * FROM detaillaporanharian where   id_driver='$edit[id_driver]' and tgllaporanharian='$edit[tgllaporan]' order by id_laporanharian asc");
            while($mon=mysqli_fetch_array($level_dri)){
    ?>
<tr>
  <?php if($i == 1){?>
  <td style='border:solid black 1.0pt;' nowrap rowspan="4">
<input type="hidden" name="id_laporan" value="<?= $edit['id_laporan'];?>" >
    <input type="hidden" name="id_driver" value="<?= $m['id_driver'];?>" >
          <?= $m['nama_driver'];?>
  </td>
 
  <td style='border:solid black 1.0pt;' nowrap rowspan="4">

          <?= $edit['jmlorderan'];?>
  </td><td style='border:solid black 1.0pt;' nowrap rowspan="4">

          <?= $edit['anaksekolah'];?>
  </td>
<?php }else{}?>
 
  <td style='border:solid black 1.0pt;'>

    <input type="hidden" name="id_laporan" value="<?= $dlh['id_laporan'];?>" >
        <input type="text" name="modal<?=$no;?>" value="<?=number_format($mon['modal'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly>
  </td>
  <?php if($i == 1){?>
  <td style='border:solid black 1.0pt;'rowspan="4">
        <input type="hidden" name="income" value="<?=number_format($edit['income'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly><?=number_format($edit['income'],0,",",".");?>
  </td>
  <?php }else{}?>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorplus<?=$no;?>" value="<?=number_format($mon['kantorplus'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keterangan<?=$no;?>" value="<?= $mon['keterangan'];?>" readonly>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="bon<?=$no;?>" value="<?=number_format($mon['bon'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="qris<?=$no;?>" value="<?=number_format($mon['qris'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="man<?=$no;?>"value="<?=number_format($mon['man'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bca<?=$no;?>" value="<?=number_format($mon['bca'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bpd<?=$no;?>"value="<?=number_format($mon['bpd'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bri<?=$no;?>" value="<?=number_format($mon['bri'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="dll<?=$no;?>" value="<?=number_format($mon['dll'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorminus<?=$no;?>" value="<?=number_format($mon['kantorminus'],0,",",".");?>" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' readonly>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keteranganmin<?=$no;?>" value="<?= $mon['keteranganmin'];?>" readonly="">
  </td>
 </tr>
 
<?php $no++; $i++;} ?>
 
<tr>
    <td colspan="16">
    
    <div class="form-group mb-n">
                                    <div class="col-sm-8">
                                       
                                       
        </div>
        </div>
                                <div class="form-group mb-n">
                                    <div class="col-sm-8">
                                       
            <a href="?page=page/laporanharian/indexadmin" type="button"class = "btn btn-danger">Kembali</a>
        </div>
        </div>
    </td>
    </tr>
</table>

</form>

                            </div>
                        </div>
                    </div>

                </div>

  