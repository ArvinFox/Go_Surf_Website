<?php
session_start();

// Check if customer is already logged in
if (isset($_COOKIE['user_id']) || isset($_SESSION['user_id'])) {
  header("Location: ../index.php");
  exit();
}

include '../config/db_conn.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $address_1 = $_POST['saddress1'];
  $address_2 = $_POST['saddress2'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $gender = $_POST['gender'];
  $contactno_1 = $_POST['contactno1'];
  $contactno_2 = $_POST['contactno2'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $user_profile_pic = "../assets/images/default-user.svg";

  // Check if the email already exists in the database
  $check_query = "SELECT * FROM customer WHERE email = '$email'";
  $result = $conn->query($check_query);
  
  if ($result->num_rows > 0) {
    // Email already exists, display an error message
    echo "
      <script>
        alert('This email has already been registered.');
        window.location.href = '../signup.php';
      </script>
    ";

  } else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql= "INSERT INTO customer VALUES ('','$fname' , '$lname', '$address_1','$address_2','$city','$country','$gender','$contactno_1','$contactno_2','$email','$hashedPassword', '$user_profile_pic')";

    if($conn->query($sql) === TRUE) {
      header("Location: ../login.php");
      exit();

    } else {
      echo "
        <script>
          alert('Unable to create account.');
          window.location.href = '../signup.php';
        </script>
      ";
    }
  } 

} else {
  header("Location: ../signup.php");
  exit();
}

// Close the connection
$conn->close();
?>