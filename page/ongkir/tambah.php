
    <div class="container-fluid">

                    <!-- Page Heading -->
                    
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <h1 class="h3 mb-2 text-gray-800">Tambah Ongkir</h1>
                        </div>
                        <div class="card-body">
                      
<div id="angka">
            
       <form class="user" action="" method="post" enctype="multipart/form-data">
           <div id="input">
                           
                            <table width="50%">
                                <tr>
                                    <td width="10%">Tempat Asal </td>
                                    <td width="50%">
                                        <input type="text" name="dari" class="form-control" id="exampleLastName"
                                            placeholder="Enter  Tempat Asal" required><p></p>
                                    </td>
                                 </tr>
                                  <tr>
                                    <td width="10%">Tempat Tujuan </td>
                                    <td width="50%">
                                        <input type="text" name="ke" class="form-control" id="exampleLastName"
                                            placeholder="Enter Tempat Tujuan" required><p></p>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td width="10%">Ongkir</td>
                                    <td width="50%">
                                        <input type="text" name="ongkir" class="form-control" id="exampleLastName"
                                            placeholder="Enter Ongkir"  onkeydown='return numbersonly(this, event);' onkeyup='javascript:tandaPemisahTitik(this);' required><p></p>
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

    if (isset ($_POST['simpan'])){

$dari = $_POST['dari'];
        $ke=addslashes($_POST['ke']);     
    $ongkir = str_replace(".","",$_POST["ongkir"]); 

        $query_simpan =$koneksi->query( "INSERT INTO ongkir SET 
        
        ke='$ke',
        ongkir='$ongkir',
        dari='$dari'
        ");
      
    if ($query_simpan) {
      echo"<script>alert('Data ongkir Berhasil di tambah !!!'); window.location = '?page=page/ongkir/index'</script>";
      }else{
      echo"<script>alert('Data ongkir Gagal di Simpan !!!'); window.location = '?page=page/ongkir/tambah'</script>";
    }}?>