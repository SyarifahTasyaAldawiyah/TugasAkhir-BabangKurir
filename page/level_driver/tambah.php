
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
                                    <td width="10%">Nama Level</td>
                                    <td width="50%">
                                        <input type="text" name="nama_level" class="form-control" id="exampleLastName"
                                            placeholder="Enter Nama Level" required><p></p>
                                    </td>
                                 </tr>
                                 
                                 <tr>
                                    <td width="10%">Hitungan Penghasilan</td>
                                    <td width="50%">
                                        <input type="text" name="persentase" class="form-control" id="exampleLastName"
                                            placeholder="Enter Hitungan Penghasilan" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%"></td>
                                    <td width="4%">
                                        <div class="form-group mb-n">
                                    <div class="col-sm-8">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
            <a href="?page=page/level_driver/index" type="button"class = "btn btn-danger">Kembali</a>
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

$nama_level = $_POST['nama_level'];
        $persentase=addslashes($_POST['persentase']);

        $query_simpan =$koneksi->query( "INSERT INTO level_driver SET 
        
        persentase='$persentase',
        nama_level='$nama_level'
        ");
      
    if ($query_simpan) {
      echo"<script>alert('Data level_driver Berhasil di tambah !!!'); window.location = '?page=page/level_driver/index&id=Data Level Driver'</script>";
      }else{
      echo"<script>alert('Data level_driver Gagal di Simpan !!!'); window.location = '?page=page/level_driver/tambah'</script>";
    }}?>