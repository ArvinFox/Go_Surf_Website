<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Locations</title>
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
  <section class="sub-header-aboutus" style="background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(./assets/surf_img/locations.avif);">
    <nav id="navbar" class="fixed">
      <a href="index.php"><img src="./assets/surf_img/logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="index.php" class="click-animation-1">HOME</a></li>
          <li><a href="boards.php" class="click-animation-1">BOARDS</a></li>
          <li><a href="locations.php" class="click-animation-1"  style="color: red;">LOCATIONS</a></li>
          <li><a href="about.php" class="click-animation-1">ABOUT US</a></li>
          <li><a href="contact.php" class="click-animation-1">CONTACT US</a></li>
          <li class="user-link"></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <h1 class="about-h1">Locations</h1>
  </section>

  <!-------Locations------->
  <section class="about-us">
    <div class="row">
      <div class="about-col">
        <h1>ARUGAM BAY</h1>
        <p id="para"> Wave riders travel from all over the world to <b>Arugam Bay</b>, a well-known surfing destination tucked away along Sri Lanka's eastern coast, to ride its exhilarating swells. From May to September, the Indian Ocean is swept by monsoon winds that provide consistent waves suitable for surfers of all skill levels, from experienced pros to eager beginners.Tucked away on Sri Lanka's east coast, Arugam Bay is a well-known surfing destination that draws wave surfers from around the globe to ride its thrilling swells. The monsoon winds that blow over the Indian Ocean from May to September provide great waves for surfers of all ability levels, from seasoned experts to enthusiastic beginners.</p>
      </div>
      <div class="about-col">
        <img src="./assets/surf_img/arugambay-loc.jpg">
    </div>
    </div>
    <section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31691.516031712934!2d81.80557072869408!3d6.837793272976805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae5bd26f6a1ccd7%3A0xb934be79f3ce3515!2sArugam%20Bay!5e0!3m2!1sen!2slk!4v1700728827219!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>
      <div class="row">
      <div class="about-col">
        <h1>AHANGAMA</h1>
        <p id="para"><b>Ahangama Beach</b>, located on Sri Lanka's southwestern coast, is a popular surfing destination for all skill levels.From November to April, the dry season brings consistent swells and warm waters, making it ideal for beginners and experienced surfers alike.One of the most popular surf spots in Ahangama is Kabalana Beach.Another popular spot is Sticks, a reef break that offers more challenging waves for intermediate and advanced surfers.Anybody may find something to enjoy at Ahangama Beach, regardless of experience level; from novices seeking their first lesson to expert surfers seeking a fresh challenge. And it makes sense that Ahangama, one of Sri Lanka's most well-liked surfing locations, has such a laid-back vibe and breathtaking surroundings.</p>
      </div>
      <div class="about-col">
        <img src="./assets/surf_img/ahangama-loc.jpg">
    </div>
    </div>
    <section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15872.804500885166!2d80.36446924084721!3d5.967013545853882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae114a37a6c38a1%3A0xb3864d7bca57665f!2sAhangama%20Beach!5e0!3m2!1sen!2slk!4v1700729085989!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>
      <div class="row">
      <div class="about-col">
        <h1>HIKKADUWA</h1>
        <p id="para">Surfers are drawn to <b>Hikkaduwa Beach</b>, which is situated on Sri Lanka's southwest coast, by its consistent waves and lively atmosphere. The northeast monsoon winds provide soft rollers from November to April, which is a great time for beginners to learn. The southwest monsoon, which lasts from May to October once the monsoon fades, brings stronger waves that provide difficulties for seasoned surfers. In the midst of its spectacular coastline beauty, Hikkaduwa Beach offers an exciting surfing experience for all skill levels.</p>
      </div>
      <div class="about-col">
        <img src="./assets/surf_img/hikkaduwa-loc.jpg">
    </div>
    </div>
    <section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7933.940358536549!2d80.09461488956748!3d6.134709142844278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae177e2cbcb6ead%3A0xd0adba737d2f45d9!2sHikkaduwa%20Beach!5e0!3m2!1sen!2slk!4v1700729136125!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>
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
