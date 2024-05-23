<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>User or Admin Login</title>
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        font-family: "Poppins", sans-serif;
      }

      body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: #f7f7f7;
      }

      .wrapper {
        background: #fff;
        width: 450px;
        border-radius: 16px;
        box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
          0 32px 64px -48px rgba(0, 0, 0, 0.5);
      }

      .form {
        padding: 25px 30px;
      }

      .form header {
        font-size: 25px;
        font-weight: 600;
        padding-bottom: 10px;
        border-bottom: 1px solid #e6e6e6;
      }

      .form form {
        margin: 20px 0;
      }

      .form form .error-txt {
        color: #721c24;
        background: #f8d7da;
        padding: 8px 10px;
        text-align: center;
        border-radius: 5px;
        margin-bottom: 10px;
        border: 1px solid #f5c6cb;
        display: none;
      }

      .form form .name-details {
        display: flex;
      }

      form .name-details .field:first-child {
        margin-right: 10px;
      }

      form .name-details .field:last-child {
        margin-left: 10px;
      }

      .form form .field {
        display: flex;
        flex-direction: column;
        position: relative;
        margin-bottom: 10px;
      }

      .form form .field label {
        margin-bottom: 2px;
      }

      .form form .field input {
        outline: none;
      }

      .form form .input input {
        height: 40px;
        width: 100%;
        font-size: 16px;
        padding: 0 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      .form form .image input {
        font-size: 17px;
      }

      .form form .button input {
        margin-top: 13px;
        height: 45px;
        border: none;
        font-size: 17px;
        font-weight: 400;
        background: #333;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
      }
      .form form .field i {
        position: absolute;
        right: 15px;
        color: #ccc;
        top: 70%;
        transform: translateY(-50%);
        cursor: pointer;
      }

      .form form .field i.active::before {
        color: #333;
        content: "\f070";
      }

      .form .link {
        text-align: center;
        margin: 10px 0;
        font-size: 17px;
      }

      .form .link a {
        color: #333;
      }

      .form .link a:hover {
        text-decoration: underline;
      }
    </style>
</head>
<body>


	 <div class="wrapper">
        <section class="form login">
          <header>Login To your Account</header>
          <form action="#" method='POST'>
            <div class="error-txt"></div>
            <div class="field input">
              <label>Email Adress / User-name</label>
              <input type="text" name="email" id="" placeholder="Enter your email or user name" />
            </div>
            <div class="field input">
              <label>Password</label>
              <input
                type="password"
                name="password"
                id=""
                placeholder="Enter a your password"
              />
              <i class="fas fa-eye"></i>
            </div>

            <div class="field button">
              <input type="submit" value="Log in" />
            </div>
          </form>
          <div class="link">Not yet signed up? <a href="registration.php">Signup now</a></div>
        </section>
    </div>
  </body>

  <script src="./js/pass-show-hide.js"></script>

</body>

</html>