<DOCTYPE HTML>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet"href="includes/style.css">
	</head>

	<body>
		<?php
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				require('/Applications/XAMPP/xamppfiles/htdocs/includes/connect_db.php');
				require('/Applications/XAMPP/xamppfiles/htdocs/includes/login_tools.php');
				printf("this fucking statement");

				list ($check,$data) =  validate($dbc,$_POST['Email'],$_POST['Password']);
				//$check=$dbc;
				if($check)
				{
					printf("this fucking statement too");
					SESSION_START();

					$_SESSION['Username']=$data['Username'];

					load('/Applications/XAMPP/xamppfiles/htdocs/includes/home.php');
				}
				else
				{
					$errors=$data;
				}
				mysqli_close($dbc);
			}
		//include('/Applications/XAMPP/xamppfiles/htdocs/includes/login.php');
		?>
	</body>
</html>