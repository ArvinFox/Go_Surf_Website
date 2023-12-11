<?php
session_start();

include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM customer WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $row['password'])) {

      // Use sessions to remember customer
      $_SESSION['user_id'] = $row['id'];

      // Use cookies to remember customer (when browser is closed)
      if (isset($_POST['remember-login'])) {
        setcookie('user_id', $row['id'], time() + (3 * 24 * 60 * 60), '/');    // Cookie expires in 3 days
      }

      header("Location: ../index.php");
      exit();

    } else {
      echo "
        <script>
          alert('Incorrect email or password.');
          window.location.href = '../login.php';
        </script>
      ";
    }

  } else {
    echo "
      <script>
        alert('Incorrect email or password.');
        window.location.href = '../login.php';
      </script>
    ";
  }

} else {
  header("Location: ../login.php");
  exit();
}

$conn->close();
?>
