<?php
require "koneksi.php";

session_start();

if (isset($_POST["login"])) {
  $username = strtolower($_POST["username"]);
  $pass = $_POST["password"];
  $role = $_POST["role"];

  // Ubah result disini
  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '' ");
  
  // Ubah true disini
  if (password_verify(
    $pass, $row ['password']
    ) and 
    ($row['role']== 'admin') and 
    ($row['role']== 'admin')) {

      $_SESSION["akses"] = "admin";
      header("location : read.php");
      exit;
    // Ubah row disini
    $row = "";
    
    // Ubah true disini
    if (true and 
    ($row['role'] == 'admin') and 
    ($row['role'] == $role)) {
      
      $_SESSION["akses"] = "admin";
      header("location: read.php");
      exit;
      
    // Ubah true disini
    } else if ( true and 
      ($row['role'] == 'user') and 
      ($row['role'] == $role)) {

      $_SESSION["akses"] = "user";
      header("location: user.php");
      exit;

    } else {
      echo "
        <script>
          alert('Username atau Password Anda Tidak Ada');
          document.location.href = 'login.php';
        </script>
      ";
    }
  } else {
    echo "
        <script>
          alert('Username atau Password Anda Salah');
          document.location.href = 'login.php';
        </script>
      ";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="register-login.css">
</head>

<body>
  <div class="bg">
    <div class="container">
      <form action="" method="POST">
        <h3>Login</h3>
        <div class="inputBox">
          <label for="">Username</label>
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="inputBox">
          <label for="">Password</label>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="inputBox">
          <label for="">Role</label>
          <select name="role" class="roles" id="" required>
            <option value="">Select Role</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
        </div>
        <input type="submit" value="Login" name="login">
        <div class="links">
          <p>Belum punya akun?</p>
          <a href="register.php" class="khusus">Register</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>