  

  <?php

$adminaa=$koneksi->query("SELECT * FROM laporanharian where id_driver='$_SESSION[id]' and tgllaporan='$_GET[id]'  order by id_laporan desc");
            $ma=mysqli_fetch_array($adminaa);
            

if(isset($_POST['save_mul']))
{   
  $total = 4;
    $tgllaporanharian = $_POST["tgllaporanharian"];
    $id_driver = $_SESSION["id"];
        $pendapatan = $_POST["pendapatan"];
        $income = $_POST["income"];

  for($i=1; $i<=$total; $i++)
  {
    

    $modal = str_replace(".","",$_POST["modal$i"]);      
    $kantorplus = str_replace(".","",$_POST["kantorplus$i"]);    
    $keterangan = $_POST["keterangan$i"];    
    $bon = str_replace(".","",$_POST["bon$i"]);    
    $qris = str_replace(".","",$_POST["qris$i"]);    
    $man = str_replace(".","",$_POST["man$i"]);    
    $bca = str_replace(".","",$_POST["bca$i"]);      
    $bpd = str_replace(".","",$_POST["bpd$i"]);      
    $bri = str_replace(".","",$_POST["bri$i"]);      
    $dll = str_replace(".","",$_POST["dll$i"]);      
    $kantorminus = str_replace(".","",$_POST["kantorminus$i"]);      
    $keteranganmin = $_POST["keteranganmin$i"];      

    $sql=$koneksi->query( "INSERT INTO detaillaporanharian SET 
        
        tgllaporanharian = '$tgllaporanharian',
        id_driver = '$id_driver',   
        modal = '$modal',   
        kantorplus = '$kantorplus',   
        keterangan = '$keterangan',   
        bon = '$bon',   
        qris = '$qris',   
        man = '$man',   
        bca = '$bca',     
        bpd = '$bpd',     
        bri = '$bri',     
        dll = '$dll',     
        kantorminus = '$kantorminus',     
        keteranganmin = '$keteranganmin'
        ");  
         
  }
  $level_dri=$koneksi->query("SELECT * FROM detaillaporanharian where   id_driver='$id_driver' and tgllaporanharian='$tgllaporanharian' order by id_laporanharian asc");
            while($mon=mysqli_fetch_array($level_dri)){
              $modal+=$mon['modal'];
              $kantorplus+=$mon['kantorplus'];
              $bont+=$mon['bon'];
              
              $bon+=$mon['bon'];
              $qris+=$mon['qris'];
              $man+=$mon['man'];
              $bca+=$mon['bca'];
              $bpd+=$mon['bpd'];
              $bri+=$mon['bri'];
              $dll+=$mon['dll'];
              $kantorminus+=$mon['kantorminus'];
              
            }
            $neracaplus=$modal+$income+$kantorplus;
            $neracamin=$bon+$qris+$man+$bca+$bpd+$bri+$dll+$kantorminus;
            $setoran= $neracaplus-$neracamin;
            $koneksi->query("UPDATE laporanharian SET 
                    setoran     = '$setoran',
                    neracamin     = '$neracamin',
                    neracaplus     = '$neracaplus',
                    bon     = '$bont',
                    status     = 'Terlapor'
                    WHERE id_laporan='$_POST[id_laporan]'");
            $mas=$koneksi->query("UPDATE detailorderan SET 
                    status     = 'Terlapor'
                    WHERE tglorder='$tgllaporanharian' and id_driver='$_SESSION[id]'");

            

  
  if($sql)
  {
    ?>
   <script>
    alert('data Laporan Berhasil di input');
    window.location.href='?page=page/rincianlaporan/index';
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert('data Laporan Gagal di input');
    </script>
        <?php
  }
}
?>
  <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Buat aporan Harian</h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           
                        </div>
                        <div class="card-body" style="background-color: ;">
                            <div class="table-responsive">
                                 
 <div id="angka">
            
       <form class="user" action="" method="post" enctype="multipart/form-data">
           <div id="input">

  Tanggal Laporan Harian <input type="date" name="tgllaporanharian" value="<?= $_GET['id'];?>">
   <input type="hidden" name="id_laporan" value="<?= $ma['id_laporan'];?>">

<table style='border:solid black 1.0pt;' class="table table-bordered" id="dataTable" border="1" cellspacing="0" >
                                   
<tr>

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
<tr style='border:solid black 1.0pt;'>
  <td style='border:solid black 1.0pt;' >QRIS</td>
  <td style='border:solid black 1.0pt;' > MAN</td>
  <td style='border:solid black 1.0pt;' nowrap>BCA</td>
  <td style='border:solid black 1.0pt;' nowrap>BPD</td>
  <td style='border:solid black 1.0pt;' nowrap>BRI</td>
  <td style='border:solid black 1.0pt;' nowrap>DLL</td>
 </tr>
 <?php 
  for($i=1; $i<=$ma['jmlorderan']; $i++) 
  {
    ?>
<tr>
  <?php if($i == 1){?>
  <td style='border:solid black 1.0pt;' nowrap rowspan="<?= $ma['jmlorderan']?>">

     
          <?= $_SESSION['nama'];?>
  </td>
  <td width="20" style='border:solid black 1.0pt;' rowspan="<?= $ma['jmlorderan']?>">
    <input type="hidden" name="id_driver" value="<?= $m['id_driver'];?>" >
    <input type="hidden" name="pendapatan" value="<?= $m['persentase'];?>" >
    <?= $ma['jmlorderan'];?>
  </td>
  <td style='border:solid black 1.0pt;' rowspan="<?= $ma['jmlorderan']?>">
             <?= $ma['anaksekolah'];?>
  </td>
<?php }else{}?>
  
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="modal<?php echo $i; ?>" placeholder="Enter Modal" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' >
  </td>
  <?php if($i == 1){?>
  <td style='border:solid black 1.0pt;' rowspan="<?= $ma['jmlorderan']?>">
       Rp. <?php echo number_format($ma['income'],0,",","."); ?>
        <input type="hidden" name="income" value="<?= $ma['income'];?>" >
  </td>
  <?php }else{}?>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="kantorplus<?php echo $i; ?>" placeholder="Enter Kantor (+)" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keterangan<?php echo $i; ?>" placeholder="Enter Keterangan (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="bon<?php echo $i; ?>" placeholder="Enter BON" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="qris<?php echo $i; ?>" placeholder="Enter QRIS" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'  >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="man<?php echo $i; ?>" placeholder="Enter MAN" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'  >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="bca<?php echo $i; ?>" placeholder="Enter BCA" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'  >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="bpd<?php echo $i; ?>" placeholder="Enter BPD" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="bri<?php echo $i; ?>" placeholder="Enter BRI" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="dll<?php echo $i; ?>" placeholder="Enter DLL" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="kantorminus<?php echo $i; ?>" placeholder="Enter Kantor (-)" onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keteranganmin<?php echo $i; ?>" placeholder="Enter Keterangan (-)" >
  </td>
 </tr>
 
<?php } ?>
 
<tr>
    <td colspan="16">
    
   <button type="submit" name="save_mul" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Simpan</button> 

    <a href="?page=page/laporanharian/index&id=Data Laporan Harian" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Kembali</a>
    </td>
    </tr>
</table>
</form>

                            </div>
                        </div>
                    </div>

                </div>

  