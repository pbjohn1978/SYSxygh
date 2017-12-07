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
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <meta http-equiv="refresh" content="60">
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
                        echo '</br></br><h2 class="textWhite bottemBoarder padding10px">About</h2>';
						echo '<div class="borderGroove textWhite margin10px padding10px bgBlack textToCenter">';
						echo 'SYSxygh is designed to be a flexable tool to help web server network administors conduct daily tasks remotely. SYSxygh can upload files to a web server than via the shell tool can grant permitions to an uploaded file and even run various files (bash and other). NOTE: THIS SOFTWARE HAS SECURITY HOLES AND COMES WITH NO WARRANTY OF ANY KIND... IT IS NOT SUGGESTED TO KEEP THIS SOFTWARE ON A WEB SERVER FOR AN EXTENDED AMOUNT OF TIME...';
						echo '<br></div>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

