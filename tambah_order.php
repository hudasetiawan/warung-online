<?php
session_start();
$username = $_SESSION['username']; // Ambil ID pengguna dari sesi atau cookie    
include('koneksi.php');

if (isset($_POST['kirim'])) {
    $menu = $_POST['menu'];
    $jumlah = $_POST['jumlah'];

    // Check if the menu exists in the "makanan" table
    $query = "SELECT harga FROM makanan WHERE menu = '$menu'";   
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $harga = $row['harga'];
    } else {
        // If the menu is not found in the "makanan" table, check the "minuman" table
        $query = "SELECT harga FROM minuman WHERE menu = '$menu'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $harga = $row['harga'];
        } else {
            echo '<script>alert("Menu tidak ditemukan!"); window.location.href = "user.php";</script>';
            exit;
        }
    }

    // Insert data into the "orderan" table
    $insertQuery = "INSERT INTO orderan (username, menu, harga, jumlah) VALUES ('$username', '$menu', '$harga', '$jumlah')";
    $insertResult = mysqli_query($koneksi, $insertQuery);

    if ($insertResult) {
        echo '<script>alert("Order Berhasil!"); window.location.href = "user.php";</script>';
    } else {
        echo '<script>alert("Order Gagal!"); window.location.href = "user.php";</script>';
    }
} else {
    header("location: user.php");
}
?>
