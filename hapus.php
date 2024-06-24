<?php 
include 'koneksi.php';
$menu =$_GET['menu'];

mysqli_query($koneksi, "DELETE FROM makanan WHERE menu='$menu'") or die(mysqli_error($koneksi));

mysqli_query($koneksi, "DELETE FROM minuman WHERE menu='$menu'") or die(mysqli_error($koneksi));

header("location:admin.php?pesan=hapus");
?>