<?php 
include 'koneksi.php';
$menu =$_GET['menu'];
mysqli_query($koneksi, "DELETE FROM orderan WHERE menu='$menu'") or die(mysqli_error($koneksi));

header("location:order.php?pesan=hapus");
?>