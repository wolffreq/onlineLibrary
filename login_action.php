
﻿
<?php
//Step 1
//Add statement to check if the login form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Step 2
    //Add statement to open the database connection
    require('connect_db.php');
     
    //Step 3
    //Add statement to make the login tools available
    require('login_tools.php');
     
    //Step 4
    //Add statement to ensure login succeeded and get the associated ser details
    list($check, $data) = validate($dbc, $_POST['Email'], $_POST['Password']);
    //Step 5
    //Add statements to set the user details as session data and load a home page, or assign an error message
    if($check){
        session_start();
        $_SESSION['Username'] = $data['Username'];      
        load('home.php');
    }
    else{
        $errors = $data;
    }
     
    //Step 6
    //Add statement to close the connection
    mysqli_close($dbc);
}
 
//Step 7
//Add statement to continue to display the login page when attempt fails
include('login.php');