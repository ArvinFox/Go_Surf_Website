<?php
session_start();

if (isset($_SESSION["admin_id"])) {
  header("Location: ./admin_panel.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - Go-Surf Sri Lanka</title>
  <link rel="stylesheet" href="../assets/css/forms.css">
  <link rel="icon" type="image/png" href="../assets/surf_img/head_logo.png"/>

</head>
<body>
  <section class="header">
    <img src="../assets/surf_img/logo.png" width="150px" height="80px">
    <div class="form login">
      <form action="./admin_login_process.php" method="post">
      <h1>Admin - Login </h1>
      <br>
      <label for="text">
        <b> Username</b>
      </label>
      <br>
      <input type="text" name="admin-username" placeholder="Enter Admin Username" style="width: 100%;" required>
      <br><br>
      <label for="text">
        <b> Password </b>
      </label>
      <br>
      <input type="password" name="admin-password" placeholder="Password" required>
      <br>
      <br>
      <div class="btn">
        <input type="submit" value="Login" id="button">
      </div>
      <br>
      </form>
    </div>
  </section>
</body>
</html>