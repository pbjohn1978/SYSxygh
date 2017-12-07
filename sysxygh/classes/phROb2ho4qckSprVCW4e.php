<?php
	require_once('ava3KsVUvw8syHCJpitM.php');
    require_once('mpT7nJTHkLFr5GK4jdXo.php');
    
	echo $_POST['fname'] . '<br>';
	echo $_POST['lname'] . '<br>';
	echo $_POST['uname'] . '<br>';
	echo $_POST['phone'] . '<br>';
	echo $_POST['acess'] . '<br>';
	
	function guidv4(){
		if (function_exists('com_create_guid') === true){
			return trim(com_create_guid(), '{}');
		}
		$data = openssl_random_pseudo_bytes(16);
		$data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
		$data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
		return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
	}
	
	
	if( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['uname']) && isset($_POST['phone']) && isset($_POST['acess']) && isset($_POST['pass']) ){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uname = $_POST['uname'];
		$phone = $_POST['phone'];
		$access = $_POST['acess'];
		$newGuid = guidv4();
		
		$newUser = new webGuiUser;
		$newUser->{'setFirstName'}( $fname );
		$newUser->{'setLastName'}( $lname );
		$newUser->{'setUserName'}( $uname);
		$newUser->{'setMFA'}( '11111' );
		$newUser->{'setPhone'}( $phone );
		$newUser->{'setAccessLevel'}( $access );
		$newUser->{'setUserGuid'}( $newGuid );
		
		$mydb = new dbHelper;
		
		$result = $mydb->{'insertUser'}($newUser, $_POST['pass']);
		echo '"';
		print_r($newUser);
		echo '"';
		print_r($result);
		
		if( $result === TRUE ){
			header('Location: ../sysxyghUsers.php?message=New User Added.');
		}
		else{
			echo '<br>the world has crashed down on SYSxygh...';
		}
		
	}
	else{
		header('Location: ../home.php?message=Did You Reach This Page In Error?...');
	}
?>
