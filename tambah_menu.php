<!DOCTYPE html>
<html lang="en">

<head>
    <title>War-On Penjual</title>
    <link rel="shortcut icon" href="assets/img/warung.png">
    <link rel="stylesheet" href="assets/navbar.css">
    <link rel="stylesheet" href="assets/tambahMenu.css">
</head>

<body>
    <nav>
        <img src="assets/img/logo.png" alt="Logo">
        <a href="admin.php">Menu</a>
        <a href="tambah_menu.php" class="active">Tambah Menu</a>
        <a href="order.php">List Order</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container-menu">
        <div class="makanan">
            <h2>Tambah Menu Makanan<h2>
                <form method="post" action="tambah_makanan.php">
                    <table>
                        <tr>
                            <td>Nama Menu</td>
                            <td>:</td>
                            <td><input type="text" name="menu" required></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td><input type="number" name="harga" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="tambah" value="Tambah"></input></td>
                        </tr>
                    </table>
                </form>
        </div>

        <div class="minuman">
            <h2>Tambah Menu Minuman<h2>
                <form method="post" action="tambah_minuman.php">
                    <table>
                        <tr>
                            <td>Nama Menu</td>
                            <td>:</td>
                            <td><input type="text" name="menu" required></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td><input type="number" name="harga" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="tambah" value="Tambah"></input></td>
                        </tr>
                    </table>
                </form>
        </div>
    </div>
</body>

</html>