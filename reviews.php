<?php
session_start();

include './config/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Go-Surf Sri Lanka</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="./assets/css/tooltips.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Permanent+Marker&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="./assets/surf_img/head_logo.png" />
</head>

<body>
  <section class="">
    <nav id="navbar" class="fixed">
      <a href="index.php"><img src="./assets/surf_img/logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="index.php" class="click-animation-1">HOME</a></li>
          <li><a href="boards.php" class="click-animation-1">BOARDS</a></li>
          <li><a href="locations.php" class="click-animation-1">LOCATIONS</a></li>
          <li><a href="about.php" class="click-animation-1">ABOUT US</a></li>
          <li><a href="contact.php" class="click-animation-1">CONTACT US</a></li>
          <li class="user-link"></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
  </section>

  <?php
  $sql = "SELECT * FROM reviews";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  ?>
    <section class="testimonials">
      <br>

      <?php
      $count = 0; // Initialize a counter variable to check and display only two reviews in each row

      while ($row = $result->fetch_assoc()) {
        $user_id = $row['review_user_id'];

        $user_sql = "SELECT fname, lname, user_image FROM customer WHERE id = $user_id";
        $user_result = $conn->query($user_sql);

        $user_row = $user_result->fetch_assoc();

        // Check if two reviews have been displayed in the current row
        if ($count % 2 == 0) {
          echo "<div class='row'>";
        }

        echo "<div class='testimonial-col'>";

        $image_path = $user_row['user_image'];
        $image_path_str = (string) $image_path;
        $new_path = substr($image_path_str, 1);

        echo "<img src='$new_path'>";
        echo "<div>";

        $review = $row['content'];
        echo "<p>$review</p>";
        $username = $user_row['fname'] . " " . $user_row['lname'];
        echo "<h3>$username</h3>";

        $rating = $row['stars'];
        for ($i = 1; $i <= 5; $i++) {
          if ($i <= $rating) {
            echo "<i class='fa fa-star'></i>";
          } else {
            echo "<i class='fa fa-star-o'></i>";
          }
        }

        echo "</div>";
        echo "</div>";

        // Check if two reviews have been displayed in the current row
        if ($count % 2 == 1) {
          echo "</div>"; // Close the row div
        }

        $count++; // Increment the counter
      }

      // If the last row has only one review, close the row div
      if ($count % 2 == 1) {
        echo "</div>";
      }

  } else {
    echo "<p style='margin-top:100px; text-align: center;'>No reviews available.</p>";
  }
      ?>
    </section>

    <?php
    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      $user_sql = "SELECT user_image FROM customer WHERE id = $user_id";
      $user_result = $conn->query($user_sql);

      if ($user_result->num_rows > 0) {
        $user_row = $user_result->fetch_assoc();

        $image_path = $user_row['user_image'];
        $image_path_str = (string) $image_path;
        $new_path = substr($image_path_str, 1);
      }
    ?>
      <script>
        var userLink = document.querySelector('.user-link');

        userLink.innerHTML = `
          <div class='user-image-container'>
            <img class='user-profile-pic icon' src='<?= $new_path ?>' alt='Profile Picture'>
            <div class='user'>
              <i class='bi bi-caret-up-fill'></i>
              <div class='user-tooltip'>
                <a href='./userPanel/customerPanel.php' style='color: black; cursor: pointer;'>MANAGE ACCOUNT</a>
                <a href='./php_processes/logout_process.php' style='color: black; cursor: pointer;'>LOGOUT</a>
              </div>
            </div> 
          </div>    
        `;
      </script>

    <?php
    } else if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
      $user_sql = "SELECT user_image FROM customer WHERE id = $user_id";
      $user_result = $conn->query($user_sql);

      if ($user_result->num_rows > 0) {
        $user_row = $user_result->fetch_assoc();

        $image_path = $user_row['user_image'];
        $image_path_str = (string) $image_path;
        $new_path = substr($image_path_str, 1);
      }
    ?>
      <script>
        var userLink = document.querySelector('.user-link');

        userLink.innerHTML = `
          <div class='user-image-container'>
            <img class='user-profile-pic icon' src='<?= $new_path ?>' alt='Profile Picture'>
            <div class='user'>
              <i class='bi bi-caret-up-fill'></i>
              <div class='user-tooltip'>
                <a href='./userPanel/customerPanel.php' style='color: black; cursor: pointer;'>MANAGE ACCOUNT</a>
                <a href='./php_processes/logout_process.php' style='color: black; cursor: pointer;'>LOGOUT</a>
              </div>
            </div> 
          </div>    
        `;
      </script>

    <?php
    } else {
    ?>
      <script>
        var userLink = document.querySelector('.user-link');

        userLink.innerHTML = `
          <img class='user-profile-pic' src='./assets/surf_img/default-user.svg' alt='Profile Picture'>
          <div class='login-tooltip'>LOGIN</div>
        `;

        var userImage = document.querySelector('.user-profile-pic');

        userImage.addEventListener('click', () => {
          window.location.href = './login.php';
        });
      </script>
    <?php
    }
    ?>

    <!-------JavaScript for Toggle Menu------->
    <script>
      var navLinks = document.getElementById("navLinks");

      function showMenu() {
        navLinks.style.right = "0";
      }

      function hideMenu() {
        navLinks.style.right = "-200px";
      }
    </script>

    <!-------JavaScript for Nav Bar------->
    <script>
      var prevScrollpos = window.pageYOffset;

      window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;

        if (prevScrollpos > currentScrollPos) {
          document.getElementById("navbar").style.top = "0";
        } else {
          document.getElementById("navbar").style.top = "-200px";
        }

        prevScrollpos = currentScrollPos;
      }
    </script>
</body>
</html>
