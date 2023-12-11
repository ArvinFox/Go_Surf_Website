<?php
include "../config/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $board_id = $_POST['delete-board'];

  $sql = "DELETE FROM boards WHERE board_id = $board_id";
  $result = $conn->query($sql);

  // Update Boards Types Stock
  $board_types_sql = "SELECT * FROM board_types";
  $board_types_result = $conn->query($board_types_sql);

  if ($board_types_result->num_rows > -1) {
    $board_types_row = $board_types_result->fetch_assoc();

    $board_types_stock_sql = "UPDATE board_types SET type_stock = (SELECT SUM(boards.stock) FROM boards WHERE board_types.type_id = boards.board_type)";
    $conn->query($board_types_stock_sql);
  }
  //

  if ($result) {
    echo "
      <script>
        alert('Board Deleted.');
        window.location.href = '../adminView/viewAllBoards.php';
      </script>
    ";

  } else {
    echo "<script>alert('Unable to delete board.')</script>";
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();
  
} else {
  header("Location: ../adminPanel/admin_login.php");
  exit();
}
