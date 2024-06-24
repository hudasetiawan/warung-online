<!DOCTYPE html>
<html lang="en">

<head>
    <title>War-On</title>
    <link rel="stylesheet" href="assets/navbar.css">
    <link rel="stylesheet" href="assets/orderform.css">
</head>

<body>
    <h2 align="center">Edit Menu</h2>
    <?php
    include "koneksi.php";
    $menu = $_GET['menu'];
    $data = mysqli_query($koneksi, "SELECT * from makanan WHERE menu='$menu'") or die(mysqli_error($koneksi));
    $no = 1;
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <div class="order-form">
            <form action="update.php" method="post">
                <label>Nama Menu</label><br>
                <input type="text" name="menu" value="<?php echo $d['menu'] ?>">
                <label>Harga</label>
                <input type="number" name="harga" value="<?php echo $d['harga'] ?>"></td>
                <input type="submit" value="Simpan"></td>
            </form>
        </div>
    <?php
    }
    ?>
</body>

</html>