
<?php
//Step 1
//Add statements with a fuction block to load a specified page
function load($page = 'login.php'){
    //Step 2
    //Add a statement to build a URL string of protocol, current domain, and directory
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
     
    //Step 3
    //Add statements to remove any trailing slashes from the URL string, then append a forward slash and page argument
    $url = rtrim($url, '/\\');
    $url .= '/' . $page;
     
    //Step 4
    //Add statements to load the specified page then quit the script
    header("Location: $url");
    exit();
}
 
//Step 5
//Add statements with a function block to validate the user login details or supply an error message
function validate($dbc, $Email, $Password){
    //Step 6
    //Add statement to initialise an array for error messages
    $errors = array();
     
    //Step 7
    //Add statements to store error messages if the email field remains empty, or store its value in a variable
    if(empty($Email)){
        $errors[] = 'Enter your email address.';
    }
    else{
        $E = mysqli_real_escape_string($dbc, trim($Email));
    }
     
    //Step 8
    //Add statements to store error messages if the password field remains empty, or store its value in a variable
    if(empty($Password)){
        $errors[] = 'Enter your password';
    }
    else{
        $P = mysqli_real_escape_string($dbc, trim($Password));
    }
     
    //Step 9
    //Add statements to store an error message if the email and password aren't found, or return the associated
    //user id to the call if the login succeeds
    if(empty($errors)){
        $query = "Select Username From Users Where Email = '$E' And Password = '$P'";
        $result = mysqli_query($dbc, $query);
         
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            return array(true, $row);
        }
        else{
            $errors[] = 'Email address and password not found.';
        }
    }
     
    //Step 10
    //Add statement to return the list of errors to the caller if the login fails
    return array(false, $errors);
}
 
?>
</body>
</html>
