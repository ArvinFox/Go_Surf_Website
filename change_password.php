<?php
session_start();

if (!(isset($_SESSION['user_id']) || isset($_COOKIE['user_id']))) {
  header("Location: ./index.php");
  exit();
}

include './config/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Change Password - Go-Surf Sri Lanka</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./assets/css/forms.css">
  <link rel="icon" type="image/png" href="./assets/surf_img/head_logo.png" />

  <style>
    @media (max-width: 500px) {
      .form {
        width: 300px;
      }
    }

    @media (min-width: 501px) and (max-width: 699px) {
      .form {
        width: 400px;
      }
    }
  </style>
</head>

<body>
  <section class="header">
    <img class="logo" src="./assets/surf_img/logo.png" width="150px" height="80px">

    <div class="form">
      <form action="./php_processes/change_pw_process.php" method="post" onsubmit="return checkPassword()">
        <input type="hidden" name="user-id" value="<?php 
          if (isset($_SESSION['user_id'])) {
            echo $_SESSION['user_id'];
          } else if (isset($_COOKIE['user_id'])) {
            echo $_COOKIE['user_id'];
          }
        ?>">

        <h1>Change your password </h1>

        You can change your password using this form.
        <br><br>

        <label for="text">
          <b> Current Password </b>
        </label>
        <br>
        <input type="password" name="current-password" placeholder="Current Password">

        <br><br>
        <label for="text">
          <b> New Password </b>
        </label>
        <br>
        <input type="password" name="password" placeholder="Password" id="password" oninput="checkPasswordStrength()" maxlength="12" required>
        <br>
        <p id="password-message"></p>

        <label for="text">
          <b> Verify Password </b>
        </label>
        <br>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Password" required>
        <br>
        <p id="message"></p>

        <div class="btn">
          <input type="submit" value="Change" id="button">
        </div>
      </form>
    </div>
  </section>

  <!-- JavaScript for Password verification -->
  <script>
    function checkPasswordStrength() {
      let password = document.getElementById("password").value;
      let message = document.getElementById("password-message");

      // Check if password meets the required conditions
      let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]).{8,12}$/;

      if (regex.test(password)) {
        message.textContent = "Password strength: Strong";
        message.style.color = "green";
      } else {
        message.textContent = "Password strength: Weak. The password should be between 8 - 12 characters and must contain at least one digit, one lowercase letter, one uppercase letter, and one special character.";
        message.style.color = "red";
      }
    }

    function checkPassword() {
      let password = document.getElementById("password").value;
      let confirmPassword = document.getElementById("confirmPassword").value;
      let message = document.getElementById("message");

      // Check if password meets the required conditions
      let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]).{8,12}$/;

      if (!regex.test(password)) {
        message.textContent = "Passwords do not meet the requirements.";
        return false; // Prevent form submission
      }

      if (password !== confirmPassword) {
        message.textContent = "Passwords do not match.";
        return false; // Prevent form submission
      }

      message.textContent = ""; // Clear the message
      return true; // Allow form submission
    }
  </script>
</body>
</html>
