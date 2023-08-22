
    <?php  if(isset($_GET['id'])){
        $sql_cek = "SELECT * FROM ongkir  WHERE  id_ongkir='".$_GET['id']."'";
        $query_cek = $koneksi->query( $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
  ?><div class="container-fluid">

                    <!-- Page Heading -->
                    
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <h1 class="h3 mb-2 text-gray-800">Edit Ongkir</h1>
                        </div>
                        <div class="card-body">
                      

                           
                             <div id="angka">
            
       <form class="user" action="" method="post" enctype="multipart/form-data">
           <div id="input">
            <input type="hidden" name="id" value="<?=$data_cek['id_ongkir'];?>">
                            <table width="50%">
                                <tr>
                                    <td width="5%">Tempat Asal</td>
                                    <td width="50%">
                                        <input type="text" name="dari" class="form-control" id="exampleLastName"
                                            value="<?= $data_cek['dari'];?>"required><p></p>
                                    </td>
                                 </tr>
                                 
                                 <tr>
                                    <td width="5%">Tempat Tujuan</td>
                                    <td width="50%">
                                        <input type="text" name="ke" class="form-control" id="exampleLastName"
                                            value="<?= $data_cek['ke'];?>" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="10%">Ongkir</td>
                                    <td width="50%">
                                        <input type="text" name="ongkir" class="form-control" id="exampleLastName"
                                            placeholder="Enter Ongkir"   value="<?= number_format($data_cek['ongkir'],0,",",".");?>"onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="5%"></td>
                                    <td width="4%">
                                        <div class="form-group mb-n">
                                    <div class="col-sm-8">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
            <a href="?page=page/ongkir/index" type="button"class = "btn btn-danger">Kembali</a>
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
$dari = $_POST['dari'];
        $ke=addslashes($_POST['ke']);     
    $ongkir = str_replace(".","",$_POST["ongkir"]); 

       
  
    $koneksi->query("UPDATE ongkir SET 
                    ke='$ke',
        ongkir='$ongkir',
        dari='$dari'
                    WHERE id_ongkir = '$_POST[id]'");
echo"<script>alert('Data Berhasil di Ubah!!!'); window.location = '?page=page/ongkir/index'</script>";
    }



 ?>