<DOCTYPE HTML>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet"href="includes/style.css">
    </head>

    <body>
<?php
if(mysqli_ping($dbc))
{
    echo'mysql server'.mysqli_get_server_info($dbc).'on'.mysqli_get_host_info($dbc);
}
?>


<?php
function load($page='/Applications/XAMPP/xamppfiles/htdocs/includes/home.php')
 {
    $url ='http://' .$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $url =rtrim($url,'/\\');
    $url .='/'.$page;
    header("Location:$url");
    exit();
 }
 function validate($dbc,$Email,$Password)
 {
 	$errors =array();

 	if(empty($email))
 	{
 		$errors[] ='Enter your email address.';
 	}
 	else
 	{
 		$e =mysqli_real_escape_string($dbc,trim($Email));
 	}

    if(empty($Password))
    {
        $errors[] ='Enter your password.';
    }
    else
    {
        $p =mysqli_real_escape_string($dbc,trim($Password));
    }


 	if(empty($errors))
 	{
 		$q =" SELECT Username
 			  FROM Users
 			  WHERE Email ='$e'
 			  AND Password =('$p')";

 		$r = mysqli_query($dbc,$q);
 		if(mysqli_num_rows($r)==1)
 		{
 			$row =mysqli_fetch_array($r,MYSQLI_ASSOC);
 			return array(true,$row);
 		}
 		else
 		{
 			$errors[]='Email address and password not found';
 		}

 		return array (false,$errors);

 	}

} 

include('/Applications/XAMPP/xamppfiles/htdocs/includes/login.php');   
 
?>
</body>
</html>
