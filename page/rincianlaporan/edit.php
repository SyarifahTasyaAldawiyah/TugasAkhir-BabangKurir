    <script src="tampilan/jquery.min.js" type="text/javascript"></script>
  <script src="my.js" type="text/javascript"></script>

  <?php
 
            $lh=$koneksi->query("SELECT * FROM laporanharian where id_driver='$_GET[id_driver]'  and tgllaporan='$_GET[id]'");
            $dlh=mysqli_fetch_array($lh);
 $pa=mysqli_num_rows($koneksi->query("SELECT * from detailorderan where id_driver='$_GET[id_driver]' and tglorder='$_GET[id]' "));
if(isset($_POST['simpan']))
{   
  $total = $_POST['total'];
             
    $tglorder = $_POST["tglorder"];          
    $anak = $_POST["anaksekolah"];          
    $id_driver = $_SESSION["id"];   

  for($i=1; $i<=$total; $i++)
  {
    
    $id_detailorder = $_POST["id_detailorder$i"]; 
    $jenisorderan = $_POST["jenisorderan$i"];         
    $jmlorderan = $_POST["jmlorderan$i"];         
    $titik = $_POST["titik$i"];         
    $ttlbelanja =str_replace(".","",$_POST["ttlbelanja$i"]);          
    $id_ongkir = str_replace(".","",$_POST["id_ongkir$i"]);       
    $keorder = $_POST["keterangan$i"];     
    $file_name = $_FILES["file$i"]["name"];
        $tmp_name = $_FILES["file$i"]["tmp_name"]; 
        $lho=$koneksi->query("SELECT * FROM ongkir where id_ongkir='$id_ongkir'");
            $ongkirjek=mysqli_fetch_array($lho); 
            $ongkir = str_replace(".","",$ongkirjek["ongkir"]); 
            $totalongkir=$ongkir*$titik;     
if(empty($file_name)&& $keorder =='Selesai'){
  $sql=$koneksi->query( "UPDATE detailorderan SET 
        
        id_driver = '$id_driver',
        tglorder = '$tglorder',   
        jenisorderan = '$jenisorderan',   
        jmlorderan = '$jmlorderan',   
        titik = '$titik',   
           status='Terlapor', 
        ttlbelanja = '$ttlbelanja',   
        id_ongkir = '$id_ongkir',   
        ongkir = '$ongkir',    
        totalongkir = '$totalongkir',   
        keorder = '$keorder', 
        
        file = '' WHERE id_detailorder='$id_detailorder'
        ");
}elseif(empty($file_name)&& $keorder  =='Batal'){
  $sql=$koneksi->query( "UPDATE detailorderan SET 
        
        id_driver = '$id_driver',
        tglorder = '$tglorder',   
        jenisorderan = '$jenisorderan',   
        jmlorderan = '$jmlorderan',   
        titik = '$titik',   
           status='Terlapor', 
        ttlbelanja = '$ttlbelanja',   
        id_ongkir = '$id_ongkir',   
        ongkir = '$ongkir',    
        totalongkir = '$totalongkir',  
        keorder = '$keorder' WHERE id_detailorder='$id_detailorder'");
}elseif(!empty($file_name)&& $keorder  =='Batal'){
  $sql=$koneksi->query( "UPDATE detailorderan SET 
        
        id_driver = '$id_driver',
        tglorder = '$tglorder',   
        jenisorderan = '$jenisorderan',   
        jmlorderan = '$jmlorderan',   
        titik = '$titik',   
           status='Terlapor', 
        ttlbelanja = '$ttlbelanja',   
        id_ongkir = '$id_ongkir',   
        ongkir = '$ongkir',    
        totalongkir = '$totalongkir',  
        keorder = '$keorder',   
        file='$file_name'
        WHERE id_detailorder='$id_detailorder'

        ");
   move_uploaded_file($tmp_name, "img/order/".$file_name);
 }elseif(!empty($file_name)&& $keorder  =='Selesai'){
  $sql=$koneksi->query( "UPDATE detailorderan SET 
        
        id_driver = '$id_driver',
        tglorder = '$tglorder',   
        jenisorderan = '$jenisorderan',   
        jmlorderan = '$jmlorderan',   
        titik = '$titik',    
        ttlbelanja = '$ttlbelanja',  
        status='Terlapor', 
        id_ongkir = '$id_ongkir',   
        ongkir = '$ongkir',    
        totalongkir = '$totalongkir',  
        keorder = '$keorder',
        file=''
        WHERE id_detailorder='$id_detailorder'

        ");
   move_uploaded_file($tmp_name, "img/order/".$file_name);
}else{
  

  $sql=$koneksi->query( "INSERT INTO detailorderan SET 
         
        id_driver = '$id_driver',
        tglorder = '$tglorder',   
        jenisorderan = '$jenisorderan',   
        jmlorderan = '$jmlorderan',   
        titik = '$titik',
        ttlbelanja = '$ttlbelanja',   
        id_ongkir = '$id_ongkir',   
        ongkir = '$ongkir',    
        totalongkir = '$totalongkir',   
        keorder = '$keorder',
        file='$file_name'
        WHERE id_detailorder='$id_detailorder'

        ");
   move_uploaded_file($tmp_name, "img/order/".$file_name);

  }
 
}

  $driver=$koneksi->query("SELECT * FROM driver as d, level_driver as l where d.id_level=l.id_level and d.id_driver='$_SESSION[id]'   order by id_driver desc");
            $m=mysqli_fetch_array($driver);
    
            
            $admina=$koneksi->query("SELECT * FROM detailorderan where keorder='Selesai'  and tglorder='$_POST[tglorder]' and id_driver='$_SESSION[id]' order by id_detailorder desc");
            while($ma=mysqli_fetch_array($admina)){
$jmlor+=$ma['jmlorderan'];
$income+=$ma['ongkir'];
            }
                   
          
            if($m['nama_level']=="STARKAN"){ $gaji=$income*$m[persentase]/100 ;}else{  $gaji=$income-$m[persentase]; }
$input=$koneksi->query( "UPDATE laporanharian SET
        id_driver = '$id_driver',     
        tgllaporan = '$tglorder',     
        komisi = '$m[persentase]',
        income ='$income',
        gaji ='$gaji',
        anaksekolah ='$anak',
        jmlorderan='$jmlor'
        WHERE id_laporan='$_POST[id_laporan]'

        ");
if($sql)
  {
    ?>
<script>
    alert('data orderan Berhasil di Edit');
    window.location.href='?page=page/rincianlaporan/index';
    </script> 
        <?php
  }
  else
  {
    ?>
 <script>
    alert('data orderan Berhasil di Edit');
    window.location.href='?page=page/rincianlaporan/index';
    </script>  
        <?php
  }
}
?>

  <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Laporan Orderan</h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body" style="background-color: ;">
                            <div class="table-responsive">
                                

  <div id="angka">
            
         <form class="user" action="" method="post" enctype="multipart/form-data">
           <div id="input">
  Tanggal Laporan <input type="date" name="tglorder"  value="<?= $dlh['tgllaporan'];?>">
  Jumlah Anak Sekolah <input type="number" name="anaksekolah"  value="<?= $dlh['anaksekolah'];?>">
  <input type="hidden" name="id_laporan"  value="<?= $dlh['id_laporan'];?>">
  <input type="hidden" name="total" value="<?php echo $pa; ?>" />
 <table class="table" cellspacing="0">
                                   
                                        <tr style="background-color: #1cc88a; color: black;">
                                            <th ></th>
                                            <th >Alamat & Ongkir</th>
                                            <th >Jenis Order</th>
                                            <th >Jumlah Orderan</th>
                                            <th >Titik</th>
                                            <th >Total Belanja</th>
                                          <th colspan="2"><center>Selesai / Batal</center></th>
                                        </tr>
                                  
                                  <?PHP $i=1;  $admina=$koneksi->query("SELECT * FROM detailorderan  where id_driver='$_SESSION[id]' and tglorder='$_GET[id]' order by id_detailorder desc");
            while($ma=mysqli_fetch_array($admina)){

              $tampila = $koneksi->query("SELECT *FROM kode_order where id_kode='$ma[jenisorderan]' ");
                                    $mp=mysqli_fetch_array($tampila);
                                     $tampilah = $koneksi->query("SELECT *FROM ongkir where id_ongkir='$ma[id_ongkir]' ");
                                    $ong=mysqli_fetch_array($tampilah);
              ?>
              
                                 <tr>
                                  <th><input type='hidden' class=''name='ttl' value='<?= $pa;?>'>
                                    <input type='hidden' class=''name='id_detailorder<?= $i;?>' value='<?= $ma['id_detailorder'];?>'><?= $i;?></th>
                                  <th><select name='id_ongkir<?= $i;?>' type='text' required=''>
                                      <option value='<?= $ma['id_ongkir'];?>'><?= $ong['dari'];?> - <?= $ong['ke'];?>  (Rp. <?=  number_format($ong['ongkir'],0,",",".");?>)</option>
                                     <?php $tampilor = $koneksi->query('SELECT *FROM ongkir  ');while($mor=mysqli_fetch_array($tampilor)){  ?>
                                      <option value='<?= $mor['id_ongkir'];?>'><?= $mor['dari'];?> - <?= $mor['ke'];?>  (Rp. <?=  number_format($mor['ongkir'],0,",",".");?>)</option><?php }?> 
                                  </select></th>
                                   <th>
                                    <select type='text' name='jenisorderan<?= $i;?>' required> 
                                    <option value="<?= $mp['id_kode'];?>"><?= $mp['nama_order'];?> (<?= $mp['code_order'];?>)</option>  
                                    <?php $no=1;$tampil = $koneksi->query('SELECT *FROM kode_order  ');
                                    while($m=mysqli_fetch_array($tampil)){ 
                                    if($m['id_kode'] == $ma['jenisorderan']){}else{ ?>

                                      <option value='<?= $m['id_kode'];?>'><?= $m['nama_order'];?> (<?= $m['code_order'];?>)</option>
                                    <?php } } ?> 
                                    </select> 
                                  </th>
                                  <th><input type='text' class=''name='jmlorderan<?= $i;?>' value='<?= $ma['jmlorderan'];?>'onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'></th>
                                  <th><input type='text' class=''name='titik<?= $i;?>' value='<?= $ma['titik'];?>'onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'></th>
                                  <th><input type='text' class=''name='ttlbelanja<?= $i;?>' value='<?php echo number_format($ma['ttlbelanja'],0,",","."); ?>'onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'></th>
                                 
                                  <th><?php if($ma['keorder']=='Selesai'){?><button><input type="checkbox" name="keterangan<?= $i;?>" value='Selesai' checked  > </button>Selesai <button type="button"  data-toggle="modal" data-target="#myModal1">
           <input type="checkbox" name="keterangan<?= $i;?>" value='Batal'>
        </button>Batal<?php }else{?><button type="button"  data-toggle="modal" data-target="#myModal1">
           <input type="checkbox" name="keterangan<?= $i;?>" value='Batal' checked>
        </button>Batal <button><input type="checkbox" name="keterangan<?= $i;?>" value='Selesai'  > </button>Selesai<?php }?>
                                  
                                    <div class="container">
       
        


        <div class="modal" id="myModal1">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-header">
                        <h4 class="modal-title">Upload Bukti Pembatalan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


                    <div class="modal-body">
                        <input type="file" name="file<?= $i;?>">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Upload</button>
                    </div>

                </div>
            </div>
        </div>

    </div></th>
                                   </tr>
                           <?php $i++; } ?>
                                </table>

                              <div id="insert-form"></div>
 <div class="form-group mb-n">
                                    <div class="col-sm-8">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
            <a href="?page=page/rincianlaporan/index" type="button"class = "btn btn-danger">Kembali</a>
        </div>
        </div>
</form>

                              


                </div>
                        </div>
                    </div>

                </div>

