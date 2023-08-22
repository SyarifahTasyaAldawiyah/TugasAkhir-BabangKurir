
    <?php  if(isset($_GET['id'])){
        $sql_cek = "SELECT * FROM driver as d,level_driver as l WHERE d.id_level=l.id_level and d.id_driver='".$_GET['id']."'";
        $query_cek = $koneksi->query( $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
  ?><div class="container-fluid">

                    <!-- Page Heading -->
                    
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['data'];?></h1>
                        </div>
                        <div class="card-body">
                      

                           
                               <form class="user" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=$data_cek['id_driver'];?>">
                            <table width="50%">
                                <tr>
                                    <td width="5%">No BB </td>
                                    <td width="50%">
                                        <input type="text" name="nobb" class="form-control" id="exampleLastName"
                                            value="<?=$data_cek['nobb'];?>"><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Password</td>
                                    <td width="50%">
                                        <input type="text" name="password" class="form-control" id="exampleLastName"
                                            value="<?=$data_cek['password'];?>"><p></p>
                                    </td>
                                 </tr>

                                <tr>
                                    <td width="5%">Nama Driver </td>
                                    <td width="50%">
                                        <input type="text" name="nama_driver" class="form-control" id="exampleLastName"
                                            value="<?=$data_cek['nama_driver'];?>"><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">TTL </td>
                                    <td width="50%">
                                        <input type="text" name="ttl" class="form-control" id="exampleLastName"
                                            value="<?=$data_cek['ttl'];?>"><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Jenis Kelamin</td>
                                    <td width="50%">
                                        <select type="text" name="jk" class="form-control" id="exampleLastName"
                                            placeholder="Enter No Hp" required>
                                           <?php if($data_cek['jk']=="Perempuan"){?>
                                              <option value="<?=$data_cek['jk'];?>"><?=$data_cek['jk'];?></option>
                                              <option value="Laki-laki">Laki-laki</option> 
                                          <?php }else{ ?>
                                            <option value="<?=$data_cek['jk'];?>"><?=$data_cek['jk'];?></option>
                                             <option value="Perempuan">Perempuan</option>                               
                                            <?php } ?>                              
                                                

                                        </select> <p></p>
                                    </td>
                                 </tr>
                                 
                                 <tr>
                                    <td width="5%">Level</td>
                                    <td width="50%">
                                        <select type="text" name="id_level" class="form-control" id="exampleLastName"
                                            placeholder="Enter No Hp" required>
                                            <option value="<?=$data_cek['id_level'];?>"><?=$data_cek['nama_level'];?></option>
                                             <?php $no =1;
                                                $driver=$koneksi->query("SELECT * FROM level_driver order by id_level desc");
                                                while($m=mysqli_fetch_array($driver)){ if($m['id_level'] == $data_cek['id_level']){ }else{ ?> 
                                                <option value="<?= $m['id_level'];?>"><?= $m['nama_level'];?></option>                               
                                                

                                            <?php }
                                        } ?>
                                        </select> <p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">No Hp</td>
                                    <td width="50%">
                                        <input type="text" name="no_hp" class="form-control" id="exampleLastName"
                                            value="<?=$data_cek['no_hp'];?>"><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Alamat</td>
                                    <td width="50%">
                                        <textarea type="text" name="alamat" class="form-control" id="exampleLastName"><?=$data_cek['alamat'];?></textarea><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Foto</td>
                                    <td width="4%">
                                        <img src="img/driver/<?= $data_cek['foto'];?>" style="width: 100px; height:100px;"><input type="file" name="foto" class="form-contro" id="exampleLastName"
                                             ><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">KTP</td>
                                    <td width="4%">
                                        <img src="img/ktp/<?= $data_cek['ktp'];?>" style="width: 100px; height:100px;"><input type="file" name="ktp" class="form-contro" id="exampleLastName"
                                             ><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%"></td>
                                    <td width="4%">
                                        <div class="form-group mb-n">
                                    <div class="col-sm-8">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
            <a href="?page=page/driver/index&id=Data Driver" type="button"class = "btn btn-danger">Kembali</a>
        </div>
        </div>
                                    </td>
                                 </tr>
                            </table>
                         
                            </form>
                            
                        </div>
                    </div>

                </div>

  
<?php 

if (isset($_POST['simpan'])){

  $file_name = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $file_name1 = $_FILES['ktp']['name'];
        $tmp_name1 = $_FILES['ktp']['tmp_name'];
        $nama=addslashes($_POST['nama']);
        $password=addslashes($_POST['password']);
        $no_hp = $_POST['no_hp'];
        $nobb=addslashes($_POST['nobb']);
        $ttl=addslashes($_POST['ttl']);
        $alamat=addslashes($_POST['alamat']);
        $level=addslashes($_POST['id_level']);
        $nama=addslashes($_POST['nama_driver']);
        $jk=addslashes($_POST['jk']);
  if (empty($file_name) && empty($file_name1)){
    $koneksi->query("UPDATE driver SET 
                    nama_driver='$nama',
                    nobb='$nobb',
                    password='$password',
                    no_hp='$no_hp',
                    ttl='$ttl',
                    alamat='$alamat',
                    id_level='$level',
                    jk='$jk'
                    WHERE id_driver = '$_POST[id]'");
    }elseif(!empty($file_name) && empty($file_name1)){


    $hapus= $koneksi->query("select * from driver where id_driver='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_foto['foto'];
    $hapus_foto="img/driver/$lokasi";
    unlink($hapus_foto);
    move_uploaded_file($_FILES['foto']['tmp_name'],'img/driver/'.$file_name);
    $koneksi->query("UPDATE driver SET
                    nama_driver='$nama',
                    nobb='$nobb',
                    no_hp='$no_hp',
                    password='$password',
                    ttl='$ttl',
                    alamat='$alamat',
                    id_level='$level',
                    jk='$jk',
                    foto='$file_name'
                    WHERE id_driver= '$_POST[id]'");
  }elseif(empty($file_name) && !empty($file_name1)){
     $hapus= $koneksi->query("select * from driver where id_driver='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi1=$tanggal_foto['ktp'];
    $hapus_foto1="img/ktp/$lokasi1";
    unlink($hapus_foto1);
    move_uploaded_file($_FILES['ktp']['tmp_name'],'img/ktp/'.$file_name1);
    $koneksi->query("UPDATE driver SET
                    nama_driver='$nama',
                    nobb='$nobb',
                    password='$password',
                    no_hp='$no_hp',
                    ttl='$ttl',
                    alamat='$alamat',
                    id_level='$level',
                    jk='$jk',
                    ktp='$file_name1'
                    WHERE id_driver= '$_POST[id]'");
  }elseif(!empty($file_name1) && !empty($file_name1)){


     $hapus= $koneksi->query("select * from driver where id_driver='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_foto['foto'];
    $lokasi1=$tanggal_foto['ktp'];
    $hapus_foto="img/driver/$lokasi";
    $hapus_foto1="img/ktp/$lokasi1";
    $hfoto=unlink($hapus_foto);
    $hktp=unlink($hapus_foto1);
    $ufoto= move_uploaded_file($_FILES['ktp']['tmp_name'],'img/driver/'.$file_name);
    $uktp= move_uploaded_file($_FILES['ktp']['tmp_name'],'img/ktp/'.$file_name1);
    $koneksi->query("UPDATE driver SET
                    nama_driver='$nama',
                    nobb='$nobb',
                    no_hp='$no_hp',
                    password='$password',
                    ttl='$ttl',
                    alamat='$alamat',
                    id_level='$level',
                    jk='$jk',
                    ktp='$file_name1',
                    foto='$file_name'
                    WHERE id_driver= '$_POST[id]'");
  }
echo"<script>alert('Data Berhasil di Ubah!!!'); window.location = '?page=page/driver/index&id=Data driver'</script>";
    }



 ?>