<?php
include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $review_id = $_POST['review-id'];
  $is_displayed = $_POST['is-displayed'];

  if ($is_displayed == 0) {
    $sql = "UPDATE reviews SET is_displayed = 1 WHERE review_id = $review_id";
    $add = true;
  } else {
    $sql = "UPDATE reviews SET is_displayed = 0 WHERE review_id = $review_id";
    $remove = true;
  }

  $result = $conn->query($sql);

  if ($result) {
    if ($add) {
      ?>
      <script>
        alert('Review added to home page.');
        window.location.href = '../adminView/viewReviews.php';
      </script>

      <?php
    } else {
      ?>
      <script>
        alert('Review removed from home page.');
        window.location.href = '../adminView/viewReviews.php';
      </script>

      <?php
    }    
  } else {
    echo "<script>alert('Unable to take action on review in home page.')</script>";
    echo "Error: " . $conn->error . "<br>";
  }

  $conn->close();

} else {
  header("Location: ../adminPanel/admin_login.php");
  exit();
}
?>