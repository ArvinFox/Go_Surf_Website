<?php
include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if the email address exists in the database
    $sql = "SELECT * FROM customer WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Check if the new passwords match
      if ($password === $confirmPassword) {
        // Update the password in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE customer SET password = '$hashedPassword' WHERE email = '$email'";
        $conn->query($sql);

        // Display a success message
        echo "
          <script>
            alert('Your password has been successfully reset.');
            window.location.href = '../login.php';
          </script>
        ";

      } else {
        // Display an error message
        echo "
          <script>
            alert('The new passwords do not match.');
            window.location.href = '../newpwd.php';
          </script>
        ";
      }

    } else {
      // Display an error message
      echo "
        <script>
          alert('The email address you entered does not exist.');
          window.location.href = '../newpwd.php';
        </script>
      ";
    }
  }
  
} else {
  header("Location: ../newpwd.php");
  exit();
}

$conn->close();
?>
