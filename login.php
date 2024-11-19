<?php
include "koneksi.php";

if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

  if (mysqli_num_rows($cek) > 0) {
    $data = mysqli_fetch_array($cek);
    $_SESSION['user'] = $data;
    echo '<script>alert("Selamat datang!"); window.location.href="index.php";</script>';
  } else {
    echo '<script>alert("username/password salah!"); window.location.href="login.php";</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Aplikasi Biodata</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>
<style>
  .container {
    padding-top: 100px;
  }

  body {
    background-color: #151515;
  }
</style>

<body>
<div class="container d-flex justify-content-center align-items-center"">
  <div class="card" style="max-width: 600px; width: 200%; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <div class="card-header text-center">
      Login Aplikasi Biodata
    </div>
    <div class="card-body">
      <form method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username atau nama Anda" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Anda" required>
        </div>
        <button type="submit" class="btn btn-success w-100" name="masuk">Submit</button>
        <div class="text-center pt-3">
          <p>Belum punya akun? <a href="register.php">Daftar</a></p>
        </div>
      </form>
    </div>
  </div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>