<DOCTYPE HTML>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		
		<link rel="stylesheet"href="includes/style.css">
	</head>

	<body>
<?php
$page_title = 'register';
include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD']== 'POST')
{
	require('includes/connect_db.php');
	$errors = array();
//Username
	if ( empty($_POST['Username']))
	{
		$error[] = 'Enter your Username';
	}
	else
	{
		$Un = mysqli_real_escape_string($dbc,trim($_POST['Username']));
	}
//password
	if(!empty($_POST['Pass1']))
	{
		if($_POST['Pass1']!=$_POST['Pass2'])
		{
			$error[] = 'Passwords do not match.';
		}
		else
		{
			$p = mysqli_real_escape_string($dbc,trim($_POST['Pass1']));
		}
	}
	else
	{
		$errors[]='Enter your password';
	}
//Firstname
	if ( empty($_POST['FirstName']))
	{
		$error[] = 'Enter your FirstName';
	}
	else
	{	
		$fn = mysqli_real_escape_string($dbc,trim($_POST['FirstName']));
	}
//Surname
	if ( empty($_POST['Surname']))
	{	
		$error[] = 'Enter your Surname';
	}
	else
	{
		$Sn = mysqli_real_escape_string($dbc,trim($_POST['Surname']));
	}
//AddressLine1
	if ( empty($_POST['AddressLine1']))
	{	
		$error[] = 'Enter your AddressLine1';
	}
	else
	{
		$Ad1 = mysqli_real_escape_string($dbc,trim($_POST['AddressLine1']));
	}
//AddressLine2
	if ( empty($_POST['AddressLine2']))
	{	
		$error[] = 'Enter your AddressLine2';
	}
	else
	{
		$Ad2 = mysqli_real_escape_string($dbc,trim($_POST['AddressLine2']));
	}
//City
	if ( empty($_POST['City']))
	{	
		$error[] = 'Enter your City';
	}
	else
	{
		$C = mysqli_real_escape_string($dbc,trim($_POST['City']));
	}
//Mobile
	if ( empty($_POST['Mobile']))
	{
		$error[] = 'Enter your Mobile';
	}
	else
	{	
		$Mb = mysqli_real_escape_string($dbc,trim($_POST['Mobile']));
	}
//Telephone
	if ( empty($_POST['Telephone']))
	{
		$error[] = 'Enter your Telephone';
	}
	else
	{	
		$Tp = mysqli_real_escape_string($dbc,trim($_POST['Telephone']));
	}

//Email
	if ( empty($_POST['Email']))
	{
		$error[] = 'Enter your Email';
	}
	else
	{	
		$e = mysqli_real_escape_string($dbc,trim($_POST['Email']));
	}
	if(empty($errors))
	{
		$q = "SELECT Username FROM Users WHERE Email='$e'";
		$r = mysqli_query($dbc,$q);

		if (mysqli_num_rows($r)!=0)
		{
			$errors[]='Email address already registered.<a href="login.php">Login</a>';
		}
	}
//inserts
	if(empty($errors))
	{
		$q = "INSERT INTO Users 
		(Username,Password,Firstname,Surname,AddressLine1,AddressLine2,City,Email,Telephone,Mobile)
		VALUES ('$Un','$p','$fn','$Sn','$Ad1','$Ad2','$C','$e','$Tp','$Mb')";
		$r =mysqli_query($dbc,$q);

		if($r)
		{
			echo'<h1>Registered!</h1>
			<p>You are now registered.</p>
			<p><a href="login.php">Login</a></p>';
		}

		mysqli_close($dbc);
		include('includes/footer.html');
		exit();
	}
	else
	{
		echo '<h1>Error!</h1><p id = "err_msg">The Following error(s) occurred:<br>';
		foreach ($errors as $msg)
		{
			echo " - $msg<br>";
		}
		echo 'Please try again.</p>';
		mysqli_close($dbc);
	}

}



?>

<h1>Register</h1>
<form action = "register.php" method = "POST">
	<p>
		Username: <input type="text" name = "Username" value="<?php if(isset($_POST['Username']))
		echo $_POST['Username'];?>">
	</p>
	
	<p>
		Password: <input type="password" name = "Pass1" value="<?php if(isset($_POST['Pass1']))
		echo $_POST['Pass1'];?>">
	</p>
	<p>
		Confirm Password: <input type="password" name = "Pass2" value="<?php if(isset($_POST['Pass2']))
		echo $_POST['Pass2'];?>">
	</p>
	<p>
		FirstName: <input type="text" name = "FirstName" value="<?php if(isset($_POST['FirstName']))
		echo $_POST['FirstName'];?>">
	</p>
	<p>
		Surname: <input type="text" name = "Surname" value="<?php if(isset($_POST['Surname']))
		echo $_POST['Surname'];?>">
	</p>
	<p>
		AddressLine1: <input type="text" name = "AddressLine1" value="<?php if(isset($_POST['AddressLine1']))
		echo $_POST['AddressLine1'];?>">
	</p>
	<p>
		AddressLine2: <input type="text" name = "AddressLine2" value="<?php if(isset($_POST['AddressLine2']))
		echo $_POST['AddressLine2'];?>">
	</p>
	<p>
		City: <input type="text" name = "City" value="<?php if(isset($_POST['City']))
		echo $_POST['City'];?>">
	</p>
	<p>
		Email: <input type="text" name = "Email" value="<?php if(isset($_POST['Email']))
		echo $_POST['Email'];?>">
	</p>
	<p>
		Telephone: <input type="text" name = "Telephone" value="<?php if(isset($_POST['Telephone']))
		echo $_POST['Telephone'];?>">
	</p>
	<p>
		Mobile: <input type="text" name = "Mobile" value="<?php if(isset($_POST['Mobile']))
		echo $_POST['Mobile'];?>">
	</p>

	<p>
	<input type ="submit" value = "Register">
</p>
</form>
<?php include('includes/footer.html'); ?>
</body>
</html>

