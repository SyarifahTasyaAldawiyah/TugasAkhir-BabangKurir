<?php 
   
     $koneksi->query("DELETE FROM kode_order WHERE id_kode='$_GET[id]'");
 echo"<script>alert('Data Berhasil di Hapus !!!'); window.location = '?page=page/kodeorder/index&id=Data Kode Driver'</script>";
?>