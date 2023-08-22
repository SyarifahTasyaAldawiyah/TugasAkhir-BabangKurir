
    <?php  if(isset($_GET['id'])){
        $sql_cek = "SELECT * FROM kode_order  WHERE  id_kode='".$_GET['id']."'";
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
                                <input type="hidden" name="id" value="<?=$data_cek['id_kode'];?>">
                            <table width="50%">
                                <tr>
                                    <td width="5%">Nama Level</td>
                                    <td width="50%">
                                        <input type="text" name="nama_order" class="form-control" id="exampleLastName"
                                            value="<?= $data_cek['nama_order'];?>"required><p></p>
                                    </td>
                                 </tr>
                                 
                                 <tr>
                                    <td width="5%">Hitungan Penghasilan</td>
                                    <td width="50%">
                                        <input type="text" name="code_order" class="form-control" id="exampleLastName"
                                            value="<?= $data_cek['code_order'];?>" required><p></p>
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

if (isset($_POST['simpan'])){

  
    $koneksi->query("UPDATE kode_order SET 
                    nama_order     = '$_POST[nama_order]',
                    code_order = '$_POST[code_order]'
                    WHERE id_kode = '$_POST[id]'");
echo"<script>alert('Data Berhasil di Ubah!!!'); window.location = '?page=page/kodeorder/index&id=Data Kode Order'</script>";
    }



 ?>