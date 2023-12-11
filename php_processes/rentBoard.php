<?php
session_start();

if (!(isset($_SESSION['user_id']) || isset($_COOKIE['user_id']))) {
  header("Location: ../login.php");
  exit();
}

include '../config/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $board_id = $_POST['board-id'];
  $board_name = $_POST['board-name'];
  $board_type = $_POST['board-type'];
  $board_desc = $_POST['board-desc'];
  $price = $_POST['price'];

  $image_sql = "SELECT board_image FROM boards WHERE board_id = $board_id";
  $image_result = $conn->query($image_sql);

  $image_row = $image_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../assets/surf_img/head_logo.png"/>
  <title>Rent a Board</title>

  <style>
    .container {
      max-width: 400px;
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
      margin-bottom: 20px;
    }

    h1 {
      display: inline-block;
      margin: 0;
      font-size: 24px;
      color: #333;
    }

    .boards-card {
      width: 300px;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 15px;
      margin: 10px;
      text-align: center;
    }

    .boards-card img {
      max-width: 100%;
      height: 260px;
      object-fit: cover;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .boards-card p {
      color: #777777;
      font-size: 16px;
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

    .rental-period,
    .payment-method {
      margin-top: 16px;
    }

    .rental-period label,
    .choose-payment-method {
      display: block;
      margin-bottom: 10px;
      font-size: 18px;
      font-weight: bold;
      color: #333;
    }

    .rental-period select {
      width: 75%;
      padding: 12px;
      font-size: 16px;
      border: 2px solid #3498db;
      border-radius: 4px;
      background-color: #f8f8f8;
      color: #333;
      transition: border-color 0.3s;
    }

    .rental-period select:focus {
      border-color: #2980b9;
    }

    .payment-options {
      display: flex;
      column-gap: 14px;
    }

    .payment-options label {
      font-size: 16px;
      cursor: pointer;
    }

    .payment-options input {
      margin-right: 5px;
    }

    .payment-label {
      font-size: 16px;
      color: #333;
    }

    .payment-options input[type="radio"] {
      display: none;
    }

    .payment-options input[type="radio"] + .payment-label:before {
      content: '';
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 2px solid #3498db;
      border-radius: 50%;
      margin-right: 5px;
    }

    .payment-options input[type="radio"]:checked + .payment-label:before {
      background-color: #3498db;
    }

    .payment-options input[type="radio"] + .payment-label:before {
      transition: background-color 0.3s ease;
    } 

    .total-cost {
      margin-top: 20px;
      font-size: 18px;
      font-weight: bold;
    }

    .pay-now-btn {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      font-size: 18px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 20px;
    }

    .pay-now-btn:hover {
      background-color: #45a049;
    }

    .note {
      margin-top: 15px;
      padding: 10px;
      background-color: #fff3cd;
      border: 1px solid #ffeeba;
      border-radius: 4px;
      color: #856404;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="top-section">
      <h1>Rent Board</h1>
      <a href="../boards.php">
        <button class="btn quit-btn">X</button>
      </a>
    </div>

      <div class="boards-card">
        <img src="<?=$image_row['board_image']?>" alt="<?=$board_name?>">
        <h2><?=$board_name?></h2>
        <p style="font-weight: 700; font-size: 17px;"><em><?=$board_type?></em></p>
        <p><?=$board_desc?></p>
        <p><?=$price?></p>
      </div>

    <div>
      <form action="./rent_board_process.php" method="post">
        <input type="hidden" name="board-id" value="<?=$board_id?>">
        <input type="hidden" name="price" value="<?=$price?>">

        <div class="rental-period">
          <label for="rental-days">Choose rental period:</label>
          <select name="rental-days" id="rental-days" onchange="calculateTotal()" required>
            <option value="" selected disabled>Select no. of days</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        </div>

        <div class="payment-method">
          <label class="choose-payment-method" for="payment-method">Choose payment method:</label>
          <div class="payment-options">
            <label for="VISA">
              <input type="radio" id="VISA" name="payment-method" value="VISA" required>
              <span class="payment-label">VISA</span>
            </label>

            <label for="cash">
              <input type="radio" id="cash" name="payment-method" value="Cash">
              <span class="payment-label">Cash</span>
            </label>
          </div>
        </div>

        <div class="note">
          <p>
            Please note: If the board is not returned before the end of the rental duration, additional charges may apply. Play responsibly and enjoy your surfing experience!
          </p>
      </div>

        <div class="total-cost" id="total-cost">Total Cost: Rs. 0</div>

        <button type="submit" class="pay-now-btn">Pay Now</button>
      </form>
    </div>
  </div>

<?php 
  } else {
    header("Location: ../boards.php");
    exit();
  }
?>

  <script>
    function calculateTotal() {
      const price = <?=$price?>;
      const selectedDays = document.getElementById('rental-days').value;
      const totalCost = price * selectedDays;

      document.getElementById('total-cost').innerText = `Total Cost: Rs. ${totalCost}`;
    }
</script>

</body>
</html>