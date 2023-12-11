<?php
include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rental_id = $_POST['rental-id'];

  if ($_POST['is-paid'] == 0) {
    $sql = "UPDATE rentals SET payment_status = 1 WHERE rental_id = $rental_id";
    $result = $conn->query($sql);
    
  } else {
    $sql = "UPDATE rentals SET payment_status = 0 WHERE rental_id = $rental_id";
    $result = $conn->query($sql);
  }

  if ($result) {
    ?>
    <script>
      alert('Payment status updated successfully.');
      window.location.href = '../adminView/viewAllOrders.php';
    </script>

    <?php
  } else {
    echo "<script>alert('Unable to update payment status.')</script>";
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();

} else {
  header("Location: ../adminView/viewAllOrders.php");
  exit();
}
?>