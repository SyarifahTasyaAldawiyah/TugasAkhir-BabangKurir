<?php 
  
     $koneksi->query("DELETE FROM level_driver WHERE id_level='$_GET[id]'");
 echo"<script>alert('Data Berhasil di Hapus !!!'); window.location = '?page=page/level_driver/index&id=Data Level Driver'</script>";
?>