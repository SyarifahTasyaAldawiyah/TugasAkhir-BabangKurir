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
include_once("../../config/tgl_indo.php"); //buat koneksi ke database
include_once("../../config/waktu.php"); //buat koneksi ke database
 

?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>lAPORAN HARIAN</title>

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

<p style="text-align:center;"><strong><u><span style="font-family:'Times New Roman';text-decoration:underline;font-size:16px;">lAPORAN HARIAN</span></u></strong><br>Priode <?= tanggal_indo($_GET['tglawal']);?> - <?= tanggal_indo($_GET['tgllakhir']);?></p>

<table style='border:solid black 1.0pt;' class="table table-bordered" id="dataTable" width="100%" border="1" cellspacing="0" >
                                   
<tr>

  <td   rowspan="2">No</td>
  <td   rowspan="2">Tanggal</td>
  <td   rowspan="2">NAMA</td>
  <td  colspan="2" rowspan="2" >ODR</td>
  <td  rowspan="2" >MODAL</td>
  <td  rowspan="2">INCOME</td>
  <td  rowspan="2" > KANTOR (+)</td>
  <td   rowspan="2" > KETERANGAN</td>
  <td  rowspan="2">BON</td>
  <td   colspan="6" >TRANSFER</td>
  <td   rowspan="2" >KANTOR (-)</td>
  <td   rowspan="2" >KETERANGAN</td>
  <td   rowspan="2">SETORAN</td>
 </tr>
<tr >
  <td  >QRIS</td>
  <td  > MAN</td>
  <td  >BCA</td>
  <td  >BPD</td>
  <td  >BRI</td>
  <td  >DLL</td>
 </tr>
          <?php //error_reporting(0);
          $tgl_awal=$_GET['tglawal'];
    $tgl_akhir=$_GET['tgllakhir'];
    $level_driver=$koneksi->query("SELECT * FROM laporanharian as l,driver as d where  l.id_driver=d.id_driver and tgllaporan between '$tgl_awal' and '$tgl_akhir' ");
            while($m=mysqli_fetch_array($level_driver)){

              $income+=$m['income'];

              $jml_order+=$m['jmlorderan'];
              $kode_order+=$m['anaksekolah'];
              $jumlahsetoran+=$m['setoran'];
$nom=1;
              $level_dri=$koneksi->query("SELECT * FROM detaillaporanharian where   id_driver='$m[id_driver]' and tgllaporanharian='$m[tgllaporan]' order by id_laporanharian asc");
            while($mon=mysqli_fetch_array($level_dri)){
              $modal+=$mon['modal'];
              $kantorplus+=$mon['kantorplus'];
              $neracaplus=$modal+$income+$kantorplus;
              $bon+=$mon['bon'];
              $qris+=$mon['qris'];
              $man+=$mon['man'];
              $bca+=$mon['bca'];
              $bpd+=$mon['bpd'];
              $bri+=$mon['bri'];
              $dll+=$mon['dll'];
              $kantorminus+=$mon['kantorminus'];
              $neracamin=$bon+$qris+$man+$bca+$bpd+$bri+$dll+$kantorminus;
          ?> 
<tr>
  <?php if($nom == 1){?>
  <td   rowspan="4"><?= $nom;?></td>
  <td   rowspan="4">  
                                    
                                     <p><?= tgl_indonesia($m['tgllaporan']);?></p></td>
  
  <td   rowspan="4"><?= $m['nama_driver'];?></td>

  <td  rowspan="4"><?= $m['jmlorderan'];?></td>
  <td  rowspan="4"><?= $m['anaksekolah'];?></td>
<?php }else{}?>
  <td ><?php if(empty($mon['modal'])){}else{ ?>Rp. <?=number_format($mon['modal'],0,",",".");}?></td>
  <?php if($nom == 1){?>
  <td rowspan="4"><?php if(empty($m['income'])){}else{ ?>Rp. <?=number_format($m['income'],0,",",".");}?></td>
<?php }else{}?>
  <td ><?php if(empty($mon['kantorplus'])){}else{ ?>Rp. <?=number_format($mon['kantorplus'],0,",",".");}?></td>
  <td  ><?= $mon['keterangan'];?></td>
  <td > <?php if(empty($mon['bon'])){}else{ ?>Rp. <?=number_format($mon['bon'],0,",",".");}?></td>
  <td  ><?php if(empty($mon['qris'])){}else{ ?>Rp. <?=number_format($mon['qris'],0,",",".");}?></td>
  <td  ><?php if(empty($mon['man'])){}else{ ?>Rp. <?=number_format($mon['man'],0,",",".");}?></td>
  <td  ><?php if(empty($mon['bca'])){}else{ ?>Rp. <?=number_format($mon['bca'],0,",",".");}?></td>
  <td  ><?php if(empty($mon['bpd'])){}else{ ?>Rp. <?=number_format($mon['bpd'],0,",",".");}?></td>
  <td  ><?php if(empty($mon['bri'])){}else{ ?>Rp. <?=number_format($mon['bri'],0,",",".");}?></td>
  <td  ><?php if(empty($mon['dll'])){}else{ ?>Rp. <?=number_format($mon['dll'],0,",",".");}?></td>
  <td  ><?php if(empty($mon['kantorminus'])){}else{ ?>Rp. <?=number_format($mon['kantorminus'],0,",",".");}?></td>
  <td  ><?= $mon['keteranganmin'];?></td>
   <?php if($nom == 1){?>
  <td   rowspan="4"><?php if(empty($m['setoran'])){}else{ ?>Rp. <?=number_format($m['setoran'],0,",",".");}?></td>
<?php }else{}?>
 </tr>
<?php $nom++; }?>
 <?php $no++; } ?>
<tr>
 
  <td   colspan="3"><b>Total</b></td>

  <td ><?= $jml_order;?></td>
  <td  ><?= $kode_order ?></td>
  <td >Rp. <?= number_format($modal,0,",",".");?></td>
  <td >Rp. <?= number_format($income,0,",",".");?></td>
  <td >Rp. <?= number_format($kantorplus,0,",",".");?></td>
  <td  ></td>
  <td >Rp. <?= number_format($bon,0,",",".");?></td>
  <td  >Rp. <?= number_format($qris,0,",",".");?></td>
  <td  >Rp. <?= number_format($man,0,",",".");?></td>
  <td  >Rp <?= number_format($bca,0,",",".");?></td>
  <td  >Rp. <?= number_format($bpd,0,",",".");?></td>
  <td  >Rp. <?= number_format($bri,0,",",".");?></td>
  <td  >Rp. <?= number_format($dll,0,",",".");?></td>
  <td  >Rp. <?= number_format($kantorminus,0,",",".");?></td>
  <td  ></td>
  
  <td  > Rp. <?= number_format($neracaplus-$neracamin,0,",",".");?></td>

 </tr>
 <tr>
 
  <td   colspan="3"><b>Balance</b></td>

  <td style='border:solid black 1.0pt;background-color: blue;'  colspan="6">Rp. <?= number_format($modal+$income+$kantorplus,0,",",".");?></td>

  <td style='border:solid black 1.0pt;background-color: red;'    colspan="10">Rp. <?= number_format($bon+$qris+$man+$bca+$bri+$dll+$neracaplus-$neracamin,0,",",".");?></td>

 </tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="Laporan Harian".$kode.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
 require_once(dirname(__FILE__).'../../../html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(2, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>

 
