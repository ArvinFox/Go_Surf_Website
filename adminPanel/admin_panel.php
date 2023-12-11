<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
  header("Location: ./admin_login.php");
  exit();
}

include '../config/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/admin_style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Permanent+Marker&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../assets/surf_img/head_logo.png"/>
  
  <style>
    h1:hover
    {
      -webkit-text-stroke: 1px darkblue; 
      color: #000000;
    }
  </style>
</head>
<body>
  <section class="header" style="min-height: auto;">
    <nav id="navbar" class="fixed">
      <a href="#"><img src="../assets/surf_img/logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="./admin_panel.php" style="color: red;" class="click-animation-1">HOME</a></li>
          <li><a href="../adminView/viewAllBoards.php">MANAGE BOARDS</a></li>
          <li><a href="../adminView/viewInquiries.php" class="click-animation-1">INQUIRIES</a></li>
          <li><a href="../adminView/viewReviews.php" class="click-animation-1">REVIEWS</a></li>
          <li><a href="../adminView/viewAllOrders.php" class="click-animation-1">ORDERS</a></li>
          <li><a href="../adminView/viewCustomers.php" class="click-animation-1">USERS</a></li>
          <li class="logout"><a href="./admin_logout_process.php" class="logout-button click-animation-1">LOGOUT</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
  </section>

  <section class="admin-dashboard" style="padding-top: 120px; max-width: 800px; margin-left: auto; margin-right: auto;">
    <h1 class="admin-name" style="text-align: center; margin-top: 10px; margin-bottom: -30px;"></h1>
    <div id="main-content" class="container allContent-section py-4">
      <div class="row">
        <div class="col-sm-3">
          <div class="card" style="color: white; background-color: #0d0e4d9a; box-shadow: 8px 5px 5px rgb(12, 0, 115)">
            <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
            <h4 style="color:white;">Total Users</h4>
            <h5 style="color:white;">
            <?php
              $sql = "SELECT * FROM customer";
              $result = $conn->query($sql);
              $count = 0;
              if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                  $count = $count + 1;
                }
              }
              echo $count;
            ?>
            </h5>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card" style="color: white;background-color: #0d0e4d9a; box-shadow: 8px 5px 5px rgb(12, 0, 115)">
            <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
            <h4 style="color:white;">Available Board Types</h4>
            <h5 style="color:white;">
            <?php
              $sql = "SELECT type_name FROM board_types";
              $result = $conn->query($sql);
              $count = 0;
              if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                  $count = $count + 1;
                }
              }
              echo $count;
            ?>
            </h5>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card" style="color: white; background-color: #0d0e4d9a; box-shadow: 8px 5px 5px rgb(12, 0, 115)">
            <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
            <h4 style="color:white;">Total Boards</h4>
            <h5 style="color:white;">
            <?php
              $sql = "SELECT board_type FROM boards";
              $result = $conn->query($sql);
              $count = 0;
              if ($result->num_rows > 0){
                while ($row = $result-> fetch_assoc()) {
                  $count = $count + 1;
                }
              }
              echo $count;
            ?>
            </h5>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card" style="color: white; background-color: #0d0e4d9a; box-shadow: 8px 5px 5px rgb(12, 0, 115)">
            <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
            <h4 style="color:white;">Total orders</h4>
            <h5 style="color:white;">
            <?php
              $sql = "SELECT * FROM rentals";
              $result = $conn->query($sql);
              $count = 0;
              if ($result->num_rows > 0){
                while ($row = $result-> fetch_assoc()) {
                  $count = $count + 1;
                }
              }
              echo $count;
            ?>
            </h5>
          </div>
        </div>
      </div>   
    </div>
  </section>

  <?php
  $admin_id = $_SESSION["admin_id"];

  $sql = "SELECT * FROM admin_table WHERE admin_id = $admin_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $admin_username = $row["admin_username"];

    echo "
      <script>
        document.querySelector('.admin-name')
          .innerHTML = 'Welcome, Admin ($admin_username)';
      </script>
    ";
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