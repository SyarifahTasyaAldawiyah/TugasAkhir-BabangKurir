

    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Gaji</h1>
                
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                       <?php if($_SESSION['level']=='Admin'){?> <td>Driver <select name="id_driver" required="">
                                          
                                          <?php  if(isset($_POST['pencarian'])){
                                            $drivrm=$koneksi->query("SELECT * FROM driver as d, level_driver as l where d.id_level=l.id_level and d.id_driver='$_POST[id_driver]'");
            $dv=mysqli_fetch_array($drivrm);?>
                                            <option value="<?= $dv['id_driver'];?>"><?= $dv['nobb'];?> - <?= $dv['nama_driver'];?></option>
                                            <?php

                                             }else{ ?>
                                             <option>Pilih</option>
                                                <?php }?> 
                                             <?php 
            $no =1;

            $driverm=$koneksi->query("SELECT * FROM driver as d, level_driver as l where d.id_level=l.id_level   order by id_driver desc");
            while($mm=mysqli_fetch_array($driverm)){
                   
          ?><option value="<?= $mm['id_driver'];?>"><?= $mm['nobb'];?> - <?= $mm['nama_driver'];?></option> <?php }?>
                                       </select> </td>
                                    <td></td>
                                    <?php }else{}?><td>Tanggal Awal <input type="date" name="tglawal" <?php  if(isset($_POST['pencarian'])){?> value="<?= $_POST['tglawal']?>"<?php }else{}?> ></td>
                                    <td></td>
                                    <td>Tanggal Akhir <input type="date" name="tgllakhir" <?php  if(isset($_POST['pencarian'])){?> value="<?= $_POST['tgllakhir']?>"<?php }else{}?>>
                                </td>
                                <td><input type="submit" class="btn btn-primary" name="pencarian" value="Cari"></td>
                                <?php if($_SESSION['level']=='Admin'){
                                    if(isset($_POST['pencarian'])){?>
                                <td></td>
                                <td><a href="page/gaji/cetakgaji.php?id_driver=<?= $_POST['id_driver'];?>&tglawal=<?= $_POST['tglawal']?>&tgllakhir=<?= $_POST['tgllakhir']?>" class="btn btn-warning" target="_BLANK">Cetak Gaji</a></td>
<?php } }else{}?>
                                </tr>
                                </table>
                            </form>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                      <tr style="background-color: #1cc88a; color: black; text-align: center;">
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Level</th>
                                            <th>Income</th>
                                            <th>Bon</th>
                                            <th>Gaji Kotor</th>
                                            <th>Gaji Bersih </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       
                                          <?php if(isset($_POST['pencarian'])){
    $tgl_awal=$_POST['tglawal'];
    $tgl_akhir=$_POST['tgllakhir'];
    if(empty($tgl_awal)||empty($tgl_akhir)){ ?><script language="JavaScript">
        alert('Tanggal Awal dan Tanggal Akhir mohon di isi!!!');
        document.location='?page=page/gaji/index';

    </script><?php }else{ $no=1; 
if($_SESSION['level']=='Admin'){
        $level_driver=$koneksi->query("SELECT * FROM laporanharian  where tgllaporan between '$tgl_awal' and '$tgl_akhir' and id_driver='$_POST[id_driver]'");
    }else{
        $level_driver=$koneksi->query("SELECT * FROM laporanharian  where tgllaporan between '$tgl_awal' and '$tgl_akhir' and id_driver='$_SESSION[id]'");
    }

         }
            while($m=mysqli_fetch_array($level_driver)){
                
                $sql_cek = "SELECT * FROM driver as d,level_driver as l WHERE d.id_level=l.id_level and d.id_driver='".$m['id_driver']."'";
        $driver = mysqli_fetch_array($koneksi->query( $sql_cek));
        $income+=$m['income'];
        $gaji+=$m['gaji'];
        $tbon+=$m['bon'];
          ?> 
                            <tr>
                                <td><?php echo $no;?></td>
                                 <td><?php echo tgl_indonesia($m['tgllaporan']);?></td>
                                 <td><?= $driver['nama_driver'];?></td>
                                 <td><?= $driver['nama_level'];?></td>
                                 <td>Rp <?= number_format($m['income'],0,",",".");?></td>
                                 <td>Rp <?php if($m['bon']==''){ echo"0";}else{ echo number_format($m['bon'],0,",",".");}?></td>
                                 <td>Rp <?= number_format($m['gaji'],0,",",".");?></td>
                                 <td>Rp <?= number_format($m['gaji']-$m['bon'],0,",",".");?></td>
                                
                            </tr>
                            <?php 
                            $no++;
                            } ?>
                             <tr>
                                <td colspan="4">Total</td>
                                <td >Rp <?= number_format($income,0,",",".");?></td>
                                <td >Rp <?= number_format($tbon,0,",",".");?></td>
                                <td >Rp <?= number_format($gaji,0,",",".");?></td>
                                <td >Rp <?= number_format($gaji-$tbon,0,",",".");?></td>
                            </tr><?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

  