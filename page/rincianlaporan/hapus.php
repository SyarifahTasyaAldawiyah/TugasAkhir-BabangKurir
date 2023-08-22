<?php 
   
     $hapus1=$koneksi->query("DELETE FROM laporanharian WHERE id_driver='$_GET[id_driver]' and tgllaporan='$_GET[id]'");
     $hapus2=$koneksi->query("DELETE FROM detailorderan where id_driver='$_GET[id_driver]' and tglorder='$_GET[id]'");
     $hapus2=$koneksi->query("DELETE FROM detaillaporanharian where id_driver='$_GET[id_driver]' and tgllaporanharian='$_GET[id]'");
 echo"<script>alert('Data orderan berhasil di Hapus !!!'); window.location = '?page=page/rincianlaporan/index'</script>";
?>