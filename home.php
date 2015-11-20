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
				require('/Applications/XAMPP/xamppfiles/htdocs/includes/login_tools.php');
				load();
			}
			$page_title ='Home';
			include ('/Applications/XAMPP/xamppfiles/htdocs/includes/header.html');

			echo"<h1>HOME</h1>
			<p>you are now logged in,
			{$_SESSION['Username']}
			</p>";

			include ('/Applications/XAMPP/xamppfiles/htdocs/includes/footer.html');
		?>
</body>
</html>

