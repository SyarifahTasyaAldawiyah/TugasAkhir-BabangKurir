
    <div class="container-fluid">

                    <!-- Page Heading -->
                    
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1>
                        </div>
                        <div class="card-body">
                      

                           
                               <form class="user" action="?page=page/laporanharian/tambah&idk=Input Laporan Harian" method="post" enctype="multipart/form-data">
                            <table width="50%">
                                <tr>
                                    <td width="20%">Jumlah Data Driver </td>
                                    <td width="50%">
                                        <select class="form-control" name="id_driver">
                                            <option>Pilih Driver</option>
                                            <?php 
            $no =1;
            $driver=$koneksi->query("SELECT * FROM driver as d, level_driver as l where d.id_level=l.id_level   order by id_driver desc");
            while($m=mysqli_fetch_array($driver)){
                   
          ?> 
                  <option value="<?= $m['id_driver'];?>"><?= $m['nobb'];?>/ <?= $m['nama_driver'];?> - (<?= $m['nama_level'];?>)</option>
                <?php }?>
                                        </select><p></p>
                                    </td>
                                 </tr>
                                 
                                 <tr>
                                    <td width="5%"></td>
                                    <td width="4%">
                                        <div class="form-group mb-n">
                                    <div class="col-sm-8">
            <button type="submit" name="btn-gen-form" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Generate</button>
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