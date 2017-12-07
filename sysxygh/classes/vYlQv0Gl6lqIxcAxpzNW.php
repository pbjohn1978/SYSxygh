<?php
    #this script logs in a user by starting a SESSION for them with there user id in the session variable.
    require_once('zSntUkOYX5MGUGz7duv3.php');
    require_once('mpT7nJTHkLFr5GK4jdXo.php');

    if( !( isset($_POST["username"]) && isset($_POST["password"]) ) ){
        header("Location: ../home.php?message=UserName or Password is wrong.");
        exit;
    }

    $mydb = new dbHelper;
    $user = $mydb->{'validateUNandPW'}($_POST["username"], $_POST["password"]);
    if($user === FALSE){
        header("Location: ../home.php?message=UserName or Password is wrong.");
        exit;
    }
    else{
        session_start();
        $guidString = 'UserGuid';
		$_SESSION['userGuid'] = $user->$guidString;
		header("Location: ../home.php");
    }
    
?>
