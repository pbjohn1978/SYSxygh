<?php
    require_once('./zSntUkOYX5MGUGz7duv3.php');
    require_once('./mpT7nJTHkLFr5GK4jdXo.php');
    require_once('./ava3KsVUvw8syHCJpitM.php');
    error_reporting( E_ALL );
    session_start();
    $userGuid = '';
    if( isset($_SESSION['userGuid']) ){
        $userGuid = $_SESSION['userGuid'];
    }
    $login = new sessionHelper;
    if( $login->{'isUserLoggedIn'}() && isset($_GET['fileToDelete']) ){
		$fileToDelete = '/var/www/html/SYSxygh/sysxygh/UPLOADED_TO_SERVER/' . $_GET['fileToDelete'];
		if( file_exists($fileToDelete) && is_file($fileToDelete) ){
			if( unlink($fileToDelete) ){
				header('Location: ../utsManagement.php?message=File "' . $_GET['fileToDelete'] .'" was deleted.');
			}
			else{
				header('Location: ../home.php?message=There was and error with your request...');
			}
		}
		else{
			header('Location: ../home.php?message=There was and error with your request...');
		}
	}
	else{
		header('Location: ../home.php?message=Did You Reach This Page In Error?...');
	}
?>
