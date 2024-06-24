<?php
session_start();
include 'koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi username
    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        echo '<script>alert("Username hanya boleh terdiri dari huruf dan angka."); window.location.href = "index.php";</script>';
        exit();
    }

    // Validasi password
    if (strlen($password) < 8) {
        echo '<script>alert("Password harus memiliki minimal 8 karakter."); window.location.href = "index.php";</script>';
        exit();
    }

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        if ($role == 'Penjual') {
            // Login berhasil untuk penjual
            echo '<script>alert("Login berhasil sebagai penjual."); window.location.href = "admin.php";</script>';
            exit();
        } else if ($role == 'Pembeli') {
            // Login berhasil untuk pembeli
            echo '<script>alert("Login berhasil sebagai pembeli."); window.location.href = "user.php";</script>';
            exit();
        }
    } else {
        // Login gagal
        echo '<script>alert("Username atau password salah."); window.location.href = "index.php";</script>';
        exit();
    }
} else {
    echo '<script>alert("Program error"); window.location.href = "index.php";</script>';
    exit();
}
?>
