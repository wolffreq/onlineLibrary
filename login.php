<DOCTYPE HTML>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet"href="includes/style.css">
	</head>
	<body>
		
		<?php
			if(isset ($errors)&& !empty($errors))
			{
				echo '<p id = "err_msg">Oops! There was a problem:<br>';
				foreach ($errors as $msg)
				{
					echo "-$msg<br>";
				}
				echo 'Please try again or <a href ="register.php">Register</a></p>';
			}
		?>
			<h1>Login</h1>
			<form action="login_tools.php" method="POST">
				<p>
					Email Address: <input type="text" name ="Email">
				</p>
				<p>
					Password: <input type="password" name ="Password">
				</p>
				<input type="submit" value="login">
			</p>
			</form>
	</body>
</html>