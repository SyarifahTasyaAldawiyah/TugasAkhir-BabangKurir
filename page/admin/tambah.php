
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
                                    <td width="5%">Nama </td>
                                    <td width="50%">
                                        <input type="text" name="nama" class="form-control" id="exampleLastName"
                                            placeholder="Enter Nama" required><p></p>
                                    </td>
                                 </tr>
                                 
                                 <tr>
                                    <td width="5%">No Hp </td>
                                    <td width="50%">
                                        <input type="text" name="no_hp" class="form-control" id="exampleLastName"
                                            placeholder="Enter No Hp" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Username</td>
                                    <td width="50%">
                                        <input type="text" name="username" class="form-control" id="exampleLastName"
                                            placeholder="Enter Username" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%">Password</td>
                                    <td width="50%">
                                        <input type="text" name="password" class="form-control" id="exampleLastName"
                                            placeholder="Enter Password" required><p></p>
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

    if (isset ($_POST['simpan'])){
        $file_name = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $nama=addslashes($_POST['nama']);

$no_hp = $_POST['no_hp'];
        $username=addslashes($_POST['username']);
        $password=addslashes($_POST['password']);

        $query_simpan =$koneksi->query( "INSERT INTO admin SET 
        nama='$nama',
        username='$username',
        no_hp='$no_hp',
        password='$password',
        foto='$file_name'
        ");
        move_uploaded_file($tmp_name, "img/admin/".$file_name);

    if ($query_simpan) {
      echo"<script>alert('Data Admin Berhasil di tambah !!!'); window.location = '?page=page/admin/index&id=Data Admin'</script>";
      }else{
      echo"<script>alert('Data Admin Gagal di Simpan !!!'); window.location = '?page=page/admin/tambah'</script>";
    }}?>