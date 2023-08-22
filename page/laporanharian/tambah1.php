  <script src="tampilan/jquery.min.js" type="text/javascript"></script>
  <script src="my.js" type="text/javascript"></script>
  

  <?php


if(isset($_POST['simpan']))
{   
  $total = $_POST['ttl'];
             
    $tglorder = $_POST["tglorder"];          
    $anak = $_POST["anaksekolah"];          
    $id_driver = $_SESSION["id"];   

  for($i=1; $i<=$total; $i++)
  {
    
    $jenisorderan = $_POST["jenisorderan$i"];         
    $jmlorderan = str_replace(".","",$_POST["jmlorderan$i"]);         
    $titik = str_replace(".","",$_POST["titik$i"]);         
    $ttlbelanja = str_replace(".","",$_POST["ttlbelanja$i"]);         
             
    $id_ongkir = str_replace(".","",$_POST["id_ongkir$i"]);         
    $keterangan = $_POST["keterangan$i"];     
    $file_name = $_FILES["file$i"]["name"];
        $tmp_name = $_FILES["file$i"]["tmp_name"]; 
        $lho=$koneksi->query("SELECT * FROM ongkir where id_ongkir='$id_ongkir'");
            $ongkirjek=mysqli_fetch_array($lho); 
            $ongkir = str_replace(".","",$ongkirjek["ongkir"]); 
            $totalongkir=$ongkir*$titik;  
if(empty($file_name)){
  $sql=$koneksi->query( "INSERT INTO detailorderan SET 
        id_driver = '$id_driver',
        tglorder = '$tglorder',   
        jenisorderan = '$jenisorderan',   
        jmlorderan = '$jmlorderan',   
        titik = '$titik',   
        ttlbelanja = '$ttlbelanja',   
        id_ongkir = '$id_ongkir',   
        ongkir = '$ongkir',   
        keorder = '$keterangan', 
        totalongkir = '$totalongkir', 
        status = 'Baru'");
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
        keorder = '$keterangan',    
        status = 'Baru',
        totalongkir = '$totalongkir', 
        file='$file_name'

        ");
   move_uploaded_file($tmp_name, "img/order/".$file_name);

  }
 
}
 $admina=$koneksi->query("SELECT * FROM detailorderan where keorder='Selesai' and tglorder='$tglorder' and id_driver='$_SESSION[id]'  ");
            while($ma=mysqli_fetch_array($admina)){
$jmlor+=$ma['jmlorderan'];
$income+=$ma['totalongkir'];
            }

  $driver=$koneksi->query("SELECT * FROM driver as d, level_driver as l where d.id_level=l.id_level and d.id_driver='$_SESSION[id]'   order by id_driver desc");
            $m=mysqli_fetch_array($driver);
    
            
           
                   
          
            if($m['nama_level']=="STARKAN"){ $gaji=$income*$m[persentase]/100 ;}else{  $gaji=$income-$m[persentase]; }
$input=$koneksi->query( "INSERT INTO laporanharian SET
        id_driver = '$id_driver',     
        tgllaporan = '$tglorder',     
        komisi = '$m[persentase]',
        income ='$income',
        gaji ='$gaji',
        anaksekolah ='$anak',
        status ='Baru',
        jmlorderan='$jmlor'

        ");
if($sql)
  {
    ?>
        <script>
    alert('data Laporan Berhasil  di input');
    window.location.href='?page=page/rincianlaporan/index';
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert('data Laporan Gagal  di input');
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
                                


  <div id="angka"> 
            
         <form class="user" action="" method="post" enctype="multipart/form-data">
           <div id="input">
  Tanggal Laporan <input type="date" name="tglorder"  required="">
  Jumlah Anak Sekolah <input type="number" name="anaksekolah" value="0" required="">
  
 <table class="table" cellspacing="0">
                                   
                                        <tr style="background-color: #1cc88a; color: black;">
                                            <th ></th>
                                            <th >Alamat/Rute & Ongkir</th>
                                            <th >Jenis Order</th> 
                                            <th >Jumlah Orderan</th>
                                            <th >Titik</th>
                                            <th >Total Belanja</th>
                                            <th colspan="2"><center>Selesai / Batal</center></th>
                                        </tr>
                              
                                    
                                 <tr>
                                  <th><input type='hidden' name='ttl' value='1'>1</th>
                                  <th><select name='id_ongkir1' type='text' required=''>
                                      <option value=''>Pilih</option>
                                     <?php $no=1;$tampil = $koneksi->query('SELECT *FROM ongkir  ');while($m=mysqli_fetch_array($tampil)){  ?>
                                      <option value='<?= $m['id_ongkir'];?>'><?= $m['dari'];?> - <?= $m['ke'];?>  (Rp. <?=  number_format($m['ongkir'],0,",",".");?>)</option><?php }?> 
                                  </select></th> 
                                  <th>
                                    <select type='text' name='jenisorderan1' required> 
                                    <option>Pilih Jenis Order</option>  
                                    <?php $no=1;$tampil = $koneksi->query('SELECT *FROM kode_order  ');while($m=mysqli_fetch_array($tampil)){  ?>
                                      <option value='<?= $m['id_kode'];?>'><?= $m['nama_order'];?> (<?= $m['code_order'];?>)</option><?php }?> 
                                    </select> 
                                  </th>
                                  <th><input type='text' class=''name='jmlorderan1' onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'></th>
                                  <th><input type='text' class=''name='titik1'onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'></th>
                                  <th><input type='text' class=''name='ttlbelanja1'onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'></th>
                                 
                                  <th><button><input type="radio" name="keterangan1" value='Selesai'> </button>Selesai
                                  
                                   </th>
                                  <th> <div class="container">
       
        <button type="button"  data-toggle="modal" data-target="#myModal1">
           <input type="radio" name="keterangan1" value='Batal'>
        </button>Batal


        <div class="modal" id="myModal1">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-header">
                        <h4 class="modal-title">Upload Bukti Pembatalan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


                    <div class="modal-body">
                        <input type="file" name="file1">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Upload</button>
                    </div>

                </div>
            </div>
        </div>

    </div></th>
                                   </tr>
             
                                </table>

                              <div id="insert-form"></div>
 <div class="form-group mb-n">
                                    <div class="col-sm-8">
                                       <button type="button" id="btn-tambah-form" class="btn btn-success btn-flat btn-pri btn-md">Tambah Form</button>
        <button type="button" id="btn-reset-form" class="btn btn-warning btn-flat btn-pri btn-md">Reset Form</button>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
            <a href="?page=page/rincianlaporan/index" type="button"class = "btn btn-danger">Kembali</a>
        </div>
        </div>
        </div>
</form>

                              


                </div>
                </div>
                        </div>
                    </div>

                </div>


<input type="hidden" id="jumlah-form" value="1">
    
    <script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
            
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append(
                "<table class='table' cellspacing='0'>" +
                "<tr>"+
                                  "<th><input type='hidden' name='ttl' value='" + nextform + "'>" + nextform + "</th>"+
                                  "<th><select name='id_ongkir" + nextform + "' type='text' required=''><option value=''>Pilih</option><?php $no=1;$tampil = $koneksi->query('SELECT *FROM ongkir  ');while($m=mysqli_fetch_array($tampil)){  ?><option value='<?= $m['id_ongkir'];?>'><?= $m['dari'];?> - <?= $m['ke'];?>  (Rp. <?=  number_format($m['ongkir'],0,",",".");?>)</option><?php }?></select></th>"+
                                  "<th>"+
                                    "<select type='text' name='jenisorderan" + nextform + "' required>"+ 
                                    "<option>Pilih Jenis Order</option>"+  
                                    "<?php $no=1;$tampil = $koneksi->query('SELECT *FROM kode_order  ');while($m=mysqli_fetch_array($tampil)){  ?><option value='<?= $m['id_kode'];?>'><?= $m['nama_order'];?> (<?= $m['code_order'];?>)</option><?php }?> </select>"+ 
                                  "</th>"+
                                  "<th><input type='text' class=''name='jmlorderan" + nextform + "' onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'></th>"+
                                  "<th><input type='text' class=''name='titik" + nextform + "' onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'></th>"+
                                  "<th><input type='text' class=''name='ttlbelanja" + nextform + "' onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);'></th>"+
                                  
                                  "<th><button><input type='radio' name='keterangan" + nextform + "' value='Selesai'> </button>Selesai</th>"+
                                  "<th><div class='container'><button type='button'  data-toggle='modal' data-target='#myModal" + nextform + "'> <input type='radio' name='keterangan" + nextform + "' value='Batal'> </button>Batal<div class='modal' id='myModal" + nextform + "'> <div class='modal-dialog'>  <div class='modal-content'>  <div class='modal-header'> <h4 class='modal-title'>Upload Bukti Pembatalan</h4> <button type='button' class='close' data-dismiss='modal'>&times;</button>  </div>  <div class='modal-body'>   <input type='file' name='file" + nextform + "'>  </div> <div class='modal-footer'> <button type='button' class='btn btn-danger' data-dismiss='modal'>Upload</button>  </div></div></div></div></div></th>"+
                                   "</tr>"+
                "</table>" );
            
            $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });
        
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function(){
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
    </script>