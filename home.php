<DOCTYPE HTML>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet"href="includes/style.css">
	</head>

	<body>
		<?php
			session_start();

			if(!isset($_SESSION['Username']))
			{
				require('login_tools.php');
				load();
			}
			$page_title ='Home';
			include ('includes/header.html');

			echo"<h1>HOME</h1>
			<p>you are now logged in,
			{$_SESSION['Username']}
			</p>";

			include ('footer.html');
		?>
</body>
</html>

