<?php
include 'koneksi.php';
$menu = $_POST['menu'];
$harga = $_POST['harga'];

// Update the "makanan" table
mysqli_query($koneksi, "UPDATE makanan SET harga='$harga' WHERE menu='$menu'");

// Update the "minuman" table
mysqli_query($koneksi, "UPDATE minuman SET harga='$harga' WHERE menu='$menu'");

header("location:admin.php?pesan=update");
?>
