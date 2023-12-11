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
  <title>Edit Board Form</title>

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
      margin-top: 5px;
    }

    .update-board-btn {
      color: #fff;
      background-color: #03c6fc;
      border-color: #03c6fc; 
      margin-right: 10px;
      transition: background-color 0.15s;
    }

    .update-board-btn:hover {
      background-color: #03a5fc;
    }

    .close-btn-container {
      display: inline-block;
    }

    .close-btn {
      transition: background-color 0.15s, color 0.15s;
    }

    .close-btn:hover {
      color: white;
      background-color: black;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="top-section">
      <h2>Edit Board</h2>
      <a href="./viewAllBoards.php">
        <button class="btn quit-btn">X</button>
      </a>
    </div>

    <?php
      include "../config/db_conn.php";
        
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $board_id = $_POST['edit-board'];

        $id_sql = "SELECT * FROM boards WHERE board_id = $board_id";
        $id_result = $conn->query($id_sql);

        if ($id_result->num_rows > 0) {
          while ($row = $id_result->fetch_assoc()) {
    ?>

    <form id="uploadForm" action="../controller/updateBoardController.php" enctype="multipart/form-data" method="post">
      <input type="hidden" name="board-id" value="<?= $board_id ?>">

      <label for="board-name">Board Name:</label>
      <input type="text" name="board-name" value="<?=$row['board_name']?>" required>
    
      <label for="board-desc">Board Description:</label>
      <input type="text" name="board-desc" value="<?=$row['board_desc']?>" required>

      <label for="price">Price:</label>
      <input type="text" name="price" value="<?=$row['price']?>" required>
    
      <label for="board-type" style="display: inline-block;">Type:</label>
      <select name="board-type" required>
        <option value="" disabled>Select board type</option>
        <?php
          $sql = "SELECT * FROM board_types";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($board_row = $result->fetch_assoc()){
              if ($board_row["type_id"] === $row["board_type"]) {
                echo "<option value='" . $board_row['type_id'] . "' selected>" . $board_row['type_name'] . "</option>";
              } else {
                echo "<option value='" . $board_row['type_id'] . "'>" . $board_row['type_name'] . "</option>";
              }
            }
          }
        ?>
      </select>

      <label for="stock" style="display: inline-block; margin-left: 20px;">Stock:</label>
      <input type="number" name="stock" style="display: inline-block;" value="<?=$row['stock']?>" required>

      <img width='200px' height='150px' src='<?=$row["board_image"]?>' style="display: block;">

      <label for="board-image">Choose Image:</label>
      <input type="hidden" name="existing-board-image" value="<?=$row['board_image']?>">
      <input type="hidden" id="image-updated" name="is-updated" value="0">
      <input type="file" id="imageUpload" name="board-image">

      <button type="submit" class="btn update-board-btn" style="display: block; margin-top: 30px;">
        Update Board
      </button>
    </form>

    <?php
        }
      }
    }
    ?>
  </div>

  <!-- Check image file extension -->
  <script>
    document.getElementById('imageUpload').addEventListener('change', function() {
      document.getElementById('image-updated').value = '1';
    });

    document.getElementById('uploadForm').addEventListener('submit',      function(event) {
        let fileInput = document.getElementById('imageUpload');
        let filePath = fileInput.value;
        let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp)$/i;

        let file = fileInput.files[0];

        if (filePath) {
          if (!allowedExtensions.exec(filePath)) {
            alert('Please upload only image files with extensions .jpg/.jpeg/.png/.gif.');
            event.preventDefault();
            return false;
          } else if (file) {
            if (file.size > 3 * 1024 * 1024) {
              alert('File size exceeds 3 MB. Please choose a smaller file.');
              event.preventDefault();
              return false;
            }
          }
        }   
    });
  </script>
</body>
</html>