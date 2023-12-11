<?php
include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rental_id = $_POST['rental-id'];
  $board_id = $_POST['board-id'];

  $return_date = date("Y-m-d"); // Current date
  $update_rental_sql = "UPDATE rentals SET return_date = '$return_date'";
  $update_rental_result = $conn->query($update_rental_sql);

  $update_stock_sql = "UPDATE boards SET stock = stock + 1 WHERE board_id = $board_id";
  $update_stock_result = $conn->query($update_stock_sql);

  if ($update_rental_result && $update_stock_result) {
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
      alert('Board returned successfully!');
      window.location.href = '../adminView/viewAllOrders.php';
    </script>

  <?php
  } else {
    echo "<script>alert('Unable to return board.')</script>";
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();

} else {
  header("Location: ../adminPanel/admin_login.php");
  exit();
}
?>