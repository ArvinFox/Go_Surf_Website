<?php
include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_POST['user-id'];

  $fname = $_FILES['user-image']['name'];
  $temp = $_FILES['user-image']['tmp_name'];

  $location = "../assets/images/";
  $image = $location.$fname;

  $target_dir = "../assets/images/";
  $finalImage = $target_dir.$fname;

  move_uploaded_file($temp, $finalImage);

  $sql = "UPDATE customer SET user_image = '$image' WHERE id = $user_id";
  $result = $conn->query($sql);

  if ($result) {
    ?>
    <script>
      alert('Profile picture has been updated.');
      window.location.href = '../userPanel/customerPanel.php';
    </script>

    <?php
  } else {
    ?>
    <script>
      alert('Unable to change profile picture.');
      window.location.href = '../userPanel/customerPanel.php';
    </script>
    
    <?php
  }

  $conn->close();

} else {
  header("Location: ../login.php");
  exit();
}
?>