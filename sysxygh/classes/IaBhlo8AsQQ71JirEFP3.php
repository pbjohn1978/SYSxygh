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
    if( $login->{'isUserLoggedIn'}() && isset($_GET['fileToDownload']) ){
		$fileToDL = '/var/www/html/sysxygh/UPLOADED_TO_SERVER/' . $_GET['fileToDownload'];
		if( file_exists($fileToDL) && is_file($fileToDL) ){
			$basename = basename($fileToDL);
			header("Content-disposition: attachment; filename=$basename");
			readfile($fileToDL);
		}
		else{
			header('Location: ../home.php?message=There was and error with your request...');
		}
		 
		 
	}
	else{
		header('Location: ../home.php?message=Did You Reach This Page In Error?...');
	}
?>
