<?php
include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_POST['user-id'];
  $current_password = $_POST['current-password'];
  $new_password = $_POST['password'];
  $confirmNewPassword = $_POST['confirmPassword'];

  $verify_old_pw_sql = "SELECT * FROM customer WHERE id = $user_id";
  $verify_old_pw_result = $conn->query($verify_old_pw_sql);

  $row = $verify_old_pw_result->fetch_assoc();

  if (!password_verify($current_password, $row['password'])) {
    ?>
    <script>
      alert('Incorrect current password.');
      window.location.href = '../change_password.php';
    </script>

    <?php
  } else {
    if ($new_password == $confirmNewPassword) {
      $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

      $sql = "UPDATE customer SET password = '$hashedPassword' WHERE id = $user_id";
      $result = $conn->query($sql);

      if ($result) {
        ?>
        <script>
          alert('Password successfully changed.');
          window.location.href = '../userPanel/customerPanel.php';
        </script>

        <?php
      } else {
        ?>
        <script>
          alert('Unable to change password.');
          window.location.href = '../userPanel/customerPanel.php';
        </script>

        <?php
      }
    } else {
      ?>
      <script>
        alert('The new passwords do not match.');
        window.location.href = '../change_password.php';
      </script>
      
      <?php
    }
  }

  $conn->close();

} else {
  header("Location: ../login.php");
  exit();
}
?>