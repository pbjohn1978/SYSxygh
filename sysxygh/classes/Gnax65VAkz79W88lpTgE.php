<?php
    require_once('./zSntUkOYX5MGUGz7duv3.php');
    require_once('./mpT7nJTHkLFr5GK4jdXo.php');
    require_once('./ava3KsVUvw8syHCJpitM.php');
    session_start();
    $userGuid = '';
    if( isset($_SESSION['userGuid']) ){
        $userGuid = $_SESSION['userGuid'];
    }
    $login = new sessionHelper;
    if( !($login->{'isUserLoggedIn'}()) ){
	    header('Location: ../home.php?message=Did You Reach This Page In Error?');
    }
    
	if( isset($_GET["userToDelete"]) ) {
		$mydb = new dbHelper;
		$userGuidToDelete = $_GET["userToDelete"];
		$isDeleted = $mydb->{'deleteUserFromGuid'}($userGuidToDelete);
		
		if($isDeleted === TRUE){
			header('Location: ../sysxyghUsers.php?message=User Deleted');
		}
		else{
			header('Location: ../sysxyghUsers.php?message=Something Went Wrong...Sorry');
		}
	}
	else{
		header('Location: ../home.php?message=Did You Reach This Page In Error?');
	}
	
?>

