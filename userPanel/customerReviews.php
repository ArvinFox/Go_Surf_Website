<?php
session_start();

if (!(isset($_SESSION['user_id']) || isset($_COOKIE['user_id']))) {
  header("Location: ../login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <title>Go-Surf Sri Lanka</title>
  <link rel="stylesheet" href="../assets/css/admin_style.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/tooltips.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Permanent+Marker&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../assets/surf_img/head_logo.png" />

  <style>
    .btn {
      font-weight: 700;
      height: 40px;
      border: 1px solid transparent;
      padding: 6px 12px;
      font-size: 16px;
      line-height: 1.5;
      border-radius: 4px;
      transition: color 0.15s;
      cursor: pointer;
    }

    .btn-danger {
      color: #fff;
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .btn-danger:hover {
      background-color: #ba2533;
      border-color: #ba2533;
    }

    .btn-danger:active {
      opacity: 0.8;
    }
  </style>
</head>

<body>
  <section class="sub-header" style="background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(../assets/surf_img/reviews.jpg);">
    <nav id="navbar" class="fixed">
      <a href="../index.php"><img src="../assets/surf_img/logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="../index.php" class="click-animation-1">HOME</a></li>
          <li><a href="../boards.php" class="click-animation-1">BOARDS</a></li>
          <li><a href="../locations.php" class="click-animation-1">LOCATIONS</a></li>
          <li><a href="../about.php" class="click-animation-1">ABOUT US</a></li>
          <li><a href="../contact.php" class="click-animation-1">CONTACT US</a></li>
          <li class="user-link"></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <h1>Manage your Reviews</h1>
  </section>

  <div class="user-panel">
      <ul>
        <li><a href="./customerpanel.php">Account Details</a></li>
        <li><a href="./customerReviews.php" style="color: black;">My Reviews</a></li>
        <li><a href="./customerOrders.php">My Orders</a></li>
        </ul>
      </div>
    </div>

  <br>
  <div>
    <?php
    include '../config/db_conn.php';

    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
    } else if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
    }

    $sql = "SELECT * FROM reviews WHERE review_user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>

      <table class="table" style="margin-left: auto; margin-right: auto; max-width: 1300px; min-width: 300px;">
        <thead>
          <tr>
            <th class="text-center">Review</th>
            <th class="text-center">Date Created</th>
            <th class="text-center" colspan=2>Action</th>
          </tr>
        </thead>

        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
          <tr>
            <td><?= $row['content'] ?></td>
            <td><?= $row['date_created'] ?></td>
            <td>
              <form action="../php_processes/deleteCustomerReview.php" method="post" onsubmit="return confirmDeleteReview()">
                <input type="hidden" name="review-id" value="<?= $row['review_id'] ?>">
                <button class="btn btn-danger" style="height:40px">Delete<button>
              </form>
            </td>
          </tr>
      <?php
        }
    } else {
      echo "<p style='text-align: center;'>No reviews added.</p>";
    }
      ?>
      </table>
  </div>

  <!-------Footer------->
  <section class="footer">
    <h4>About Us</h4>
    <p>"Surfing Enthusiasts, Passionate Instructors: <br> At GO-SURF, we are more than just a surf rental service. We are a community of dedicated surfers and experienced instructors, committed to sharing our love for the ocean and the art of surfing. Whether you're a beginner catching your first wave or an experienced surfer seeking new challenges, join us for an unforgettable surfing adventure. Let's ride the waves together!" <br><br>Follow us on:</p>
    <div class="icons">
      <i class="fa fa-facebook"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-instagram"></i>
      <i class="fa fa-linkedin"></i>
    </div>
    <p>Made with <i class="fa fa-heart"></i> by Group 15 23.1 FOC - NSBM</p>
  </section>

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

<?php
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $user_sql = "SELECT user_image FROM customer WHERE id = $user_id";
  $user_result = $conn->query($user_sql);

  if ($user_result->num_rows > 0) {
    $user_row = $user_result->fetch_assoc();

    $image_path = $user_row['user_image'];
  }
?>
  <script>
    var userLink = document.querySelector('.user-link');

    userLink.innerHTML = `
      <div class='user-image-container'>
        <img class='user-profile-pic icon' src='<?= $image_path ?>' alt='Profile Picture'>
        <div class='user'>
          <i class='bi bi-caret-up-fill'></i>
          <div class='user-tooltip'>
            <a href='./customerPanel.php' style='color: black; cursor: pointer;'>MANAGE ACCOUNT</a>
            <a href='../php_processes/logout_process.php' style='color: black; cursor: pointer;'>LOGOUT</a>
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
  }
?>
  <script>
    var userLink = document.querySelector('.user-link');

    userLink.innerHTML = `
      <div class='user-image-container'>
        <img class='user-profile-pic icon' src='<?= $image_path ?>' alt='Profile Picture'>
        <div class='user'>
          <i class='bi bi-caret-up-fill'></i>
          <div class='user-tooltip'>
            <a href='./customerPanel.php' style='color: black; cursor: pointer;'>MANAGE ACCOUNT</a>
            <a href='../php_processes/logout_process.php' style='color: black; cursor: pointer;'>LOGOUT</a>
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
      <img class='user-profile-pic' src='../assets/surf_img/default-user.svg' alt='Profile Picture'>
      <div class='login-tooltip'>LOGIN</div>
    `;

    var userImage = document.querySelector('.user-profile-pic');

    userImage.addEventListener('click', () => {
      window.location.href = '../login.php';
    });
  </script>
<?php
}
?>

  <!-- Confirm Delete Review -->
  <script>
    function confirmDeleteReview() {
      var confirmation = window.confirm("Are you sure you want to delete this review?");

      if (confirmation) {
        return true;
      } else {
        return false;
      }
    }
  </script>
</body>
</html>
