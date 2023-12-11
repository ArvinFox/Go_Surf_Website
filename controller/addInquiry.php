<?php
include "../config/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $sql = "INSERT INTO inquiries (user_name, user_email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
  $result = $conn->query($sql);

  if ($result) {
    echo "
      <script>
        alert('Inquiry sent successfully.');
        window.location.href = '../index.php';
      </script>
    ";
    
  } else {
    echo "<script>alert('Unable to send inquiry.')</script>";
    header("Location: ../index.php");
    exit();
  }

  $conn->close();
} else {
  header("Location: ../index.php");
  exit();
}
