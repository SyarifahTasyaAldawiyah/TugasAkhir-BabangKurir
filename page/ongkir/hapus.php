<?php 
  
     $koneksi->query("DELETE FROM ongkir WHERE id_ongkir='$_GET[id]'");
 echo"<script>alert('Data Berhasil di Hapus !!!'); window.location = '?page=page/ongkir/index'</script>";
?>