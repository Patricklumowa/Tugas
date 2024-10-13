<?php
require '../functions/functions.php';

if (isset($_POST["daftar"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
    alert('Registrasi Berhasil!');
    document.location.href = 'main.php';
          </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="register.css" />
  <!-- Mengacu pada file CSS register.css -->
  <title>Perpustakaan Digital - Daftar</title>
</head>

<body>
  <div class="container">
    <form action="" class="register-form" method="POST">
      <h2>Daftar Akun</h2>
      <label for="name">Nama:</label>
      <input type="text" id="name" name="name" required />

      <label for="email">Alamat Email:</label>
      <input type="email" id="email" name="email" required />

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required />

      <label for="re-password">Re-enter Password:</label>
      <input type="password" id="re-password" name="re-password" required />

      <button type="submit" name="daftar">Daftar</button>
    </form>
  </div>
</body>

</html>