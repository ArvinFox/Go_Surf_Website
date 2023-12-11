<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
  header("Location: ../adminPanel/admin_login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Orders</title>
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/admin_style.css">
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

    .btn-success {
      color: #fff;
      background-color: #28a745;
      border-color: #28a745;
      transition: background-color 0.15s ease;
    }

    .btn-success:hover {
      background-color: #20993c;
      border-color: #20993c;
    }

    .btn-danger {
      color: #fff;
      background-color: #dc3545;
      border-color: #dc3545;
      transition: background-color 0.15s ease, opacity 0.15s;
    }

    .btn-danger:hover {
      background-color: #ba2533;
      border-color: #ba2533;
    }

    .btn-danger:active {
      opacity: 0.8;
    }

    .btn-primary {
      color: #fff;
      background-color: #007bff;
      border-color: #007bff;
      transition: background-color 0.15s ease, opacity 0.15s;
    }

    .btn-primary:hover {
      background-color: #046bd9;
      border-color: #046bd9;
    }

    .btn-primary:active {
      opacity: 0.8;
    }
  </style>
</head>

<body style="padding-bottom: 30px;">
  <section class="header" style="min-height: auto; margin-top:150px;">
    <nav id="navbar" class="fixed">
      <a href="#"><img src="../assets/surf_img/logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="../adminPanel/admin_panel.php" class="click-animation-1">HOME</a></li>
          <li><a href="./viewAllBoards.php" class="click-animation-1">MANAGE BOARDS</a></li>
          <li><a href="./viewInquiries.php" class="click-animation-1">INQUIRIES</a></li>
          <li><a href="./viewReviews.php" class="click-animation-1">REVIEWS</a></li>
          <li><a href="./viewAllOrders.php" style="color: red;" class="click-animation-1">ORDERS</a></li>
          <li><a href="./viewCustomers.php" class="click-animation-1">USERS</a></li>
          <li class="logout"><a href="../adminPanel/admin_logout_process.php" class="logout-button click-animation-1">LOGOUT</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
  </section>

  <div id="ordersBtn">
    <h2 style="text-align: center;">Order Details</h2>
    <br>

    <?php
    include "../config/db_conn.php";

    $sql = "SELECT * FROM rentals";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>

      <table class="table" style="margin-left: auto; margin-right: auto; width: fit-content;  max-width: 1300px;">
        <thead>
          <tr>
            <th>Rental ID.</th>
            <th>Customer</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Rental Date</th>
            <th>Return Date</th>
            <th>Payment Method</th>
            <th>Payment Status</th>
            <th>More Details</th>
          </tr>
          </head>

          <?php
          while ($row = $result->fetch_assoc()) {
            $user_id = $row['user_id'];
            $user_sql = "SELECT * FROM customer WHERE id = $user_id";
            $user_result = $conn->query($user_sql);

            if ($user_result->num_rows > 0) {
              while ($user_row = $user_result->fetch_assoc()) {
          ?>

                <tr>
                  <td><?= $row["rental_id"] ?></td>
                  <td><?= $user_row["fname"] . " " . $user_row['lname'] ?></td>
                  <td><?= $user_row['email'] ?></td>
                  <td><?= $user_row['contact1'] ?></td>
                  <td><?= $row['rental_date'] ?></td>
                  <td>
                    <?php
                    if ($row['return_date'] == NULL) {
                      $rental_id = $row['rental_id'];
                      $board_id = $row['board_id'];
                      echo "<form action='../controller/returnBoardController.php' method='post'";
                      echo "<input type='hidden' name='rental-id' value='$rental_id'>";
                      echo "<input type='hidden' name='board-id' value='$board_id'>";
                      echo "<button type='submit' class='btn btn-success'>Return</button>";
                      echo "</form>";
                    } else {
                      echo $row['return_date'];
                    }
                    ?>
                  </td>
                  <td><?= $row["payment_method"] ?></td>
                  <td>
                    <?php
                    $rental_id = $row['rental_id'];
                    echo "<form action='../controller/updatePayStatus.php' method='post'>";
                    echo "<input type='hidden' name='rental-id' value='$rental_id'>";

                    if ($row['payment_status'] == 0) {
                      echo "<input type='hidden' name='is-paid' value='0'>";
                      echo "<button type='submit' class='btn btn-danger'>Unpaid</button>";
                    } else {
                      echo "<input type='hidden' name='is-paid' value='1'>";
                      echo "<button type='submit' class='btn btn-success'>Paid</button>";
                    }

                    echo "</form>";
                    ?>
                  </td>

                  <td>
                    <a style="text-decoration: none;" class="btn btn-primary" href="./viewEachOrder.php?rentalID=<?= $row['rental_id'] ?>">View</a>
                  </td>
                </tr>

        <?php
              }
            }
          }
        } else {
          echo "<p>No orders available.</p>";
        }
        ?>

      </table>
  </div>

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
