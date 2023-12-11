<?php
include_once "../config/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $board_id = $_POST['board-id'];
  $board_name = $_POST['board-name'];
  $board_desc = $_POST['board-desc'];
  $price = $_POST['price'];
  $board_type = $_POST['board-type'];
  $stock = $_POST['stock'];

  if ($_POST['is-updated'] == '0') {
    $image = $_POST['existing-board-image'];
  } else {
    $fname = $_FILES['board-image']['name'];
    $temp = $_FILES['board-image']['tmp_name'];

    $location = "../uploads/";
    $image = $location . $fname;

    $target_dir = "../uploads/";
    $final_image = $target_dir . $fname;

    move_uploaded_file($temp, $final_image);
  }

  $update_sql = "UPDATE boards SET 
            board_name = '$board_name', 
            board_desc = '$board_desc', 
            price = $price, 
            board_type = $board_type, 
            board_image = '$image', 
            stock = $stock WHERE board_id = $board_id";

  if ($conn->query($update_sql)) {
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
        alert('Board updated successfully.');
        window.location.href = '../adminView/viewAllBoards.php';
      </script>
    ";

  } else {
    echo "<script>alert('Unable to update board.')</script>";
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();
  
} else {
  header("Location: ../adminPanel/admin_login.php");
  exit();
}
