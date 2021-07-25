<?php

session_start();

if(!$_SESSION['username']){

header('location:login.php');

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>

<header>
<nav>
	<div class="name"><h1><?php echo $_SESSION['username']; ?></h1></div>
	<div class="menu">
		<a href="home.php">Home</a>
		<a href="logout.php">Logout</a>
	</div>
</nav>

	<main>
		<section>
			<h2>Welcome to Nepal</h2>
			<h1>Come and visit <span class="change_content"> </span></h1>
			<p>"Destination of every traveller"</p>
			<a href="#" class="btn">Learn more</a>
		</section>
	</main>
</header>

</body>
</html>