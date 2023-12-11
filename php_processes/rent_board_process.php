<?php
session_start();

include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $board_id = $_POST['board-id'];
  
  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
  } else if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
  }

  $price = $_POST['price'];
  $payment_method = $_POST['payment-method'];

  // Update board stock
  $update_stock_sql = "UPDATE boards SET stock = stock - 1 WHERE board_id = $board_id";
  $update_stock_result = $conn->query($update_stock_sql);

  // Add rental data
  $rental_days = $_POST['rental-days'];
  $rental_date = date("Y-m-d"); // Current date
  $total_cost = $price * $rental_days;

  $add_rental_sql = "INSERT INTO rentals (user_id, board_id, rental_days, rental_date, total_cost, payment_method) VALUES ($user_id, $board_id, $rental_days, '$rental_date', $total_cost, '$payment_method')";
  $add_rental_result = $conn->query($add_rental_sql);

  // If  the payment method is VISA, then update as "Paid" automatically
  if ($payment_method == "VISA") {
    $update_payment_sql = "UPDATE rentals SET payment_status = 1 WHERE user_id = $user_id";
    $conn->query($update_payment_sql);
  }

  if ($add_rental_result) {
    // Update Boards Types Stock
    $board_types_sql = "SELECT * FROM board_types";
    $board_types_result = $conn->query($board_types_sql);

    if ($board_types_result->num_rows > 0) {
      $board_types_row = $board_types_result->fetch_assoc();

      $board_types_stock_sql = "UPDATE board_types SET type_stock = (SELECT SUM(boards.stock) FROM boards WHERE board_types.type_id = boards.board_type)";
      $conn->query($board_types_stock_sql);
    }
    //
?>
    <script>
      alert('Board rented successfully.');
      window.location.href = '../boards.php';
    </script>
  <?php
  } else {
    echo "<script>alert('Unable to rent board.')</script>";
    header("Location: ../boards.php");
    exit();
  }

  $conn->close();
  
} else {
  header("Location: ../boards.php");
  exit();
}
?>