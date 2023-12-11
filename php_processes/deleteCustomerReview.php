<?php
include "../config/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $review_id = $_POST['review-id'];

  $sql = "DELETE FROM reviews WHERE review_id = $review_id";
  $result = $conn->query($sql);
  
  if ($result) {
    echo "
      <script>
        alert('Review deleted.');
        window.location.href = '../userPanel/customerReviews.php';
      </script>
    ";

  } else {
    echo "<script>alert('Unable to delete review.')</script>";
    header("Location: ../userPanel/customerReviews.php");
    exit();
  }

  $conn->close();

} else {
  header("Location: ../login.php");
  exit();
}
?>