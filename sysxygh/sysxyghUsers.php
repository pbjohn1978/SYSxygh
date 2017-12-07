<?php
    require_once('./classes/zSntUkOYX5MGUGz7duv3.php');
    require_once('./classes/mpT7nJTHkLFr5GK4jdXo.php');
    require_once('./classes/ava3KsVUvw8syHCJpitM.php');
    error_reporting( E_ALL );
    session_start();
    $userGuid = '';
    if( isset($_SESSION['userGuid']) ){
        $userGuid = $_SESSION['userGuid'];
    }
    $login = new sessionHelper;
    $message;
    if(isset($_GET["message"])){
        $message = '*** '. $_GET["message"] . ' ***';
    }
    else{
        $message = "";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>SYSxygh Admin Tool</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <script src="./js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="./js/script.js" type="text/javascript"></script>
    <script src="./js/bg.js" type="text/javascript"></script>
</head>

<body>
    <div id="pageContainer">
        <div id="header">
            <div id="titleDiv"><span id="title">SYSxygh</span></div>
            <?php 
                if( !($login->{'isUserLoggedIn'}()) ){
                    echo $login->{'loginFormString'}();
                }
                else{
                    echo $login->{'logoutBTN'}();
                }
            ?>
        </div>
        <span id="message"><?php echo $message;?></span>
        <div id="mainBody">
            <div>
                <?php
                    if( $login->{'isUserLoggedIn'}() ){
                        echo $login->{'mainMenu'}();
                        echo '</br></br><h2 class="textWhite bottemBoarder padding10px">Manage SYSxygh Users</h2>';
                        $ufn = 'UserFirstName';$uln = 'UserLastName';$un = 'UserName';$up = 'UserMFAphoneNum';$ua = 'UserAccessLevel';$ug = 'UserGuid';
                        $ufn1 = 'UserFirstName';$uln1 = 'UserLastName';$un1 = 'UserName';$up1 = 'UserMFAphoneNum';$ua1 = 'UserAccessLevel';$ug1 = 'UserGuid';
                        $mydb1 = new dbHelper;
						$oldUserInfo = $mydb1->{'getUserFromUserID'}($_SESSION['userGuid']);
                        $mydb = new dbHelper;
                        $allUsers = $mydb->{'getAllUsers'}();
                        echo '<br>';
                        
                        if( (int)$oldUserInfo->$ua >= 3 ){
							echo '<div class="borderGroove floatLeft bgBlack padding10px margin10px width300px textWhite"><h3 class="bottemBoarder padding10px">Add User To SYSxygh</h3><br><br><form action="./classes/phROb2ho4qckSprVCW4e.php" method="post"><label for="fname">First Name: </label><input type="text" name="fname" class="newUser"><br><br><label for="lname">Last Name: </label><input type="text" name="lname" class="newUser"><br><br><label for="uname">User Name: </label><input type="text" name="uname" class="newUser"><br><br><label for="phone">Phone Num: </label><input type="text" name="phone" class="newUser"><br><br><label for="acess">Access Level: </label><input type="text" name="acess" class="newUser"><br><br><label for="pass">Password: </label><input type="text" name="pass" class="newUser"><br><br><input type="submit" value="Add New User"></form><br>*** Access Level must be an integer value... 1 for viewing 2 for server actions 3 for server actions and user actions ***</div>';
						}
                        
                        echo '<div class="borderGroove floatLeft bgBlack padding10px margin10px width300px textWhite"><h3 class="bottemBoarder padding10px">Update User: ' . $oldUserInfo->$un1 . '</h3><br><br><form action="./classes/XbMCR4quSgypBlobIQ8j.php" method="post"><label for="fname">First Name: </label><input type="text" name="fname" class="newUser" value="' . $oldUserInfo->$ufn1 . '"><br><br><label for="lname">Last Name: </label><input type="text" name="lname" class="newUser" value="' . $oldUserInfo->$uln1 . '"><br><br><label for="uname">User Name: </label><input type="text" name="uname" class="newUser" value="' . $oldUserInfo->$un1 . '"><br><br><label for="phone">Phone Num: </label><input type="text" name="phone" class="newUser" value="' . $oldUserInfo->$up1 . '"><br><br><label for="pass">Password: </label><input type="text" name="pass" class="newUser"><br><br><input type="submit" value="Update User: ' . $oldUserInfo->$un1 . '"></form><br></div>';
                        
                        
                        if( ((int)($oldUserInfo->$ua)) >= 3 ){
							echo '<div class="borderGroove clearBoth floatLeft bgBlack padding10px margin10px textWhite"><h3 class="bottemBoarder padding10px">All Current SYSxygh Users</h3>';
							echo '<table class="textWhite width80percent textToCenter"><tr></tr><th>First & Last Name</th><th>Username</th><th>Phone Number</th><th>Access Level</th><th></th><th>Delete</th></tr>';
							for($i = 0; $i < count($allUsers); $i++){
								if($_SESSION['userGuid'] !== $allUsers[$i]->$ug ){
									echo '<tr><th>' . $allUsers[$i]->$ufn . ' ' . $allUsers[$i]->$uln . '</th><th>' . $allUsers[$i]->$un . '</th><th>' . $allUsers[$i]->$up . '</th><th>' . $allUsers[$i]->$ua . '</th><th></th><th><a href="./classes/Gnax65VAkz79W88lpTgE.php?userToDelete=' . $allUsers[$i]->$ug . '">DELETE User: ' . $allUsers[$i]->$ufn . ' ' . $allUsers[$i]->$uln . '</a></th></tr>';
								}
								else{
									echo '<tr><th>' . $allUsers[$i]->$ufn . ' ' . $allUsers[$i]->$uln . '</th><th>' . $allUsers[$i]->$un . '</th><th>' . $allUsers[$i]->$up . '</th><th>' . $allUsers[$i]->$ua . '</th><th></th><th>Currently logged in.</th></tr>';

								}
							}
							echo '</table></div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
