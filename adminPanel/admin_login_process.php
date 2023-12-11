<?php
session_start();

include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $admin_username = $_POST["admin-username"];
  $admin_password = $_POST["admin-password"];

  $sql = "SELECT * FROM admin_table WHERE admin_username = '$admin_username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($admin_password, $row['admin_password'])) {
      $_SESSION["admin_id"] = $row["admin_id"];

      header("Location: ./admin_panel.php");
      exit();

    } else {
      echo "
        <script>
          alert('Incorrect username or password.');
          window.location.href = './admin_login.php';
        </script>
      ";
    }
  } else {
    echo "
        <script>
          alert('Incorrect username or password.');
          window.location.href = './admin_login.php';
        </script>
      ";
  }

} else {
  header("Location: ./admin_login.php");
}

$conn->close();
?>