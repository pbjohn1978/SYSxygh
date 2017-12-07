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
                        if( !(isset($_GET["ipToScan"])) ){
							echo '<br><br><h2 class="textWhite bottemBoarder padding10px">Port Scanner</h2>';
							echo '<div class="floatLeft borderGroove width300px textWhite margin10px padding10px bgBlack"><br><form action="./portScan.php" methoud="get"><label class="textWhite" for="ipToScan">IP address to Scan</label><input type="text" name="ipToScan"><input type="submit" value="Scan IP"></form><br></div>';
						}
						else{
							$ipToScan = $_GET["ipToScan"];
							echo '<br><br><h2 class="textWhite bottemBoarder padding10px">Port Scan for: ' . $ipToScan . '</h2>';
							$cmd = 'python ./classes/w3Y1anVD77Qoki2Cdvnn.py ' . $ipToScan;
							exec( $cmd , $portArray);
							
							echo '<div class="textWhite bgBlack borderGroove floatLeft margin10px padding15px width500px"><h3 class="bottemBoarder padding10px">Open Ports</h3><br>';
							if(count($portArray) > 0){
								for($i = 0; $i < count($portArray); $i++){
									if($portArray[$i] == '80'){
										echo $portArray[$i] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://' . $ipToScan . '" target="_blank">Link To ' . $ipToScan . ':' . $portArray[$i] . '</a><br><br>';
									}
									else{
										echo $portArray[$i] . '<br><br>';
									}
								}
							}
							else{
								echo 'No open ports';
							}
							echo '<br></div>';
						}
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
