<?php

session_start();

include 'connection.php';

if(isset($_POST['submit'])){

	$username = $_POST['fullname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	//encrpting password
	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	$emailquery = "SELECT * FROM users WHERE email = '$email'";
	$query = mysqli_query($con, $emailquery);

	$emailcount = mysqli_num_rows($query);

	if($emailcount>0){

			?>
			<script>
				alert("Email already exist");
			</script>
			<?php
			
	}else{
		if($password === $cpassword){
			$insertquery = "INSERT INTO users(fullname, email, mobile, password, cpassword) values('$username', '$email', '$mobile', '$pass', '$cpass')";

			$iquery = mysqli_query($con , $insertquery);
			header('location:login.php');

		}else{
			
			?>
			<script>
				alert("Password are not matching");
			</script>
			<?php

		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="login_box">
		<h1>Signup</h1>
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="txt_field">
				<input type="text" name="fullname" required>
				<span></span>
				<label>Full name</label>
			</div>
			<div class="txt_field">
				<input type="email" name="email" required>
				<span></span>
				<label>Email Id</label>
			</div>
			<div class="txt_field">
				<input type="tel" name="mobile" required>
				<span></span>
				<label>Phone number</label>
			</div>
			<div class="txt_field">
				<input type="password" name="password" required>
				<span></span>
				<label>Password</label>
			</div>
			<div class="txt_field">
				<input type="password" name="cpassword" required>
				<span></span>
				<label>Confirm Password</label>
			</div>
			<input type="submit" name="submit" value="Signup">
			<div class="link">
				<p>Have an account <a class="login-link" href="login.php">login</a> here?</p>
			</div>
		</form>
	</div>

</body>
</html>