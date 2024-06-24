<!DOCTYPE html>
<html lang="en">
  <head>
    <title>War-On</title>
    <link rel="shortcut icon" href="assets/img/warung.png">
    <link rel="stylesheet" href="assets/login.css"/>
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form action="signup.php" method="post">
          <h1>Buat Akun</h1>
          <input type="text" name="username" placeholder="Username" required/>
          <input type="password" name="password" placeholder="Password" required/>
          <select name="role">
            <option disabled selected>Pilih Akun</option>
            <option value="Penjual">Penjual</option>
            <option value="Pembeli">Pembeli</option>
          </select>
          <button type="submit" name="kirim">Sign Up</button>
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form action="login.php" method="post">
          <h1>Sign in</h1>
          <input type="text" name="username" placeholder="Username" required/>
          <input type="password" name="password" placeholder="Password" required/>
          
          <button type="submit" name="kirim">Sign In</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Selamat Datang kembali!</h1>
            <p>
              Untuk tetap terhubung dengan kami, silakan login dengan info pribadi Anda
            </p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Halo, Teman!</h1>
            <p>Masukkan data Anda dan mulailah perjalanan bersama kami</p>
            <span>Belum punya akun?</span>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      const signUpButton = document.getElementById("signUp");
      const signInButton = document.getElementById("signIn");
      const container = document.getElementById("container");

      signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
      });

      signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
      });
    </script>
  </body>
</html>
