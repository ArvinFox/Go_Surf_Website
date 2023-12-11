<?php
include "../config/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $board_name = $_POST['board-name'];
  $price = $_POST['price'];
  $board_desc = $_POST['board-desc'];
  $board_type = $_POST['board-type'];
  $stock = $_POST['stock'];

  $fname = $_FILES['board-image']['name'];
  $temp = $_FILES['board-image']['tmp_name'];

  $location = "../uploads/";
  $image = $location . $fname;

  $target_dir = "../uploads/";
  $finalImage = $target_dir . $fname;

  move_uploaded_file($temp, $finalImage);

  $sql = "INSERT INTO boards (board_name, board_image, price, board_desc, board_type, stock) VALUES ('$board_name', '$image', $price, '$board_desc', $board_type, $stock)";

  if ($conn->query($sql) === TRUE) {
    // Update Boards Types Stock
    $board_types_sql = "SELECT * FROM board_types";
    $board_types_result = $conn->query($board_types_sql);

    if ($board_types_result->num_rows > 0) {
      $board_types_row = $board_types_result->fetch_assoc();

      $board_types_stock_sql = "UPDATE board_types SET type_stock = (SELECT SUM(boards.stock) FROM boards WHERE board_types.type_id = boards.board_type)";
      $conn->query($board_types_stock_sql);
    }
    //

    echo "
      <script>
        alert('Board added successfully.');
        window.location.href = '../adminView/viewAllBoards.php';
      </script>
    ";

  } else {
    echo "<script>alert('Unable to add board.')</script>";
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();
  
} else {
  header("Location: ../adminPanel/admin_login.php");
  exit();
}
