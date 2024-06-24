<?php
    include 'koneksi.php';
    $menu = $_POST['menu'];
    $harga = $_POST['harga'];

    $query = "SELECT * FROM minuman WHERE menu = '$menu'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        // Primary key sudah ada dalam database
        echo '<script>alert("Menu sudah ada!"); window.location.href = "tambah_menu.php";</script>';
    } else {
        // Primary key belum ada, lakukan penambahan data
        $query = "INSERT INTO minuman (menu, harga) VALUES ('$menu', '$harga')";
        mysqli_query($koneksi, $query);

        header("location:admin.php");
    }
?>
