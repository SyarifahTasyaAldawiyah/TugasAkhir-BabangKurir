
<?php
// include_once 'dbcon.php';
// $id = $_POST['id'];
// $fn = $_POST['fn'];
// $ln = $_POST['ln'];
// $chk = $_POST['chk'];
// $chkcount = count($id);
// for($i=0; $i<$chkcount; $i++)
// {
//   $MySQLiconn->query("UPDATE users SET first_name='$fn[$i]', last_name='$ln[$i]' WHERE id=".$id[$i]);
// }
// header("Location: index.php");
?>
  <?php


if(isset($_POST['save_mul']))
{   
 
  $id_laporan= $_POST["id_laporan"];
    $tgllaporanharian = $_POST["tgllaporanharian"];
    $id_driver = $_POST["id_driver"];
        $pendapatan = $_POST["pendapatan"];
        $id_laporanharian= $_POST["id_laporanharian"]; 
    $jml_order = $_POST["jml_order"];    
    $kode_order = $_POST["kode_order"];

    $modal = $_POST["modal"];    
    $income = $_POST["income"];    
    $kantorplus = $_POST["kantorplus"];    
    $keterangan = $_POST["keterangan"];    
    $bon = $_POST["bon"];    
    $qris = $_POST["qris"];    
    $man = $_POST["man"];    
    $bca = $_POST["bca"];      
    $bpd = $_POST["bpd"];      
    $bri = $_POST["bri"];      
    $dll = $_POST["dll"];      
    $kantorminus = $_POST["kantorminus"];      
    $keteranganmin = $_POST["keteranganmin"];  
$input=$koneksi->query( "INSERT INTO laporanharian SET
        id_driver = '$id_driver',     
        tgllaporan = '$tgllaporanharian',     
        komisi = '$pendapatan' where id_laporan='$id_laporan'
        ");

    $chkcount = count($id_laporanharian);
 for($i=0; $i<$chkcount; $i++)
  {
        

    $sql=$koneksi->query( "UPDATE detaillaporanharian SET 
        
        tgllaporanharian = '$tgllaporanharian',
        id_driver = '$id_driver',
        jml_order = '$jml_order[$i]', 
        kode_order = '$kode_order[$i]',   
        modal = '$modal[$i]',   
        income = '$income[$i]',   
        kantorplus = '$kantorplus[$i]',   
        keterangan = '$keterangan[$i]',   
        bon = '$bon[$i]',   
        qris = '$qris[$i]',   
        man = '$man[$i]',   
        bca = '$bca[$i]',     
        bpd = '$bpd[$i]',     
        bri = '$bri[$i]',     
        dll = '$dll[$i]',     
        kantorminus = '$kantorminus[$i]',     
        keteranganmin = '$keteranganmin[$i]' WHERE id_laporanharian='$id_laporanharian[$i]'
        ");  
        
  }
  $level_dri=$koneksi->query("SELECT * FROM detaillaporanharian where   id_driver='$id_driver' and tgllaporanharian='$tgllaporanharian' order by id_laporanharian asc");
            while($mon=mysqli_fetch_array($level_dri)){
              $modal1+=$mon['modal'];
              $income1+=$mon['income'];
              $kantorplus1+=$mon['kantorplus'];
              
              $bon1+=$mon['bon'];
              $qris1+=$mon['qris'];
              $man11+=$mon['man'];
              $bca1+=$mon['bca'];
              $bpd1+=$mon['bpd'];
              $bri1+=$mon['bri'];
              $dll1+=$mon['dll'];
              $kantorminus1+=$mon['kantorminus'];
              
            }
            $neracaplus=$modal1+$income1+$kantorplus1;
            $neracamin=$bon1+$qris1+$man1+$bca1+$bpd1+$bri1+$dll1+$kantorminus1;
            $setoran= $neracaplus-$neracamin;
            $koneksi->query("UPDATE laporanharian SET 
                    setoran     = '$setoran',
                    neracamin     = '$neracamin',
                    neracaplus     = '$neracaplus'
                    WHERE id_driver='$id_driver' and tgllaporan='$tgllaporanharian'");

            

  
  if($sql)
  {
    ?>
      <script>
    alert('data berhasil di Update');
    window.location.href='?page=page/laporanharian/index&id=Data Laporan Harian';
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert('error while inserting , TRY AGAIN');
    </script>
        <?php
  }
}
?>