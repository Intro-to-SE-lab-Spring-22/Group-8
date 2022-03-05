<?php
# Login page for Spyke, should take user input in fields "Username" and "Password" to verify that the user and password combination exists in the database, on fail: "This Username does not exist, or this password does not match this Username"  on success: print to the screen "welcome <username> and call make a call to the homepage with that user's credentials to fill out their own homepage.


?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- link to stylesheet -->
</head>

<body>
	<div class="login-form">
		<h1>Login Form</h1>
		<form action="#" method="post">
			<p>User Name</p>
			<input type="text" name="user" placeholder="User Name">
			<p>Password</p>
			<input type="password" name="password" placeholder="Password">
			<button type="submit">Login</button>
		</form>
	</div>
</body>
</html>
