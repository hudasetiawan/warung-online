<?php 
    session_start();
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>War-On Penjual</title>
    <link rel="shortcut icon" href="assets/img/warung.png">
    <link rel="stylesheet" href="assets/navbar.css">
    <link rel="stylesheet" href="assets/tabel.css">
    <link rel="stylesheet" href="assets/popup.css">
    <style>
        a.edit {
            color: black;
            text-decoration: none;
        }

        a.edit:hover {
            color: green;
        }

        a.hapus {
            color: black;
            text-decoration: none;
        }

        a.hapus:hover {
            color: red;
        }
    </style>
</head>

<body>
    <nav>
        <img src="assets/img/logo.png" alt="Logo">
        <a href="admin.php" class="active">Menu</a>
        <a href="tambah_menu.php">Tambah Menu</a>
        <a href="order.php">List Order</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div>
        <h2 style="margin-top: 100px;" align="center">List Menu Makanan</h2>
        <table border="1" align="center">
            <tr>
                <th>No</th>
                <th id="menu">Menu</th>
                <th>Harga</th>
                <th>Edit Menu</th>
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
                    <td>
                        <a class="edit" id="openPopup" data-menu="<?php echo $d['menu']; ?>">Edit</a>
                        <a class="hapus" href="#" onclick="confirmDelete('<?php echo $d['menu']; ?>')">Hapus</a>
                    </td>
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
                <th>Edit Menu</th>
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
                    <td>
                        <a class="edit" id="openPopup" data-menu="<?php echo $d['menu']; ?>">Edit</a>
                        <a class="hapus" href="#" onclick="confirmDelete('<?php echo $d['menu']; ?>')">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <div class="popup">
        <div class="popup-content">
            <h2 align="center">Edit Menu</h2>
            <div class="order-form">
                <form action="update.php" method="post">
                    <label>Nama Menu</label><br>
                    <input type="text" name="menu" id="menuInput">
                    <label>Harga</label>
                    <input type="number" name="harga" id="hargaInput"></td>
                    <input type="submit" value="Simpan"></td>
                </form>
            </div>
            <button class="closePopup">Close</button>
        </div>
    </div>

    <div class="overlay"></div>

    <script>
        var editLinks = document.getElementsByClassName('edit');
        var closePopupButtons = document.getElementsByClassName('closePopup');
        var overlay = document.getElementsByClassName('overlay')[0];

        for (var i = 0; i < editLinks.length; i++) {
            editLinks[i].addEventListener('click', function() {
                var menu = this.getAttribute('data-menu');
                document.getElementById('menuInput').value = menu;
                document.getElementsByClassName('popup')[0].style.display = 'block';
                overlay.style.display = 'block';
            });
        }

        for (var i = 0; i < closePopupButtons.length; i++) {
            closePopupButtons[i].addEventListener('click', function() {
                document.getElementsByClassName('popup')[0].style.display = 'none';
                overlay.style.display = 'none';
            });
        }

        function confirmDelete(menu) {
            if (confirm("Apakah Anda yakin ingin menghapus menu " + menu + "?")) {
                window.location.href = "hapus.php?menu=" + menu;
            }
        }
    </script>
</body>

</html>