<!DOCTYPE html>
 
 
<html>
 
 
 
 
<head>
 
<title>Login</title>
 
<link rel="stylesheet" type="text/css" href="style1.css" />
 
<meta name="author" content="Bernard Mc Donnell">
 
<meta charset="utf-8" />
 
</head>
 
<body>


<!-- PHP script goes here    -->
<?php
//Step 1
$page_title = 'Login';
 
//Step 2
//Add statements that will display any error messages if they exist
if(isset($errors) && !empty($errors)){
    echo '<p id="err_msg">Opps! There was a problem:<br>';
    foreach($errors as $msg){
        echo "- $msg<br>";
    }
    echo 'Please try again or <a href="register.php">Register</a></p>';
}
?>
 
<!-- Step 3 Add the HTML form that will submit the user login dtetails   -->
<h1>Login</h1>
<form action="login_action.php" method="POST">
<p>
Email Address: <input type="text" name="Email">
</p><br><p>
Password: <input type="password" name="Password">
</p><br><p>
<input type="submit" value="Login">
</p>
</form>
 
</div>

 
 
 
 
</body>
 
 
 
</html>