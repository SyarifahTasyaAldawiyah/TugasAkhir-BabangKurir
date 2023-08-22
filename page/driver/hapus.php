<?php 
   $hapus= $koneksi->query("select*from driver where id_driver='$_GET[id]'");
    // memilih gambar1 untuk dihapus
    $nama_gambar1=mysqli_fetch_array($hapus);
    // nama field gambar1
    $lokasi=$nama_gambar1['foto'];
    $lokasi1=$nama_gambar1['ktp'];
    // alamat tempat gambar1
    $hapus_gambar1="img/driver/$lokasi";
    $hapus_gambar2="img/ktp/$lokasi1";
    // script delete gambar1 dari folder
    unlink($hapus_gambar1);
    unlink($hapus_gambar2);
     $koneksi->query("DELETE FROM driver WHERE id_driver='$_GET[id]'");
 echo"<script>alert('Data Berhasil di Hapus !!!'); window.location = '?page=page/driver/index&id=Data Driver'</script>";
?>