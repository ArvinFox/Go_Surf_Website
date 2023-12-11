<?php
include "../config/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $type_id = $_POST['delete-type'];

  $boards_sql = "DELETE FROM boards WHERE board_type = $type_id";
  $boards_result = $conn->query($boards_sql);

  $board_type_sql = "DELETE FROM board_types WHERE type_id = $type_id";
  $board_type_result = $conn->query($board_type_sql);

  if ($board_type_result && $boards_result) {
    echo "
      <script>
        alert('Board Type Deleted.');
        window.location.href = '../adminView/viewBoardTypes.php';
      </script>
    ";

  } else {
    echo "<script>alert('Unable to delete board type.')</script>";
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();

} else {
  header("Location: ../adminPanel/admin_login.php");
  exit();
}
