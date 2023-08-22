  

  <?php


if(isset($_POST['save_mul']))
{   
  $total = 4;
    $tgllaporanharian = $_POST["tgllaporanharian"];
    $id_driver = $_POST["id_driver"];
        $pendapatan = $_POST["pendapatan"];
$input=$koneksi->query( "INSERT INTO laporanharian SET
        id_driver = '$id_driver',     
        tgllaporan = '$tgllaporanharian',     
        komisi = '$pendapatan' 
        ");
  for($i=1; $i<=$total; $i++)
  {
    
    $jml_order = $_POST["jml_order$i"];    
    $kode_order = $_POST["kode_order$i"];

    $modal = $_POST["modal$i"];    
    $income = $_POST["income$i"];    
    $kantorplus = $_POST["kantorplus$i"];    
    $keterangan = $_POST["keterangan$i"];    
    $bon = $_POST["bon$i"];    
    $qris = $_POST["qris$i"];    
    $man = $_POST["man$i"];    
    $bca = $_POST["bca$i"];      
    $bpd = $_POST["bpd$i"];      
    $bri = $_POST["bri$i"];      
    $dll = $_POST["dll$i"];      
    $kantorminus = $_POST["kantorminus$i"];      
    $keteranganmin = $_POST["keteranganmin$i"];      
if($kode_order=="Pilih Jenis Order"){
  $sql=$koneksi->query( "INSERT INTO detaillaporanharian SET 
        
        tgllaporanharian = '$tgllaporanharian',
        id_driver = '$id_driver',
        jml_order = '$jml_order', 
        kode_order = '',   
        modal = '$modal',   
        income = '$income',   
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
}else{
    $sql=$koneksi->query( "INSERT INTO detaillaporanharian SET 
        
        tgllaporanharian = '$tgllaporanharian',
        id_driver = '$id_driver',
        jml_order = '$jml_order', 
        kode_order = '$kode_order',   
        modal = '$modal',   
        income = '$income',   
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
  }
  $level_dri=$koneksi->query("SELECT * FROM detaillaporanharian where   id_driver='$id_driver' and tgllaporanharian='$tgllaporanharian' order by id_laporanharian asc");
            while($mon=mysqli_fetch_array($level_dri)){
              $modal+=$mon['modal'];
              $income+=$mon['income'];
              $kantorplus+=$mon['kantorplus'];
              
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
                    neracaplus     = '$neracaplus'
                    WHERE id_driver='$id_driver' and tgllaporan='$tgllaporanharian'");

            

  
  if($sql)
  {
    ?>
        <script>
    alert('data berhasil di input');
    window.location.href='?page=page/laporanharian/index&id=Data Laporan Harian';
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert('error while inserting , TRY AGAIN');
    </script>
        <?php
  }
}
?>
  <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           
                        </div>
                        <div class="card-body" style="background-color: ;">
                            <div class="table-responsive">
                                

<form class="user" action="" method="post" enctype="multipart/form-data">
  Tanggal Laporan Harian <input type="date" name="tgllaporanharian"  required="">

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
  for($i=1; $i<=4; $i++) 
  {
    ?>
<tr>
  <?php if($i == 1){?>
  <td style='border:solid black 1.0pt;' nowrap rowspan="4">

     <?php 
            $no =1;
            $driver=$koneksi->query("SELECT * FROM driver as d, level_driver as l where d.id_level=l.id_level and d.id_driver='$_GET[kode]'   order by id_driver desc");
            $m=mysqli_fetch_array($driver);
                   
          ?> 
          <?= $m['nobb'];?>
          <?= $m['nama_driver'];?>
  </td>
<?php }else{}?>
  <td width="20" style='border:solid black 1.0pt;' nowrap>
    <input type="hidden" name="id_driver" value="<?= $m['id_driver'];?>" >
    <input type="hidden" name="pendapatan" value="<?= $m['persentase'];?>" >
      <input type="number" name="jml_order<?php echo $i; ?>" placeholder="Enter Jumlah Order" >
  </td>
  <td style='border:solid black 1.0pt;' nowrap>
              <select type="text" name="kode_order<?php echo $i; ?>"  >
                  <option>Pilih Jenis Order</option>
                   <?php 
            $no =1;
            $ordd=$koneksi->query("SELECT * FROM kode_order  order by id_kode desc");
            while($ord=mysqli_fetch_array($ordd)){
                   
          ?> 
                  <option value="<?= $ord['code_order'];?>"><?= $ord['nama_order'];?></option>
                <?php }?>
              </select>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="modal<?php echo $i; ?>" placeholder="Enter Modal" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="income<?php echo $i; ?>" placeholder="Enter Income" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorplus<?php echo $i; ?>" placeholder="Enter Kantor (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keterangan<?php echo $i; ?>" placeholder="Enter Keterangan (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="bon<?php echo $i; ?>" placeholder="Enter BON" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="qris<?php echo $i; ?>" placeholder="Enter QRIS" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="man<?php echo $i; ?>" placeholder="Enter MAN" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bca<?php echo $i; ?>" placeholder="Enter BCA" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bpd<?php echo $i; ?>" placeholder="Enter BPD" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bri<?php echo $i; ?>" placeholder="Enter BRI" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="dll<?php echo $i; ?>" placeholder="Enter DLL" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorminus<?php echo $i; ?>" placeholder="Enter Kantor (-)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keteranganmin<?php echo $i; ?>" placeholder="Enter Keterangan (-)" >
  </td>
 </tr>
 
<?php } ?>
 
<tr>
    <td colspan="3">
    
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

  