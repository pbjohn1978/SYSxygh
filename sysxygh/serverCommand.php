<?php
    require_once('./classes/zSntUkOYX5MGUGz7duv3.php');
    require_once('./classes/mpT7nJTHkLFr5GK4jdXo.php');
    require_once('./classes/ava3KsVUvw8syHCJpitM.php');
    session_start();
    $userGuid = '';
    if( isset($_SESSION['userGuid']) ){
        $userGuid = $_SESSION['userGuid'];
    }
    $login = new sessionHelper;
    $message;
    if(isset($_GET["message"])){
        $message = $_GET["message"];
    }
    else{
        $message = "";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>SYSxygh Admin Tool</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
                        echo '</br></br><h2 class="textWhite bottemBoarder padding10px">Server Command</h2></br><p id="width100" class="margin10px textRed">Warning: this shell has full access to the command line on: ' . $_SERVER['SERVER_ADDR'] . ' (Host Server).</p></br>';
                        echo '<div id="shellIframe" class="floatLeft"><iframe width="608" height="399" src="./classes/NcLj252LJ5E36GKrKpSR.php" frameborder="0"></iframe></div>';
                    }
                    
                    $dir = './UPLOADED_TO_SERVER';
                    $uploadedFiles = array_diff( scandir($dir, 1) , array('..', '.') );
                    $outputString = '<div id="filesInDir" class="floatLeft borderGroove bgBlack padding10px"><h3 class="textWhite bottemBoarder">Files in directory: UPLOADED_TO_SERVER</h3></br>';
                    for($i = 0; $i < count($uploadedFiles); $i++){
						$outputString = $outputString . '<h3 class="textWhite">FILE NAME: <span class="textGreen">' . $uploadedFiles[$i] . '</span></h3></br>';
					}
					$outputString = $outputString . '</div>';
					echo $outputString;
                ?>
            </div>
        </div>
    </div>
</body>
</html>
