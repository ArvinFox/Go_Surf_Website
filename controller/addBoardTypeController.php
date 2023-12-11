<?php
include "../config/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $board_type = $_POST["board-type"];

  $insert = "INSERT INTO board_types (type_name) VALUES ('$board_type')";
  $result = $conn->query($insert);

  if ($result) {
    echo "
      <script>
        alert('Board Type Added.');
        window.location.href = '../adminView/viewBoardTypes.php';
      </script>
    ";

  } else {
    echo "<script>alert('Unable to add board type.')</script>";
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();

} else {
  header("Location: ../adminPanel/admin_login.php");
  exit();
}
