<?php 
   
     $hapus1=$koneksi->query("DELETE FROM laporanharian WHERE id_driver='$_GET[id]' and tgllaporan='$_GET[tanggal]'");
     $hapus2=$koneksi->query("DELETE FROM detaillaporanharian  where id_driver='$_GET[id]' and tgllaporanharian='$_GET[tanggal]'");
     $sql=$koneksi->query( "UPDATE detailorderan SET 
        status = 'Baru' WHERE id_driver='$_GET[id]' and tglorder='$_GET[tanggal]'");

 echo"<script>alert('Data Laporan di Hapus !!!'); window.location = '?page=page/laporanharian/index'</script>";
?>