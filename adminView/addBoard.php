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
  <link rel="icon" type="image/png" href="../assets/surf_img/head_logo.png"/>
  <title>New Board Form</title>
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

    input[type=text],
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    select {
      margin-bottom: 16px;
    }

    .bottom-section {
      display: flex;
      justify-content: right;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="top-section">
      <h1>New Board</h1>
      <a href="./viewAllBoards.php">
        <button class="btn quit-btn">X</button>
      </a>
    </div>

    <hr>
    <form id="uploadForm" action="../controller/addBoardController.php" enctype="multipart/form-data" method="post">
      <label for="board-name">Board Name:</label>
      <input type="text" name="board-name" required>

      <label for="price">Price:</label>
      <input type="text" name="price" required>

      <label for="board-desc">Description:</label>
      <textarea name="board-desc" required></textarea>

      <label for="board-type" style="display: inline-block;">Type:</label>
      <select name="board-type" required>
        <option value="" disabled selected>Select board type</option>
        <?php
        include '../config/db_conn.php';

        $sql = "SELECT * FROM board_types";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['type_id'] . "'>" . $row['type_name'] . "</option>";
          }
        }
        ?>
      </select>

      <label for="stock" style="display: inline-block; margin-left: 20px;">Stock:</label>
      <input type="number" name="stock" style="display: inline-block;" required>

      <label for="board-image">Choose Image:</label>
      <input type="file" id="imageUpload" name="board-image" required>

      <button type="submit" class="btn add-board-btn" style="display: block; margin-top: 30px;">
        Add Board
      </button>
    </form>
  </div>

  <!-- Check image file extension -->
  <script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
      let fileInput = document.getElementById('imageUpload');
      let filePath = fileInput.value;
      let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.bmp|\.tiff|\.tif|\.svg|\.webp|\.ico)$/i;

      let file = fileInput.files[0];

      if (!allowedExtensions.exec(filePath)) {
        alert('Please upload an image file with extensions .jpg, .jpeg, .png, .gif, .bmp, .tiff, .tif, .svg, .webp, .ico');
        event.preventDefault();
        return false;
        
      } else if (file) {
        if (file.size > 3 * 1024 * 1024) {
          alert('File size exceeds 3 MB. Please choose a smaller file.');
          event.preventDefault();
          return false;
        }
      }
    });
  </script>
</body>
</html>
