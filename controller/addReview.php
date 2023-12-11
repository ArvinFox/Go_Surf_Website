<?php
include "../config/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rating = $_POST['rating'];
  $user_id = $_POST['user-id'];
  $content = $_POST['review'];
  $date = date("Y-m-d");

  $sql = "INSERT INTO reviews (review_user_id, content, date_created, stars) VALUES ($user_id, '$content', '$date', $rating)";
  $result = $conn->query($sql);

  if ($result) {
    echo "
      <script>
        alert('Review added. Thank you!');
        window.location.href = '../index.php';
      </script>
    ";
  } else {
    echo "<script>alert('Unable to add review.')</script>";
    header("Location: ../index.php");
    exit();
  }

  $conn->close();

} else {
  header("Location: ../login.php");
  exit();
}
?>