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
  <link rel="stylesheet" href="./assets/css/s36.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Permanent+Marker&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="./assets/surf_img/head_logo.png" />

<style>
    .cta-rating button{
        color: #f43434;
    }
    .cta-rating .hero-btn3{
        border: 2px solid #f43434;
    }
    .cta-rating .hero-btn3:hover{
        border: 2px solid #202b6f;
    }
    .contact-col .rating-textarea{
        width: 600px;
    }
    @media (max-width:800px)
    {
        .contact-col .rating-textarea{
        width: 300px;
    }
    }
</style>
</head>

<body>
  <section class="header">
    <video autoplay loop muted plays-inline class="back-video">
      <source src="./assets/surf_vid/hero_video.mp4" type="video/mp4">
    </video>
    <nav id="navbar" class="fixed">
      <a href="index.php"><img src="./assets/surf_img/logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="index.php" style="color: red;" class="click-animation-1">HOME</a></li>
          <li><a href="boards.php" class="click-animation-1">BOARDS</a></li>
          <li><a href="locations.php" class="click-animation-1">LOCATIONS</a></li>
          <li><a href="about.php" class="click-animation-1">ABOUT US</a></li>
          <li><a href="contact.php" class="click-animation-1">CONTACT US</a></li>
          <li class="user-link"></li>
        </ul>
      </div>
      <div class="user-drop-down"></div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>

    <div class="text-box">
      <h1>SURF WITH US</h1>
      <p>Experience the thrill of riding the waves with our premium surfboards. Discover the perfect balance of performance and style for surfers of all levels. Book your board today and catch the waves of adventure! </p>
      <p class="after-text">You can experice the best surfing areas with us in <br><br>
        <span class="after-text-big"><b>Sri Lanka</b></span>
      </p>
      <a href="about.php" class="hero-btn">Visit Us To Know More</a>
    </div>
  </section>

  <!--------Boards-------->
  <section class="board">
    <div class="h1-p">
      <h1 class="board-h1">EXPERIENCE OUR PREMIUM BOARDS</h1>
      <p class="board-p">We have the best surfing boards in the world with various designs</p>
      <a href="boards.php" class="hero-btn2">Discover</a>
    </div>

    <div class="row">
      <div class="board-col">
        <h3>Imported</h3>
        <p>All Our Surf Boards Are imported from USA</p>
      </div>
      <div class="board-col">
        <h3>Quality Material</h3>
        <p>Surf Boards Are Made With Quality Timber</p>
      </div>
      <div class="board-col">
        <h3>Controllability</h3>
        <p>Experience the Immersive Controllability</p>
      </div>
    </div>

    <div class="row">
      <div class="board-col">
        <h3>Hand-Made</h3>
        <p>All Boards Are Carefully Hand-Crafted By the Best Surf Board Makers</p>
      </div>
      <div class="board-col">
        <h3>Colorful</h3>
        <p>Colourful Custom Boards To Choose</p>
      </div>
      <div class="board-col">
        <h3>Free Surf Board Wax!</h3>
        <p>No Need To Worry About Surfing Wax. <br>We Give Them Free!</p>
      </div>
    </div>
  </section>
  
  <!-------Locations------->
  <section class="locs">
    <h1>SRI LANKA'S BEST SURFING LOCATIONS</h1>
    <p>Arugam Bay - The world's renowned international surf competition venue in Sri Lanka <br>& we are available in other 2 locations</p>

    <div class="row">
      <div class="locs-col">
        <img src="./assets/surf_img/arugambay.jpg">
        <div class="layer">
          <h3>ARUGAM BAY</h3>
        </div>
      </div>
      <div class="locs-col">
        <img src="./assets/surf_img/ahangama.jpg">
        <div class="layer">
          <h3>AHANGAMA</h3>
        </div>
      </div>
      <div class="locs-col">
        <img src="./assets/surf_img/hikkaduwa.jpg">
        <div class="layer">
          <h3>HIKKADUWA</h3>
        </div>
      </div>
    </div>
  </section>

  <!-------Facilities------->
  <section class="facilities">
    <h1 class="facilities-h1"><span class="facilities-h1-big">CAN'T SURF?</span>
      <br>DON'T WORRY! <br>TRAIN WITH US TODAY!
    </h1>
    <p>All Kids & Adults are welocme to train with us at our Surf Schools which are located in Arugam Bay, Ahangama & Hikkaduwa</p>
    <div class="row">
      <div class="facilities-col">
        <img src="./assets/surf_img/training.jpg">
        <h3>Trained By Professionals</h3>
        <p>You are trained by our best surfing trainers and you might have a chance to meet your favourite Surfing Legend</p>
      </div>
      <div class="facilities-col">
        <img src="./assets/surf_img/life-guard.jpg">
        <h3>Safety First</h3>
        <p>All trainees are trained in a safe environment</p>
      </div>
      <div class="facilities-col">
        <img src="./assets/surf_img/time.jpg">
        <h3>Easy Time Slots</h3>
        <p>We are open from 7.00am to 6.00pm everyday execept Special Holidays</p>
      </div>
    </div>
  </section>

  <!-------Testimonials------->
  <section class="testimonials">
    <h1>WHAT OUR CUSTOMERS SAY</h1>
    <p>See what recent customers say about our service</p>

    <div class="reviews-link">
      <a href="./reviews.php">View All Reviews</a>
    </div>

    <?php
    $sql = "SELECT * FROM reviews WHERE is_displayed = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
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

        echo "<img class='review-card-img' src='$new_path'>";
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

        // $review_date = $row['date_created'];
        // echo "<div style='text-align: right;'>$review_date</div>";

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
      echo "<p style='text-align: center;'>No reviews available.</p>";
    }
    ?>
  </section>

  <?php
  if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
  ?>

    <!------------rating section start---->
    <section class="cta-rating">
    <h1>Rate Your Experience</h1>
    <form action="./controller/addReview.php" method="POST">
        <input type="hidden" name="user-id" value="<?php
          if (isset($_SESSION['user_id'])) {
            echo $_SESSION['user_id'];
          } else if ($_COOKIE['user_id']) {
            echo $_COOKIE['user_id'];
          }
        ?>">

        <div class="star box">
        <div class="rate">
          <input type="radio" hidden name="rating" id="rating-opt5" value="5" required>
          <label for="rating-opt5"><span>Awesome!</span></label>

          <input type="radio" hidden name="rating" id="rating-opt4" value="4" required>
          <label for="rating-opt4"><span>Satisfied!</span></label>

          <input type="radio" hidden name="rating" id="rating-opt3" value="3" required>
          <label for="rating-opt3"><span>Good!</span></label>

          <input type="radio" hidden name="rating" id="rating-opt2" value="2" required>
          <label for="rating-opt2"><span>Ok!</span></label>

          <input type="radio" hidden name="rating" id="rating-opt1" value="1" required>
          <label for="rating-opt1"><span>Very Bad!</span></label>
        </div>

        <p style="font-size: 18px;">Tell us Your Exeperience</p>
        <div class="contact-col">
        <textarea rows="2" class="rating-textarea" name="review" placeholder="Comment your feeling" required></textarea>
        </div>
  </div>
    <button class="hero-btn3" type="submit">Submit</button>
        </form>
  </section>
  <?php
  }
  ?>

  <!-------Call To Action------->
  <section class="cta">
    <h1>Reserve Your Board Today!<br>Anywhere From the World</h1>
    <a href="boards.php" class="hero-btn">Reserve Now</a>
  </section>

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
