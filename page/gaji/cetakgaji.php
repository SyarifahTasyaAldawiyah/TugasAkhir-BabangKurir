<?php
session_start();
ob_start();
error_reporting(0);
function tanggal_indo($tanggal)
{
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split = explode('-', $tanggal);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
include_once("../../config/config.php"); //buat koneksi ke database
  $sql_cek = "SELECT * FROM driver as d,level_driver as l WHERE d.id_level=l.id_level and d.id_driver='".$_GET['id_driver']."'";
        $driver = mysqli_fetch_array($koneksi->query( $sql_cek))

?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Slip Gaji</title>
<style type="text/css">
<!--

-->
p {
   line-height:60%;
}
</style>
</head>
<body>
  <table width="100%">
<tr>
<td width="10%" align="center"><img src="../../img/BabangKurir.png" style="width: 300px;"></td>
<td width="80%" align="center">   <font style="font-family:'Times New Roman';font-size:24px;"></font><br><br><font style="font-family:'Times New Roman';font-size:20px;"></font><br>
<font style="font-family:'Arial';font-size:25px;"></font><br>
<font style="font-family:'Arial';font-size:15px;"></font>
</td>
</tr><hr>
</table>

<p style="text-align:center;"><strong><u><span style="font-family:'Times New Roman';text-decoration:underline;font-size:16px;">Slip Gaji</span></u></strong><br>Priode <?= tanggal_indo($_GET['tglawal']);?> - <?= tanggal_indo($_GET['tgllakhir']);?></p>

<table border="0">
  <tr>
    <td width="20">Nama</td>
    <td width="5">:</td>
    <td width="250"><?php echo $driver['nama_driver'];?></td>
  </tr>
  <tr>
    <td>No BB</td>
    <td>:</td>
    <td ><?php echo $driver['nobb'];?></td>
  </tr>
  <tr>
    <td>Level</td>
    <td>:</td>
    <td ><?php echo $driver['nama_level'];?></td>
  </tr>
  
</table>
 <table width="100%" style="font-family: sans-serif;color: #232323;border-collapse: collapse;">
                                   
                                        <tr style="border: 0.1px;">
                                            <th style="width:25px; text-align: center; height: 20px;border: 0.1;">No</th>
                                            <th  style="width:100px; text-align: center; height: 20px;border: 0.1;"> Tanggal </th>
                                            <th  style="width:100px; text-align: center; height: 20px;border: 0.1;" > Income </th>
                                            <th  style="width:100px; text-align: center; height: 20px;border: 0.1;" > Bon </th>
                                            <th  style="width:100px; text-align: center; height: 20px;border: 0.1;"> Gaji Kotor </th>
                                            <th  style="width:100px; text-align: center; height: 20px;border: 0.1;"> Gaji Bersih </th>
                                        </tr>
                                    
                                       
                                          <?php 
    $tgl_awal=$_GET['tglawal'];
    $tgl_akhir=$_GET['tgllakhir']; $no=1; 
        $level_driver=$koneksi->query("SELECT * FROM laporanharian  where tgllaporan between '$tgl_awal' and '$tgl_akhir' and id_driver='$_GET[id_driver]'");

            while($m=mysqli_fetch_array($level_driver)){
              ;
        $income+=$m['income'];
        $gaji+=$m['gaji'];

        $bon+=$m['bon'];
          ?> 
                            <tr style="border: 0.1px;">
                                <td  style="text-align: center; height: 20px;border: 0.1;"><?php echo $no;?></td>
                                 <td style="text-align: center; height: 20px;border: 0.1;" ><?php echo tanggal_indo($m['tgllaporan']);?></td>
                                 <td style="height: 20px;border: 0.1;">Rp <?= number_format($m['income'],0,",",".");?></td>
                                 <td style="height: 20px;border: 0.1;">Rp <?php if($m['bon']==''){ echo"0";}else{ echo number_format($m['bon'],0,",",".");}?></td>
                                 <td style="height: 20px;border: 0.1;">Rp <?= number_format($m['gaji'],0,",",".");?></td>
                                 <td style="height: 20px;border: 0.1;">Rp <?= number_format($m['gaji']-$m['bon'],0,",",".");?></td>
                                
                            </tr>
                            <?php 
                            $no++;
                            } ?>
                             <tr>
                                <td colspan="2" style="text-align: center; height: 20px;border: 0.1;">Total</td>
                                <td style="height: 20px;border: 0.1;">Rp <?= number_format($income,0,",",".");?></td>
                                <td style="height: 20px;border: 0.1;">Rp <?= number_format($bon,0,",",".");?></td>
                                <td style="height: 20px;border: 0.1;">Rp <?= number_format($gaji,0,",",".");?></td>
                                <td style="height: 20px;border: 0.1;">Rp <?= number_format($gaji-$bon,0,",",".");?></td>
                            </tr>
                                </table>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="Surat_domisili_rumah_ibadah".$kode.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'../../../html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 0, 40, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>

 
