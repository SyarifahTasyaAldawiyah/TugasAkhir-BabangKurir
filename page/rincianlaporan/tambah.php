  

  <?php


if(isset($_POST['simpan']))
{   
  $total = $_POST['total'];
             
    $tglorder = $_POST["tglorder"];          
    $anak = $_POST["anaksekolah"];          
    $id_driver = $_SESSION["id"];   

  for($i=1; $i<=$total; $i++)
  {
    
    $alamat = $_POST["alamatorderan$i"]; 
    $jenisorderan = $_POST["jenisorderan$i"];         
    $jmlorderan = $_POST["jmlorderan$i"];         
    $titik = $_POST["titik$i"];         
    $ttlbelanja = $_POST["ttlbelanja$i"];         
    $ongkir = $_POST["ongkir$i"];         
    $keterangan = $_POST["keterangan$i"];     
    $file_name = $_FILES["file$i"]["name"];
        $tmp_name = $_FILES["file$i"]["tmp_name"];     
if(empty($file_name)){
  $sql=$koneksi->query( "INSERT INTO detailorderan SET 
        alamatorderan = '$alamat',
        id_driver = '$id_driver',
        tglorder = '$tglorder',   
        jenisorderan = '$jenisorderan',   
        jmlorderan = '$jmlorderan',   
        titik = '$titik',   
        keterangan = '$keterangan',   
        ttlbelanja = '$ttlbelanja',   
        ongkir = '$ongkir',   
        keorder = 'Sukses', 
        status = 'Baru'");
}else{
  

  $sql=$koneksi->query( "INSERT INTO detailorderan SET 
         alamatorderan = '$alamat',
        id_driver = '$id_driver',
        tglorder = '$tglorder',   
        jenisorderan = '$jenisorderan',   
        jmlorderan = '$jmlorderan',   
        titik = '$titik',   
        keterangan = '$keterangan',   
        ttlbelanja = '$ttlbelanja',   
        ongkir = '$ongkir',   
        keorder = 'Cancel',   
        status = 'Baru',
        file='$file_name'

        ");
   move_uploaded_file($tmp_name, "img/order/".$file_name);

  }
 
}

  $driver=$koneksi->query("SELECT * FROM driver as d, level_driver as l where d.id_level=l.id_level and d.id_driver='$_SESSION[id]'   order by id_driver desc");
            $m=mysqli_fetch_array($driver);
    
            
            $admina=$koneksi->query("SELECT * FROM detailorderan where keorder='Sukses'  order by id_detailorder desc");
            while($ma=mysqli_fetch_array($admina)){
$jmlor+=$ma['jmlorderan'];
$income+=$ma['ongkir'];
            }
                   
          
            if($m['nama_level']=="STARKAN"){ $gaji=$income*$m[persentase]/100 ;}else{  $gaji=$income-$m[persentase]; }
$input=$koneksi->query( "INSERT INTO laporanharian SET
        id_driver = '$id_driver',     
        tgllaporan = '$tglorder',     
        komisi = '$m[persentase]',
        income ='$income',
        gaji ='$gaji',
        anaksekolah ='$anak',
        jmlorderan='$jmlor'

        ");
if($sql)
  {
    ?>
        <script>
    alert('data Orderan Berhasil di input');
    window.location.href='?page=page/rincianlaporan/index';
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert('data Orderan Gagal di input');
    </script>
        <?php
  }
}
?>

  <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Laporan Orderan</h1>
                 
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
  Tanggal Laporan <input type="date" name="tglorder"  required="">
  Jumlah Anak Sekolah <input type="number" name="anaksekolah" value="0" required="">
  <input type="hidden" name="total" value="<?php echo $_POST["no_of_rec"]; ?>" />
 <table class="table" cellspacing="0">
                                   
                                        <tr>
                                            <th ></th>
                                            <th >Alamat</th>
                                            <th >Jenis Order</th>
                                            <th >Jumlah Orderan</th>
                                            <th >Titik</th>
                                            <th >Total Belanja</th>
                                            <th >Ongkir</th>
                                            <th >Catatan</th>
                                            <th >Pembatalan Orderan</th>
                                        </tr>
                                        <?php 
  for($i=1; $i<=$_POST["no_of_rec"]; $i++) 
  {
    ?>
                                    
                                 <tr>
                                  <th><?= $i;?></th>
                                  <th><input type='text' class=''name='alamatorderan<?= $i;?>'></th> 
                                  <th>
                                    <select type='text' name='jenisorderan<?= $i;?>' required> 
                                    <option>Pilih Jenis Order</option>  
                                    <?php $no=1;$tampil = $koneksi->query('SELECT *FROM kode_order  ');while($m=mysqli_fetch_array($tampil)){  ?>
                                      <option value='<?= $m['id_kode'];?>'><?= $m['nama_order'];?> (<?= $m['code_order'];?>)</option><?php }?> 
                                    </select> 
                                  </th>
                                  <th><input type='number' class=''name='jmlorderan<?= $i;?>'></th>
                                  <th><input type='number' class=''name='titik<?= $i;?>'></th>
                                  <th><input type='number' class=''name='ttlbelanja<?= $i;?>'></th>
                                  <th><input type='number' class='' name='ongkir<?= $i;?>'></th>
                                  <th><input type='text' class=''name='keterangan<?= $i;?>'></th>
                                  <th><input type='file' class=''name='file<?= $i;?>'></th>
                                   </tr>
                             <?php
  }
  ?>
                                </table>

                              <div id="insert-form"></div>
 <div class="form-group mb-n">
                                    <div class="col-sm-8">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
            <a href="?page=page/rincianlaporan/index" type="button"class = "btn btn-danger">Kembali</a>
        </div>
        </div>
</form>
<?php
}
?>
                              


                </div>
                        </div>
                    </div>

                </div>

