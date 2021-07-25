<?php

session_start();

?>

<?php

include 'connection.php';

if(isset($_POST['submit'])){
 	$email = $_POST['email'];
 	$password = $_POST['password'];

 	$email_search = "SELECT * FROM users WHERE email = '$email'";
 	$query = mysqli_query($con, $email_search);

 	$email_count = mysqli_num_rows($query);

 	if($email_count){
 		$get_pass = mysqli_fetch_assoc($query);

 		$db_pass = $get_pass['password'];

 		$_SESSION['username'] = $get_pass['fullname'];

 		$pass_decode = password_verify($password, $db_pass);

 		if($pass_decode){

 			echo "Login successful";
 			?>
 			<script>
 				location.replace("home.php");
 			</script>
 			<?php
 		}
 		else{

 			echo "Incorrect Password";

 		}

 	}
 	else{

 		echo "Invalid Email";

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
		<h1>Login</h1>
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="txt_field">
				<input type="text" name="email" required>
				<span></span>
				<label>Email Id</label>
			</div>
			<div class="txt_field">
				<input type="password" name="password" required>
				<span></span>
				<label>Password</label>
			</div>
			<input type="submit" name="submit" value="Login">
			<div class="link">
				<p>Don't have an account <a class="signup-link" href="signup.php">signup</a> here?</p>
			</div>
		</form>
	</div>

</body>
</html>