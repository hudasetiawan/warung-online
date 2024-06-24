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
    <link rel="stylesheet" href="assets/tabel.css">
    <link rel="stylesheet" href="assets/orderform.css">
    <style>
        /* CSS untuk animasi scroll */
        html {
            scroll-behavior: smooth;
        }

        /* CSS untuk tautan active pada navbar */
        .active {
            color: red;
        }

        table {
            margin-bottom: 50px;
        }

        .order-form {
            margin-bottom: 100px;
        }

        .order-form button {
            background-color: rgb(250, 42, 42);
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        .order-form button:hover {
            background-color: rgb(218, 2, 2);
        }

        select {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 8px;
            margin: 8px 0;
            width: 96.5%;
        }
    </style>
    <script>
        function scrollToOrderForm() {
            var orderForm = document.getElementById("order-form");
            orderForm.scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>

</head>

<body>
    <nav>
        <img src="assets/img/logo.png" alt="Logo">
        <a href="#" class="active">Menu</a>
        <a href="#order-form" onclick="scrollToOrderForm()">Orders Now</a>
        <a href="myorder.php">My Orders</a>
        <a href="logout.php">Logout</a>
    </nav>

    <div>
        <h2 style="margin-top: 100px;" align="center">List Menu Makanan</h2>
        <table border="1" align="center">
            <tr>
                <th>No</th>
                <th id="menu">Menu</th>
                <th>Harga</th>
            </tr>
            <?php
            include('koneksi.php');
            $no = 1;
            $data = mysqli_query($koneksi, "select * from makanan");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['menu']; ?></td>
                    <td><?php echo "RP. " . $d['harga']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <div>
        <h2 style="margin-top: 100px;" align="center">List Menu Minuman</h2>
        <table border="1" align="center">
            <tr>
                <th>No</th>
                <th id="menu">Menu</th>
                <th>Harga</th>
            </tr>
            <?php
            include('koneksi.php');
            $no = 1;
            $data = mysqli_query($koneksi, "select * from minuman");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['menu']; ?></td>
                    <td><?php echo "RP. " . $d['harga']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <!-- Awal Form Order -->
    <div class="luar">
        <div class="order-form" id="order-form">
            <h2>Order Here!</h2>
            <form method="post" action="tambah_order.php">
                <label>Nama Menu</label><br>
                <input type="text" name="menu" placeholder="Menu yang anda pesan" required><br>
                <label>Jumlah</label><br>
                <input type="number" name="jumlah" placeholder="Jumlah yang anda pesan" required><br>
                <button type="submit" name="kirim">Order</button>
            </form>
        </div>
    </div>
    <!-- Akhir Form Order -->
</body>

</html>