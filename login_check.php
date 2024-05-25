<?php
session_start();

$host = 'localhost';

$user = 'root';

$password = '';

$db_name = 'hostel';

$port = 3306;

$conn = mysqli_connect($host, $user, $password, $db_name, $port);
if($conn){
   print("Wow db is connected");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  $row = mysqli_fetch_array($result);

  if ($row['usertype'] == "user") {
     header("location:dashboard.php");
  } elseif ($row['usertype'] == "admin") {
     header("location:admin/dashboard.php");
   //   print
  } else {
     echo "<script type='text/javascript'>
        window.alert('Invalid credentials provided');
     </script>";
  }
}
}else{
   print("Sorry db failed to be connected!");
}
?>
