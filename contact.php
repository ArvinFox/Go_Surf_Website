<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
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
  <section class="sub-header" style="background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(./assets/surf_img/contact.jpg);">
    <nav id="navbar" class="fixed">
      <a href="index.php"><img src="./assets/surf_img/logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="index.php" class="click-animation-1">HOME</a></li>
          <li><a href="boards.php" class="click-animation-1">BOARDS</a></li>
          <li><a href="locations.php" class="click-animation-1">LOCATIONS</a></li>
          <li><a href="about.php" class="click-animation-1">ABOUT US</a></li>
          <li><a href="contact.php" class="click-animation-1" style="color: red;">CONTACT US</a></li>
          <li class="user-link"></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <h1>Contact Us</h1>
  </section>

  <!-------Contact Us------->
  <section class="location">
    <p>Thank you for visiting our website! We value your feedback, questions, and suggestions. Please feel free to reach out to us using the contact information below:</p><br>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7923.959221332394!2d80.00474828779717!3d6.772335528262686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1695483501741!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>

  <section class="contact-us">
    <div class="row">
      <div class="contact-col">
        <div>
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <span>
            <h5>Main Branch</h5>
            <p>123 Oceanview Street,<br>Hikkaduwa,<br>Southern Province,<br>Sri Lanka.</p>
          </span>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <span>
            <h5>0312237374</h5>
            <h5>0453862738</h5>
            <p>Monday to Saturday, 8am to 8.30pm</p>
          </span>
        </div>
        <div>
          <i class="fa fa-envelope-o"></i>
          <span>
            <h5>gosurf.srilanka@gmail.com</h5>
            <p>E-mail us your query</p>
          </span>
        </div>
      </div>
      <div class="contact-col">
        <form action="./controller/addInquiry.php" method="post">
          <input type="text" name="name" placeholder="Enter Your Name" required>
          <input type="email" name="email" placeholder="Enter Your email" required>
          <input type="text" name="subject" placeholder="Enter Your Subject" required>
          <textarea rows="8" name="message" placeholder="Message" required></textarea>
          <button type="submit" class="hero-btn red-btn">Send Message</button>
        </form>
      </div>
    </div>
  </section>

  <!-------Footer------->
  <section class="footer">
    <h4>About Us</h4>
    <p style="color: black;">"Surfing Enthusiasts, Passionate Instructors: <br> At GO-SURF, we are more than just a surf rental service. We are a community of dedicated surfers and experienced instructors, committed to sharing our love for the ocean and the art of surfing. Whether you're a beginner catching your first wave or an experienced surfer seeking new challenges, join us for an unforgettable surfing adventure. Let's ride the waves together!" <br><br>Follow us on:</p>
    <div class="icons">
      <i class="fa fa-facebook"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-instagram"></i>
      <i class="fa fa-linkedin"></i>
    </div>
    <p style="color: black;">Made with <i class="fa fa-heart"></i> by Group 15 23.1 FOC - NSBM</p>
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
  include './config/db_conn.php';
  ?>

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
</body>
</html>
