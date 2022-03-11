<?php


# Register page for Spyke, Identical to Login.php, but should add users to the database instead of verify that they exist.




?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="assets/css/loginreg_style.css">
	<title>sell us your soul!!!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>


<body>
	<div class="login-form">
		<h1>User Register</h1>
		<form action="./action/register.php" method="post">
			<p>User Name</p>
			<input type="text" name="username" placeholder="User Name">
			<p>Password</p>
			<input type="password" name="password" placeholder="Password">
			<p>Confirm Password</p>
			<input type="confirm" name="confirm" placeholder="Confirm Password">
			<p>First Name </p>
			<input type="firstname" name="firstname" placeholder="First Name">
			<p>Last Name</p>
			<input type="lastname" name="lastname" placeholder="Last Name">
			<button type="submit">Register</button>
		</form>
	</div>
</body>
</html>