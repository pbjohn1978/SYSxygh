<?php
    require_once('zSntUkOYX5MGUGz7duv3.php');
    require_once('mpT7nJTHkLFr5GK4jdXo.php');
    #****************************************************************************************
    #               SESSION HELPER CLASS
    #****************************************************************************************
    class sessionHelper {
        function isUserLoggedIn(){
            $db = new dbHelper;
            if (isset($_SESSION['userGuid'])){
                $user = $db->{'getUserFromUserID'}($_SESSION['userGuid']);
                if( $user === FALSE ){
                    return FALSE;
                }
                else{
                    return TRUE;
                }
            }
            return FALSE;
        }
        function loginFormString(){
            return '<div id="loginBoxes"><form id="loginForm" action="./classes/vYlQv0Gl6lqIxcAxpzNW.php" method="post"><label id="uname" for="username">Username:</label><input type="text" name="username"><br><br><label id="pword" for="password">Password:</label><input id="passBox" type="password" name="password">&nbsp;&nbsp;<input id="loginBTN" type="submit" value="Login"></form></div>';
        }
        function logoutBTN(){
            return '<div id="loginBoxes"><form id="loginForm" action="./classes/V9flAWWtIX4xThp0G4GK.php" method="post"><input id="loginBTN" type="submit" value="LOG OUT"></form></div>';
        }
        function mainMenu(){
			# licences tag   <li><a href="./licences.php">Licences</a></li>
            return '<div id="navMenu"><ul><li><a href="./home.php">Home</a></li><li><a href="#">Network</a><ul><li><a href="./localNetwork.php">Local Network</a></li><li><a href="./portScan.php">Port Scanner</a></li></ul></li><li><a href="#">Server</a><ul><li><a href="./sysxyghUsers.php">Manage SYSxygh Users</a></li><li><a href="./serverCommand.php">Server Command</a></li><li><a href="./utsManagement.php">Script Managment</a></li></ul></li><li><a href="#">About</a><ul><li><a href="./about.php">About SYSxygh</a></li><li><a href="./licences.php">Licences</a></li></ul></ul></div>';
        }
        
    }
    #end SESSION HELPER CLASS
    #****************************************************************************************
?>
