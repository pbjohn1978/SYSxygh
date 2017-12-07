<?php
	require_once('ava3KsVUvw8syHCJpitM.php');
    require_once('mpT7nJTHkLFr5GK4jdXo.php');
    session_start();
	echo $_POST['fname'] . '<br>';
	echo $_POST['lname'] . '<br>';
	echo $_POST['uname'] . '<br>';
	echo $_POST['phone'] . '<br>"';
	echo $_POST['pass'] . '"<br>';
	
	$mydb1 = new dbHelper;
		
	$oldUserInfo = $mydb1->{'getUserFromUserID'}($_SESSION['userGuid']);
	
	print_r($oldUserInfo);
	
	if( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['uname']) && isset($_POST['phone']) ){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uname = $_POST['uname'];
		$phone = $_POST['phone'];
		$ua = 'UserAccessLevel';
		$access = $oldUserInfo->$ua;
		$ug = 'UserGuid';
		$guid = $oldUserInfo->$ug;
		
		$User = new webGuiUser;
		$User->{'setFirstName'}( $fname );
		$User->{'setLastName'}( $lname );
		$User->{'setUserName'}( $uname);
		$User->{'setMFA'}( '11111' );
		$User->{'setPhone'}( $phone );
		$User->{'setAccessLevel'}( $access );
		$User->{'setUserGuid'}( $guid );
		
		$mydb = new dbHelper;
		
		if($_POST['pass'] == ""){
			$result = $mydb->{'updateUser'}($User);
		}
		else{
			$result = $mydb->{'updateUserWithPass'}($User, $_POST['pass']);
		}
		
		if( $result === TRUE ){
			header('Location: ../sysxyghUsers.php?message=User Updated.');
		}
		else{
			header('Location: ../sysxyghUsers.php?message=There was an error processing your request.');
		}
		
	}
	else{
		header('Location: ../home.php?message=Did You Reach This Page In Error?...');
	}
?>

