<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../assets/surf_img/head_logo.png"/>
  <title>New Board Type Form</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
      color: #333;
    }

    .container {
      max-width: 600px;
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

    .add-board-btn {
      color: #fff;
      background-color: #03a5fc;
      border-color: #03a5fc;
      margin-bottom: 15px;
      transition: background-color 0.15s;
    }

    .add-board-btn:hover {
      background-color: #03c6fc;
    }

    hr {
      margin-top: 12px;
      margin-bottom: 22px;
      border: 1px solid #ddd;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input,
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    select {
      margin-bottom: 16px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="top-section">
      <h1>New Board Type</h1>
      <a href="./viewBoardTypes.php">
        <button class="btn quit-btn">X</button>
      </a>
    </div>

    <hr>
    <form action="../controller/addBoardTypeController.php" method="post">
      <label for="board-type">Board Type:</label>
      <input type="text" name="board-type" required>

      <button type="submit" class="btn add-board-btn">
        Add Board Type
      </button>
    </form>
  </div>
</body>
</html>
