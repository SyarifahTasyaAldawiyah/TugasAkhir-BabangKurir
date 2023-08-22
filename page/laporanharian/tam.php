
   <?php
error_reporting(0);
include_once 'dbcon.php';

if(isset($_POST['save_mul']))
{   
  $total = $_POST['total'];
    
  for($i=1; $i<=$total; $i++)
  {
    $fn = $_POST["fname$i"];
    $ln = $_POST["lname$i"];    
    $sql="INSERT INTO users(first_name,last_name) VALUES('".$fn."','".$ln."')";
    $sql = $MySQLiconn->query($sql);    
  }
  
  if($sql)
  {
    ?>
        <script>
    alert('<?php echo $total." records was inserted !!!"; ?>');
    window.location.href='index.php';
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
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['idk'];?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           
                        </div>
                        <div class="card-body" style="background-color: ;">
                            <div class="table-responsive">
                                
<?php
if(isset($_POST['btn-gen-form']))
{
  ?>
<form class="user" action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="total" value="<?php echo $_POST["no_of_rec"]; ?>" />
  Tanggal Laporan Harian <input type="date" name="tgllaporanharian"  />

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
  for($i=1; $i<=$_POST["no_of_rec"]; $i++) 
  {
    for($s=1; $i<=$_POST["no_of_rec"]*; $s++) {
    ?>
<tr>
  <td style='border:solid black 1.0pt;' nowrap rowspan="4">
<select type="text" name="id_driver[]"  >
                  <option>Pilih Driver</option>
     <?php 
            $no =1;
            $driver=$koneksi->query("SELECT * FROM driver as d, level_driver as l where d.id_level=l.id_level   order by id_driver desc");
            while($m=mysqli_fetch_array($driver)){
                   
          ?> 
                  <option value="<?= $m['id_driver'];?>"><?= $m['nama_driver'];?> - (<?= $m['nama_level'];?>)</option>
                <?php }?>
              </select>
  </td>
  <td width="20" style='border:solid black 1.0pt;' nowrap rowspan="4">
      <input type="number" name="jml_order[]" placeholder="Enter Jumlah Order" >
  </td>
  <td style='border:solid black 1.0pt;' nowrap rowspan="4">
              <select type="text" name="kode_order[]"  >
                  <option>Pilih Jenis Order</option>
                  <option>AnAK SEKOLAH</option>
              </select>
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="modal[]" placeholder="Enter Modal" value="<?= $i;?>" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="income[]" placeholder="Enter Income" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorplus[]" placeholder="Enter Kantor (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keterangan[]" placeholder="Enter Keterangan (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="bon[]" placeholder="Enter BON" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="qris[]" placeholder="Enter QRIS" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="man[]" placeholder="Enter MAN" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bca[]" placeholder="Enter BCA" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bpd[]" placeholder="Enter BPD" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bri[]" placeholder="Enter BRI" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="dll[]" placeholder="Enter DLL" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorminus[]" placeholder="Enter Kantor (-)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keteranganmin[]" placeholder="Enter Keterangan (-)" >
  </td>
 </tr>
<tr>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="modal[]" placeholder="Enter Modal" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="income[]" placeholder="Enter Income" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorplus[]" placeholder="Enter Kantor (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keterangan[]" placeholder="Enter Keterangan (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="bon[]" placeholder="Enter BON" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="qris[]" placeholder="Enter QRIS" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="man[]" placeholder="Enter MAN" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bca[]" placeholder="Enter BCA" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bpd[]" placeholder="Enter BPD" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bri[]" placeholder="Enter BRI" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="dll[]" placeholder="Enter DLL" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorminus[]" placeholder="Enter Kantor (-)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keteranganmin[]" placeholder="Enter Keterangan (-)" >
  </td>
 </tr>
<tr>
 <td style='border:solid black 1.0pt;'>
        <input type="number" name="modal[]" placeholder="Enter Modal" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="income[]" placeholder="Enter Income" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorplus[]" placeholder="Enter Kantor (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keterangan[]" placeholder="Enter Keterangan (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="bon[]" placeholder="Enter BON" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="qris[]" placeholder="Enter QRIS" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="man[]" placeholder="Enter MAN" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bca[]" placeholder="Enter BCA" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bpd[]" placeholder="Enter BPD" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bri[]" placeholder="Enter BRI" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="dll[]" placeholder="Enter DLL" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorminus[]" placeholder="Enter Kantor (-)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keteranganmin[]" placeholder="Enter Keterangan (-)" >
  </td>
 </tr>
<tr>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="modal[]" placeholder="Enter Modal" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="income[]" placeholder="Enter Income" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorplus[]" placeholder="Enter Kantor (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keterangan[]" placeholder="Enter Keterangan (+)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="bon[]" placeholder="Enter BON" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="qris[]" placeholder="Enter QRIS" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="man[]" placeholder="Enter MAN" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bca[]" placeholder="Enter BCA" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bpd[]" placeholder="Enter BPD" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="bri[]" placeholder="Enter BRI" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="dll[]" placeholder="Enter DLL" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="number" name="kantorminus[]" placeholder="Enter Kantor (-)" >
  </td>
  <td style='border:solid black 1.0pt;'>
        <input type="text" name="keteranganmin[]" placeholder="Enter Keterangan (-)" >
  </td>
 </tr>
  <?php
  }
  ?>

 <tr>
    <td colspan="3">
    
    <button type="submit" name="save_mul" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Simpan</button> 

    <a href="?page=page/laporanharian/index&id=Data Laporan Harian" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Kembali</a>
    
    </td>
    </tr>

</table>
</form>
<?php
}
?>
                            </div>
                        </div>
                    </div>

                </div>

  