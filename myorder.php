<?php 
    session_start();
    $username = $_SESSION['username']; // Ambil ID pengguna dari sesi atau cookie    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>War-On</title>
    <link rel="shortcut icon" href="assets/img/warung.png">
    <link rel="stylesheet" href="assets/navbar.css">
    <link rel="stylesheet" href="assets/tabelOrder.css">
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <nav>
        <img src="assets/img/logo.png" alt="Logo">
        <a href="user.php" class="active">Menu</a>
        <a href="user.php" onclick="scrollToOrderForm()">Orders Now</a>
        <a href="myorder.php">My Orders</a>
        <a href="logout.php">Logout</a>
    </nav>
    <h2 style="margin-top: 100px;" align="center">List Order</h2>
    <div class="order-list">
        <table border="1" align="center">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th></th>
            </tr>
            <?php
            include('koneksi.php');
            $no = 1;
            $data = mysqli_query($koneksi, "select * from orderan WHERE username ='$username'");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['menu']; ?></td>
                    <td><?php echo "RP. " . $d['harga']; ?></td>
                    <td><?php echo $d['jumlah']; ?></td>
                    <td>
                        <a href="#" onclick="confirmDelete('<?php echo $d['menu']; ?>')" ><img src="assets/img/check.png" style="width:20px; height: 20px;"></a>
                    </td>
                    <script>
                        function confirmDelete(menu) {
                            if (confirm("Apakah orderan " + menu + " ingin dibatalkan?")) {
                                window.location.href = "hapus_myorder.php?menu=" + menu;
                            }
                        }
                    </script>
                </tr>
            <?php
            }
            ?>
    </div>
</body>

</html>