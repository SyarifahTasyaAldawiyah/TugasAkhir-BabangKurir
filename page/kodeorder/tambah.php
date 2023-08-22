
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
                                    <td width="10%">Nama Order</td>
                                    <td width="50%">
                                        <input type="text" name="nama_order" class="form-control" id="exampleLastName"
                                            placeholder="Enter Nama Order" required><p></p>
                                    </td>
                                 </tr>
                                 
                                 <tr>
                                    <td width="10%">Kode Order</td>
                                    <td width="50%">
                                        <input type="text" name="code_order" class="form-control" id="exampleLastName"
                                            placeholder="Enter Code Order" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%"></td>
                                    <td width="4%">
                                        <div class="form-group mb-n">
                                    <div class="col-sm-8">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
            <a href="?page=page/kodeorder/index&id=Data Kode Order" type="button"class = "btn btn-danger">Kembali</a>
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

$nama_level = $_POST['nama_order'];
        $persentase=addslashes($_POST['code_order']);

        $query_simpan =$koneksi->query( "INSERT INTO kode_order SET 
        
        code_order='$persentase',
        nama_order='$nama_level'
        ");
      
    if ($query_simpan) {
      echo"<script>alert('Data  Berhasil di tambah !!!'); window.location = '?page=page/kodeorder/index&id=Data Kode Order'</script>";
      }else{
      echo"<script>alert('Data  Gagal di Simpan !!!'); window.location = '?page=page/kodeorder/tambah'</script>";
    }}?>