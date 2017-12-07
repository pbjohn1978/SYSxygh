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
        $message = '*** ' . $_GET["message"] . ' ***';
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
        <span id="message" class="textRed"><?php echo $message;?></span>
        <div id="mainBody">
            <div>
                <?php
                    if( $login->{'isUserLoggedIn'}() ){
                        echo $login->{'mainMenu'}();
                        echo '<br><br><h2 class="textWhite bottemBoarder padding10px">Manage directory: UPLOADED_TO_SERVER</h2>';
                        echo '<div id="uploadFormDiv" class="borderGroove bgBlack textWhite"><form action="./classes/GqO5nG4sXnRVarnuu8sh.php" method="post" enctype="multipart/form-data"><input type="file" name="fileToUpload" id="fileToUpload"><input type="submit"></form></div>';
                        
						$dir = './UPLOADED_TO_SERVER';
						$uploadedFiles = array_diff( scandir($dir, 1) , array('..', '.') );
						$outputString = '<div id="filesInDirPageManagement" class="floatLeft borderGroove bgBlack padding10px"><h3 class="textWhite bottemBoarder">Files in directory: UPLOADED_TO_SERVER</h3><br>';
						$outputString = $outputString . '<table class="textWhite width80percent textToCenter"><tr><th>File Name</th><th>DownLoad File</th><th>Delete File</th></tr>';
						for($i = 0; $i < count($uploadedFiles); $i++){
							$outputString = $outputString . '<tr><td><h3 class="textWhite"><span class="textGreen">' . $uploadedFiles[$i] . '</span></h3></td><td><h3><a href="./classes/IaBhlo8AsQQ71JirEFP3.php?fileToDownload=' . $uploadedFiles[$i] . '" target="_blank">Download</a></h3></td><td><h3><a href="./classes/FXZBKcspjvLzHgc4ckmW.php?fileToDelete=' . $uploadedFiles[$i] . '">Delete</a></h3></td></tr>';
						}
						$outputString = $outputString . '</table></div>';
						echo $outputString;
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
