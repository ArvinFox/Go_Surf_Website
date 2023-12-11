<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
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
  <link rel="icon" type="image/png" href="./assets/surf_img/head_logo.png"/>
</head>

<body>
  <section class="sub-header-aboutus" style="background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(./assets/surf_img/about.jpg);">
    <nav id="navbar" class="fixed">
      <a href="index.php"><img src="./assets/surf_img/logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="index.php" class="click-animation-1">HOME</a></li>
          <li><a href="boards.php" class="click-animation-1">BOARDS</a></li>
          <li><a href="locations.php" class="click-animation-1">LOCATIONS</a></li>
          <li><a href="about.php" style="color: red;" class="click-animation-1">ABOUT US</a></li>
          <li><a href="contact.php" class="click-animation-1">CONTACT US</a></li>
          <li class="user-link"></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <h1 class="about-h1">About Us</h1>
    <p style="color: #ffffff81">We are the embodiment of the sun, sea, and surf culture that defines the beauty of Sri Lanka</p><br>
  </section>

  <!-------About Us------->
  <section class="about-us">
    <div class="row-about">
      <div class="about-col">
        <h1>We are the Best Sri Lankan Surfing Platform</h1>
        <p id="para">Welcome to GO-SURF.LK, your gateway to the thrilling world of surfing in the stunning island nation of Sri Lanka.At GO-SURF.LK, we are more than just a surfing platform; we are surf enthusiasts dedicated to sharing the joy of riding the waves along the picturesque shores of Sri Lanka. Our journey began with a profound love for the ocean and a passion for adventure.</p>
      </div>
      <div class="about-col">
        <img src="./assets/surf_img/about-1.jpg">
    </div>
    </div>
    <div class="row-about">
    <div class="about-col">
        <h1>Our Mission</h1>
        <p>Our mission is to connect surfers, from beginners to experts, with the best surf experiences Sri Lanka has to offer. We aim to make the exhilarating sport of surfing accessible to all, while promoting responsible and sustainable practices that respect the environment.</p>
      </div>
      <div class="about-col">
        <h1>Our Story</h1>
        <p id="para">GO-SURF.LK was born out of a deep love for the ocean and a passion for riding the waves. Our journey started on the sun-kissed shores of Sri Lanka, where we fell in love with the perfect breaks, warm waters, and the vibrant surf culture that this island nation has to offer.</p>
      </div>
    </div>
    <div class="row-about">
    <div class="about-col">
      </div>
    <div class="about-col">
    <h1>Frequently Asked Questions</h1>
    <br><br>
    <div class="questions-container">
        <div class="question">
            <button>
                <span>How do I rent a surfboard from your website?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>To rent out a surfboard, simply browse our collection, select your preferred board and follow the easy resrvation process. Input your details and confirm your booking.</p>
        </div>

        <div class="question">
            <button>
                <span>What types of surfboards are available for rent?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>We offer a diverse range of surfboard such as fish boards,fun board and long boards. You'll find options such as beginer boards, performance boards and more.</p>
        </div>

        <div class="question">
            <button>
                <span>How long can I rent a surfboard?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>You can choose the duration of your surfboard rental based on your needs. Whether it's a day,a weekend or an extended period, our flexible rental options allow you to enjoy your surfing adventure at your own pace.</p>
        </div>

        <div class="question">
            <button>
                <span>Are there any surfing training sessions for newcomers?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>Absolutely! We offer dedicated training sessions designed for newcomers. Our experienced instructors are here to guide you through the basics. Check our schedule for upcoming sessions and kickstart your surfing journey with confidence.</p>
        </div>
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

<!------JavaScript for FAQs------>
  <script>
    const buttons = document.querySelectorAll('button');

    buttons.forEach( button =>{
        button.addEventListener('click',()=>{
            const faq = button.nextElementSibling;
            const icon = button.children[1];

            faq.classList.toggle('show');
            icon.classList.toggle('rotate');
        })
    } )
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
