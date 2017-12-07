 <?php
    require_once('ava3KsVUvw8syHCJpitM.php');
    require_once('mpT7nJTHkLFr5GK4jdXo.php');
    #****************************************************************************************
    #               DATABASE HELPER CLASS
    #****************************************************************************************
    class dbHelper {
        public $hostIP = 'localhost';
        public $dbName = 'sysxygh';
        public $dbUserName = 'sysxyghWebGUI';
        public $dbPassword = 'YixkmYBVQO88BaqF5dGNyC9xbt5DD1VmWYkrESMfJvfqPtnKvxkInhPiut45';
        
        # returns a mySql connection OR boolean 'FALSE' if the connection cant be made
        function getConnection(){
            $con = mysqli_connect($this->hostIP, $this->dbUserName, $this->dbPassword, $this->dbName);
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
                return FALSE;
            }
            return $con;
        }
        
        #takes in a mySql connection as its argument and will return true once the connection is closed.
        function closeConnection($connection){
            $connection->close();
            return TRUE;
        }
        
        #takes in a Username and a Password as arguments and will return The user in a webGuiUser object OR FALSE if the user is NOT in the db.
        function validateUNandPW($uname, $pword){
            $conn = $this->{'getConnection'}();
            $sql = "SELECT * FROM `webaccessusers` WHERE WebUserName = '" . $uname . "' && WebPassword = '" . $pword . "'";
            if(!$conn){
                die("Connection failed");
            }
            $result = mysqli_query($conn, $sql);
            $returnUser = new webGuiUser;
            if ( mysqli_num_rows($result) === 1) {
                $user = mysqli_fetch_assoc($result);
                $returnUser->{'setUserID'}( $user['WebUserID'] );
                $returnUser->{'setFirstName'}( $user['WebFirstName'] );
                $returnUser->{'setLastName'}( $user['WebLastName'] );
                $returnUser->{'setUserName'}( $user['WebUserName'] );
                $returnUser->{'setMFA'}( $user['WebMFA'] );
                $returnUser->{'setPhone'}( $user['WebMFAphoneNum'] );
                $returnUser->{'setAccessLevel'}( $user['WebAccessLevel'] );
                $returnUser->{'setUserGuid'}( $user['WebUserGuid'] );
                $this->{'closeConnection'}($conn);
            }
            else{
                $this->{'closeConnection'}($conn);
                return FALSE;
            }
            return $returnUser;
        }
        
        #takes in a UserID as its argument and will return The user in a webGuiUser object OR FALSE if the user is NOT in the db.
        function getUserFromUserID($guid){
            $conn = $this->{'getConnection'}();
            $sql = "SELECT * FROM `webaccessusers` WHERE WebUserGuid = '" . $guid . "'";
            if(!$conn){
                die("Connection failed: ");
            }
            $result = mysqli_query($conn, $sql);
            $returnUser = new webGuiUser;
            if ( mysqli_num_rows($result) === 1) {
                $user = mysqli_fetch_assoc($result);
                $returnUser->{'setUserID'}( $user['WebUserID'] );
                $returnUser->{'setFirstName'}( $user['WebFirstName'] );
                $returnUser->{'setLastName'}( $user['WebLastName'] );
                $returnUser->{'setUserName'}( $user['WebUserName'] );
                $returnUser->{'setMFA'}( $user['WebMFA'] );
                $returnUser->{'setPhone'}( $user['WebMFAphoneNum'] );
                $returnUser->{'setAccessLevel'}( $user['WebAccessLevel'] );
                $returnUser->{'setUserGuid'}( $user['WebUserGuid'] );
                $this->{'closeConnection'}($conn);
            }
            else{
                $this->{'closeConnection'}($conn);
                return FALSE;
            }
            return $returnUser;
        }
        
        function insertUser($userObj, $newPass){
			$conn = $this->{'getConnection'}();
			$ufn = 'UserFirstName'; $uln = 'UserLastName'; $un = 'UserName'; $up = 'UserMFAphoneNum'; $ua = 'UserAccessLevel'; $ug = 'UserGuid'; $wmfa = 'WebMFA';
			
			$sql = "INSERT INTO `webaccessusers` SET `WebFirstName`='" . $userObj->$ufn . "', `WebLastName`='" . $userObj->$uln . "',  `WebUserName`='" . $userObj->$un . "',  `WebMFAphoneNum`='" . $userObj->$up . "',  `WebAccessLevel`='" . $userObj->$ua . "',  `WebUserGuid`='" . $userObj->$ug . "', `WebMFA`='" . $userObj->$wmfa . "', `WebPassword`='" . $newPass . "'";
			if(!$conn){
				die("Connection failed: ");
			}
			$result = mysqli_query($conn, $sql);
			$this->{'closeConnection'}($conn);
			if($result){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
        
        function updateUser($userObj){
			$ufn = 'UserFirstName'; $uln = 'UserLastName'; $un = 'UserName'; $up = 'UserMFAphoneNum'; $ua = 'UserAccessLevel'; $ug = 'UserGuid'; $wmfa = 'WebMFA';
			
			$conn = $this->{'getConnection'}();
			$sql = "UPDATE `webaccessusers` SET `WebFirstName`='" . $userObj->$ufn . "', `WebLastName`='" . $userObj->$uln . "',  `WebUserName`='" . $userObj->$un . "',  `WebMFAphoneNum`='" . $userObj->$up . "' WHERE `WebUserGuid` = '" . $userObj->$ug . "'";
			if(!$conn){
				die("Connection failed: ");
			}
			$result = mysqli_query($conn, $sql);
			$this->{'closeConnection'}($conn);
			if($result){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		function updateUserWithPass($userObj, $newPass){
			$ufn = 'UserFirstName'; $uln = 'UserLastName'; $un = 'UserName'; $up = 'UserMFAphoneNum'; $ua = 'UserAccessLevel'; $ug = 'UserGuid'; $wmfa = 'WebMFA';
			
			$conn = $this->{'getConnection'}();
			$sql = "UPDATE `webaccessusers` SET `WebFirstName`='" . $userObj->$ufn . "', `WebLastName`='" . $userObj->$uln . "',  `WebUserName`='" . $userObj->$un . "', `WebMFAphoneNum`='" . $userObj->$up . "', `WebPassword`='" . $newPass . "' WHERE `WebUserGuid` = '" . $userObj->$ug . "'";
			if(!$conn){
				die("Connection failed: ");
			}
			$result = mysqli_query($conn, $sql);
			$this->{'closeConnection'}($conn);
			if($result){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
        
        function getAllUsers(){
            $conn = $this->{'getConnection'}();
            $sql = "SELECT * FROM `webaccessusers`";
            if(!$conn){
                die("Connection failed: ");
            }
            $result = mysqli_query($conn, $sql);
            $this->{'closeConnection'}($conn);
            $userArray = array();
            if(mysqli_num_rows($result) > 0){
				while( $user = mysqli_fetch_assoc($result) ){
					$returnUser = new webGuiUser;
					$returnUser->{'setUserID'}( $user['WebUserID'] );
					$returnUser->{'setFirstName'}( $user['WebFirstName'] );
					$returnUser->{'setLastName'}( $user['WebLastName'] );
					$returnUser->{'setUserName'}( $user['WebUserName'] );
					$returnUser->{'setMFA'}( $user['WebMFA'] );
					$returnUser->{'setPhone'}( $user['WebMFAphoneNum'] );
					$returnUser->{'setAccessLevel'}( $user['WebAccessLevel'] );
					$returnUser->{'setUserGuid'}( $user['WebUserGuid'] );
					array_push($userArray, $returnUser);
				}
			}
            else{
				return FALSE;
			}
            return $userArray;
        }
        
        function deleteUserFromGuid($guid){
            $conn = $this->{'getConnection'}();
            $sql = "DELETE FROM `webaccessusers` WHERE WebUserGuid = '" . $guid . "'";
            if(!$conn){
                die("Connection failed: ");
            }
            
            if ( mysqli_query($conn, $sql) ) {
                $this->{'closeConnection'}($conn);
                return TRUE;
            }
            else{
                $this->{'closeConnection'}($conn);
                return FALSE;
            }
        }
    }
    #end DATABASE HELPER CLASS
    #****************************************************************************************
?>
