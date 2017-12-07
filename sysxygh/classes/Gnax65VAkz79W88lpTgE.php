<?php
	
	require_once('./zSntUkOYX5MGUGz7duv3.php');
    require_once('./mpT7nJTHkLFr5GK4jdXo.php');
    
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

