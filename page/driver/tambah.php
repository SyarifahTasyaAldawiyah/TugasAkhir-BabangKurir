
    <div class="container-fluid">

                    <!-- Page Heading -->
                    
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1>
                        </div>
                        <div class="card-body">
                      

                           
                               <form class="user" action="" method="post" enctype="multipart/form-data">
                            <table width="50%">
                                <tr>
                                    <td width="5%">No BB </td>
                                    <td width="50%">
                                        <input type="text" name="nobb" class="form-control" id="exampleLastName"
                                            placeholder="Enter No BB" required><p></p>
                                    </td>
                                 </tr>
                                  <tr>
                                    <td width="5%">Password </td>
                                    <td width="50%">
                                        <input type="text" name="password" class="form-control" id="exampleLastName"
                                            placeholder="Enter Password" required><p></p>
                                    </td>
                                 </tr>
                                <tr>
                                    <td width="5%">Nama Driver </td>
                                    <td width="50%">
                                        <input type="text" name="nama_driver" class="form-control" id="exampleLastName"
                                            placeholder="Enter Driver" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">TTL </td>
                                    <td width="50%">
                                        <input type="text" name="ttl" class="form-control" id="exampleLastName"
                                            placeholder="Enter TTL" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Jenis Kelamin</td>
                                    <td width="50%">
                                        <select type="text" name="jk" class="form-control" id="exampleLastName"
                                            placeholder="Enter No Hp" required>
                                            <option> Pilih Jenis Kelamin</option>
                                              <option value="Perempuan">Perempuan</option>                               
                                              <option value="Laki-laki">Laki-laki</option>                               
                                                

                                        </select> <p></p>
                                    </td>
                                 </tr>
                                 
                                 <tr>
                                    <td width="5%">Level</td>
                                    <td width="50%">
                                        <select type="text" name="id_level" class="form-control" id="exampleLastName"
                                            placeholder="Enter No Hp" required>
                                            <option> Pilih Level</option>
                                             <?php $no =1;
                                                $driver=$koneksi->query("SELECT * FROM level_driver order by id_level desc");
                                                while($m=mysqli_fetch_array($driver)){ ?> 
                                                <option value="<?= $m['id_level'];?>"><?= $m['nama_level'];?></option>                               
                                                

                                            <?php }?>
                                        </select> <p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">No Hp</td>
                                    <td width="50%">
                                        <input type="text" name="no_hp" class="form-control" id="exampleLastName"
                                            placeholder="Enter No Hp" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Alamat</td>
                                    <td width="50%">
                                        <textarea type="text" name="alamat" class="form-control" id="exampleLastName"
                                            placeholder="Enter Alamat" required></textarea><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Foto</td>
                                    <td width="4%">
                                        <input type="file" name="foto" class="form-contro" id="exampleLastName"
                                             required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">KTP</td>
                                    <td width="4%">
                                        <input type="file" name="ktp" class="form-contro" id="exampleLastName"
                                             required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%"></td>
                                    <td width="4%">
                                        <div class="form-group mb-n">
                                    <div class="col-sm-8">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
            <a href="?page=page/driver/index" type="button"class = "btn btn-danger">Kembali</a>
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

    if (isset ($_POST['simpan'])){
        $file_name = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $file_name1 = $_FILES['ktp']['name'];
        $tmp_name1 = $_FILES['ktp']['tmp_name'];
        $nama=addslashes($_POST['nama']);

$no_hp = $_POST['no_hp'];
        $nobb=addslashes($_POST['nobb']);
        $ttl=addslashes($_POST['ttl']);
        $alamat=addslashes($_POST['alamat']);
        $level=addslashes($_POST['id_level']);
        $nama=addslashes($_POST['nama_driver']);
        $jk=addslashes($_POST['jk']);
        $password=addslashes($_POST['password']);

        $query_simpan =$koneksi->query( "INSERT INTO driver SET 
        nama_driver='$nama',
        nobb='$nobb',
        no_hp='$no_hp',
        ttl='$ttl',
        alamat='$alamat',
        password='$password',
        id_level='$level',
        ktp='$file_name1',
        jk='$jk',
        foto='$file_name'
        ");
        $fot= move_uploaded_file($tmp_name, "img/driver/".$file_name);
        $ident= move_uploaded_file($tmp_name1, "img/ktp/".$file_name1);

    if ($query_simpan) {
      echo"<script>alert('Data driver Berhasil di tambah !!!'); window.location = '?page=page/driver/index&id=Data Driver'</script>";
      }else{
      echo"<script>alert('Data driver Gagal di Simpan !!!'); window.location = '?page=page/driver/tambah'</script>";
    }}?>