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
  <link rel="stylesheet" href="../assets/css/admin_style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Permanent+Marker&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../assets/surf_img/head_logo.png"/>
  <title>View Each Order</title>

  <style>
    .container {
      max-width: 1200px;
      display: flex;
      flex-direction: column;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .top-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    hr {
      margin-top: 12px;
      margin-bottom: 22px;
      border: 1px solid #ddd;
    }

    h1 {
      display: inline-block;
      margin: 0;
      font-size: 24px;
      color: #333;
    }

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

    .quit-btn {
      font-size: 20px;
      color: gray;
      background-color: transparent;
    }

    .quit-btn:hover {
      color: black;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="top-section">
      <h1>Order Details</h1>
      <a href="./viewAllOrders.php">
        <button class="btn quit-btn">X</button>
      </a>
    </div>

    <hr>

    <?php
    include '../config/db_conn.php';

    $rental_id = $_GET['rentalID'];
    $rental_sql = "SELECT * FROM rentals WHERE rental_id = $rental_id";
    $rental_result = $conn->query($rental_sql);

    if ($rental_result->num_rows > 0) {
    ?>
    <table class="table" style="margin-left: auto; margin-right: auto; width: fit-content;  max-width: 1300px;">
    <thead>
        <tr>
            <th>Board ID.</th>
            <th>Board Image</th>
            <th>Board Name</th>
            <th>Board Description</th>
            <th>Price</th>
            <th>Rental Days</th>
            <th>Total Cost (Rs.)</th>
        </tr>
    </thead>

    <?php
      while ($rental_row = $rental_result->fetch_assoc()) {
        $board_id = $rental_row['board_id'];
        $board_sql = "SELECT * FROM boards WHERE board_id = $board_id";
        $board_result = $conn->query($board_sql);

        if ($board_result->num_rows > 0) {
          while ($board_row = $board_result->fetch_assoc()) {
    ?>
        <tr>
            <td><?=$board_id?></td>
            <td>
              <img height="180px" src="<?=$board_row['board_image']?>">
            </td>
            <td><?=$board_row['board_name']?></td>
            <td><?=$board_row['board_desc']?></td>
            <td><?=$board_row["price"]?></td>
            <td><?=$rental_row["rental_days"]?></td>
            <td><?=$rental_row["total_cost"]?></td>
        </tr>

    <?php
          }
        }
      }
    } else {
      echo "Error: " . $conn->error . "<br>";
    }

    $conn->close();
    ?>
    </table>
  </div>
</body>
</html>