
<?php
$mysqli = new mysqli('localhost', 'root', '', 'hostel');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

session_start();
if(isset($_POST['submit']))
{
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailid=$_POST['email'];
$password=$_POST['password'];

$query="insert into  userregistration(regNo,firstName,middleName,lastName,gender,contactNo,email,password) values(?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssssiss',$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$password);
$result = $stmt->execute();
if ($result) {
	echo"<script>alert('Student Succssfully register');</script>";
}else {
	echo"<script>alert('Unexpected error prevented registration - Please try again');</script>";
}
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
	<title>User Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>

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

	<!-- <div class="ts-main-content">
		
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">User Registration </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">						

		<div class="form-group">
		<label class="col-sm-2 control-label"> Registration No : </label>
		<div class="col-sm-8">

		<input type="number" name="regno" id="regno"  class="form-control" required="required">

		</div>
		</div>


		<div class="form-group">
		<label class="col-sm-2 control-label">First Name : </label>
		<div class="col-sm-8">
		<input type="text" name="fname" id="fname"  class="form-control" required="required" >
		</div>
		</div>

		<div class="form-group">
		<label class="col-sm-2 control-label">Middle Name : </label>
		<div class="col-sm-8">
		<input type="text" name="mname" id="mname"  class="form-control">
		</div>
		</div>

		<div class="form-group">
		<label class="col-sm-2 control-label">Last Name : </label>
		<div class="col-sm-8">
		<input type="text" name="lname" id="lname"  class="form-control" required="required">
		</div>
		</div>

		<div class="form-group">
		<label class="col-sm-2 control-label">Gender : </label>
		<div class="col-sm-8">
		<select name="gender" class="form-control" required="required">
		<option value="">Select Gender</option>
		<option value="male">Male</option>
		<option value="female">Female</option>
		<option value="others">Others</option>
		</select>
		</div>
		</div>

		<div class="form-group">
		<label class="col-sm-2 control-label">Contact No : </label>
		<div class="col-sm-8">
		<input type="number" name="contact" id="contact"  class="form-control" required="required">
		</div>
		</div>


		<div class="form-group">
		<label class="col-sm-2 control-label">Email id: </label>
		<div class="col-sm-8">

		<input type="email" name="email" id="email"  class="form-control" required="required">

		</div>
		</div>

		<div class="form-group">
		<label class="col-sm-2 control-label">Password: </label>
		<div class="col-sm-8">
		<input type="password" name="password" id="password"  class="form-control" required="required">
		</div>
		</div>


		<div class="form-group">
		<label class="col-sm-2 control-label">Confirm Password : </label>
		<div class="col-sm-8">
		<input type="password" name="cpassword" id="cpassword"  class="form-control" required="required">
		</div>
		</div>
						


<div class="col-sm-6 col-sm-offset-4">
		<button class="btn btn-default" type="reset">Reset</button>
		<input type="submit" name="submit" Value="Register" class="btn btn-primary">
		</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div> -->

	 <div class="wrapper">
        <section class="form signup">
           <header>User Registration</header>
          <form action="#" method="POST" name="registration" enctype='multipart/form-data' auto-complete='off' onSubmit='return valid()'>
            <div class="error-txt"></div>
            <div class="name-details">
              <div class="field input">
                <label>First Name</label>
                <input type="text" name="fname" id="" placeholder="First Name" />
              </div>
              <div class="field input">
                <label>Last Name</label>
                <input type="text" name="lname" id="" placeholder="Last Name" />
              </div>
            </div>
            <div class="field input">
              <label>Email Adress</label>
              <input type="text" name="email" id="" placeholder="Enter your email" />
            </div>
            <div class="field input">
              <label>Password</label>
              <input
                type="password"
                name="password"
                id=""
                placeholder="Enter a new password"
              />
              <i class="fas fa-eye"></i>
            </div>
           
            <div class="field button">
              <input type="submit" value="Signup" />
            </div>
          </form>
          <div class="link">Arleady signed up? <a href="index.php">Login now</a></div>
        </section>
    </div>
	<script src="./js/pass-show-hide.js"></script>
</body>

</html>