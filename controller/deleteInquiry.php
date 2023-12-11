<?php
include "../config/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $inquiry_id = $_POST['inquiry-id'];

  $sql = "DELETE FROM inquiries WHERE inquiry_id = $inquiry_id";
  $result = $conn->query($sql);
  
  if ($result) {
    echo "
      <script>
        alert('Inquiry deleted.');
        window.location.href = '../adminView/viewInquiries.php';
      </script>
    ";

  } else {
    echo "<script>alert('Unable to delete inquiry.')</script>";
    echo "Error:" . $conn->error . "<br>";
  }

  $conn->close();

} else {
  header("Location: ../adminPanel/admin_login.php");
  exit();
}
?>