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
                        echo '</br></br><h2 class="textWhite bottemBoarder padding10px">Home</h2>';
                        $ifconfigString = `ifconfig`;
                        $ifconfigArray = explode( ' ', $ifconfigString);
						$hostName = `hostname`;
						$hostIP = $ifconfigArray[0];
						$hostIPfound = FALSE;
						$netMask = $ifconfigArray[0];
						$netMaskfound = FALSE;
						$broadcast = $ifconfigArray[0];
						$broadcastfound = FALSE;
						$mac = $ifconfigArray[0];
						$macfound = FALSE;
						echo '<div class=" borderGroove textWhite margin10px padding10px bgBlack">';
						for($i = 0; $i < count($ifconfigArray); $i++){
                        	if($ifconfigArray[$i] == 'inet' && !$hostIPfound){
									$hostIP = $ifconfigArray[$i + 1];
									$hostIPfound = TRUE;
							}
							if($ifconfigArray[$i] == 'netmask' && !$netMaskfound){
									$netMask = $ifconfigArray[$i + 1];
									$netMaskfound = TRUE;
							}
							if($ifconfigArray[$i] == 'broadcast' && !$broadcastfound){
									$broadcast = $ifconfigArray[$i + 1];
									$broadcastfound = TRUE;
							}
							if($ifconfigArray[$i] == 'ether' && !$macfound){
									$mac = $ifconfigArray[$i + 1];
									$macfound = TRUE;
							}
						}
						$hostUptime = `uptime -p`;
						$hostUptime = explode( 'up', $hostUptime);
						$hostUptime = $hostUptime[1];

						echo '<div id="updateTime"></br></br><h2 class="textToCenter width100pct textWhite">Host IP: <span class="textGreen">' . $hostIP . '</span></h2><h2 class="textToCenter width100pct textWhite">Network Netmask: <span class="textGreen">' . $netMask . '</span></h2><h2 class="textToCenter width100pct textWhite">Network Broadcast: <span class="textGreen">' . $broadcast . '</span></h2><h2 class="textToCenter width100pct textWhite">Host Mac: <span class="textGreen">' . $mac . '</span></h2><h2 class="textToCenter width100pct textWhite">Hostname: <span class="textGreen">' . $hostName . '</span></h2>';
						echo '<h2 class="textToCenter width100pct textWhite">Host Uptime: <span class="textGreen">';
						echo $hostUptime;
						echo '</span></h2></div>';
						echo '<br><br></div>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
