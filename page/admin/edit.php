
    <?php  if(isset($_GET['id'])){
        $sql_cek = "SELECT * FROM admin  WHERE  id_admin='".$_GET['id']."'";
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
                                <input type="hidden" name="id" value="<?=$data_cek['id_admin'];?>">
                            <table width="50%">
                                <tr>
                                    <td width="5%">Nama </td>
                                    <td width="50%">
                                        <input type="text" name="nama" class="form-control" id="exampleLastName"
                                            value="<?= $data_cek['nama'];?>"required><p></p>
                                    </td>
                                 </tr>
                                 
                                 <tr>
                                    <td width="5%">No Hp </td>
                                    <td width="50%">
                                        <input type="text" name="no_hp" class="form-control" id="exampleLastName"
                                            value="<?= $data_cek['no_hp'];?>" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Username</td>
                                    <td width="50%">
                                        <input type="text" name="username" class="form-control" id="exampleLastName"
                                            value="<?= $data_cek['nama'];?>" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Password</td>
                                    <td width="50%">
                                        <input type="password" name="password" class="form-control" id="exampleLastName"
                                            placeholder="<?= $data_cek['password'];?>" ><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Foto</td>
                                    <td width="4%"><img src="img/admin/<?= $data_cek['foto'];?>" style="width: 100px; height:100px;">
                                        <input type="file" name="foto" class="form-contro" id="exampleLastName"
                                             ><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%"></td>
                                    <td width="4%">
                                        <div class="form-group mb-n">
                                    <div class="col-sm-8">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
            <a href="?page=page/admin/index" type="button"class = "btn btn-danger">Kembali</a>
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

  $foto   = $_FILES['foto']['name'];
  $pp = $_POST['password'];
  if (empty($foto) && empty($pp)){
    $koneksi->query("UPDATE admin SET 
                    nama     = '$_POST[nama]',
                    username = '$_POST[username]',
                    no_hp    = '$_POST[no_hp]'
                    WHERE id_admin = '$_POST[id]'");
}elseif(empty($foto) && !empty($pp)){
    $koneksi->query("UPDATE admin SET 
                    nama     = '$_POST[nama]',
                    username = '$_POST[username]',
                    no_hp    = '$_POST[no_hp]',
                    password = '$pp'
                    WHERE id_admin = '$_POST[id]'");
    }elseif(!empty($foto) && empty($pp)){


    $hapus= $koneksi->query("select * from admin where id_admin='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_foto['foto'];
    $hapus_foto="img/admin/$lokasi";
    unlink($hapus_foto);
    move_uploaded_file($_FILES['foto']['tmp_name'],'img/admin/'.$foto);
    $koneksi->query("UPDATE admin SET nama     = '$_POST[nama]',
                    username     = '$_POST[username]',
                    no_hp    = '$_POST[no_hp]',
                    foto  = '$foto'
                    WHERE id_admin= '$_POST[id]'");
  }elseif(!empty($foto) && !empty($pp)){


    $hapus= $koneksi->query("select * from admin where id_admin='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_foto['foto'];
    $hapus_foto="img/admin/$lokasi";
    unlink($hapus_foto);
    move_uploaded_file($_FILES['foto']['tmp_name'],'img/admin/'.$foto);
    $koneksi->query("UPDATE admin SET nama     = '$_POST[nama]',
                    username     = '$_POST[username]',
                    no_hp    = '$_POST[no_hp]',
                    password = '$pp',
                    foto  = '$foto'
                    WHERE id_admin= '$_POST[id]'");
  }
echo"<script>alert('Data Berhasil di Ubah!!!'); window.location = '?page=page/admin/index&id=Data Admin'</script>";
    }



 ?>