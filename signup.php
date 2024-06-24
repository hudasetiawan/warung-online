<?php
include('koneksi.php');
if (isset($_POST['kirim'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  // Validasi menggunakan regex
  $usernamePattern = '/^[a-zA-Z0-9]+$/';
  $passwordPattern = '/^[a-zA-Z0-9]+$/';

  // Validasi password
  if (strlen($password) < 8) {
    echo '<script>alert("Password harus memiliki minimal 8 karakter."); window.location.href = "index.php";</script>';
    exit();
}

  if (preg_match($usernamePattern, $username) && preg_match($passwordPattern, $password)) {
    // Cek apakah username sudah ada dalam database
    $User = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($User) > 0) {
      echo '<script>alert("Username sudah ada!"); window.location.href = "index.php";</script>';
    } else {
      // Tambahkan data ke database jika username belum ada
      $result = mysqli_query($koneksi, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");

      if ($result) {
        echo '<script>alert("Akun berhasil ditambahkan!"); window.location.href = "index.php";</script>';
      } else {
        echo '<script>alert("Akun gagal ditambahkan!");</script>';
      }
    }
  } else {
    echo '<script>alert("Username dan Password hanya boleh menggunakan huruf dan angka!"); window.location.href = "index.php";
    </script>';
  }
}
?>
