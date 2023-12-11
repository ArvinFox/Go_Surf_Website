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
  <title>All Boards</title>
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

    .btn-primary:active,
    .btn-danger:active {
      opacity: 0.8;
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

    .btn-secondary {
      color: #fff;
      background-color: #6c757d;
      border-color: #6c757d;
      transition: background-color 0.15s ease, opacity 0.15s;
    }

    .btn-secondary:hover {
      background-color: #838d96;
      border-color: #838d96;
    }

    .btn-secondary:active {
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
          <li><a href="./viewAllBoards.php" style="color: red;" class="click-animation-1">MANAGE BOARDS</a></li>
          <li><a href="./viewInquiries.php" class="click-animation-1">INQUIRIES</a></li>
          <li><a href="./viewReviews.php" class="click-animation-1">REVIEWS</a></li>
          <li><a href="./viewAllOrders.php" class="click-animation-1">ORDERS</a></li>
          <li><a href="./viewCustomers.php" class="click-animation-1">USERS</a></li>
          <li class="logout"><a href="../adminPanel/admin_logout_process.php" class="logout-button click-animation-1">LOGOUT</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
  </section>

  <div>
    <a style="text-decoration: none; margin-left: 20px;" href="./viewBoardTypes.php">
      <button style="padding: 4px; cursor: pointer;">
        Board Types
      </button>
    </a>
    <h2 style="text-align: center;">All Boards</h2>
    <br>

    <?php
    include "../config/db_conn.php";

    $sql = "SELECT * FROM boards, board_types WHERE boards.board_type = board_types.type_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>

      <table class="table" style="margin-left: auto; margin-right: auto; width: fit-content; max-width: 1300px;">
        <thead>
          <tr>
            <th class="text-center">Board ID.</th>
            <th class="text-center">Board Image</th>
            <th class="text-center">Board Name</th>
            <th class="text-center">Board Description</th>
            <th class="text-center">Board Type</th>
            <th class="text-center">Stock</th>
            <th class="text-center">Price</th>
            <th class="text-center" colspan="2">Action</th>
          </tr>
        </thead>

        <?php
        while ($row = $result->fetch_assoc()) {
        ?>

          <tr>
            <td><?= $row["board_id"] ?></td>
            <td><img height='100px' src='<?= $row["board_image"] ?>'></td>
            <td><?= $row["board_name"] ?></td>
            <td><?= $row["board_desc"] ?></td>
            <td><?= $row["type_name"] ?></td>
            <td><?= $row["stock"] ?></td>
            <td><?= $row["price"] ?></td>
            <td>
              <form action="./editBoard.php" method="post">
                <input type="hidden" name="edit-board" value="<?= $row['board_id'] ?>">
                <button class="btn btn-primary" style="height:40px">Edit</button>
              </form>
            </td>
            <td>
              <form action="../controller/deleteBoardController.php" method="post" onsubmit="return confirmDeleteBoard()">
                <input type="hidden" name="delete-board" value="<?= $row['board_id'] ?>">
                <button class="btn btn-danger" style="height:40px">Delete</button>
              </form>
            </td>
          </tr>

      <?php
        }
      } else {
        echo "<p>No boards available.</p>";
      }
      ?>

      </table>

      <!-- Go to Add Board page -->
      <div style="text-align: center;">
        <a href="./addBoard.php">
          <button type="button" class="btn btn-secondary" style="height:40px; margin-left:20px;">
            Add Board
          </button>
        </a>
      </div>
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

  <!-- Confirmation Delete Board -->
  <script>
    function confirmDeleteBoard() {
      var confirmation = window.confirm("Are you sure you want to delete this board?");

      if (confirmation) {
        return true;
      } else {
        return false;
      }
    }
  </script>
</body>

</html>