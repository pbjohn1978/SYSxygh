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
                        echo '<br><br><h2 class="textWhite bottemBoarder padding10px">Local Network</h2>';
                        
						$hostIP = $_SERVER['SERVER_ADDR'];
                        $splitIP = explode('.', $hostIP);
                        $stripedIP = $splitIP[0] . '.' . $splitIP[1] . '.' . $splitIP[2] . '.';
                        echo '<div class="margin10px">';
                        exec('python ./classes/Rme6jc7n7zpCMJLprV1X.py ' . $stripedIP , $output);
                        #$output = array('192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1', '192.168.1.1');
                        echo '<div id=icmpBox class="floatLeft borderGroove textWhite margin10px padding10px bgBlack textToCenter"><h3 class="bottemBoarder padding10px">ICMP Responces on Network ' . $stripedIP . '0</h3><br>';
                        for($i = 0; $i < count($output); $i++){
							if( $output[$i] != $_SERVER['SERVER_ADDR'] ){
								echo '<div class="borderGroove floatLeft margin10px padding15px"><a href="./portScan.php?ipToScan=' . $output[$i] . '" target="_blank"><span>' . $output[$i];
								echo '<br><span class="textRed">Click for Port Scan</span></span></a></div>';
							}
							else{
								echo '<div class="borderGroove floatLeft margin10px padding15px"><a href="./portScan.php?ipToScan=' . $output[$i] . '" target="_blank"><span>' . $output[$i];
								echo '<br><span class="textWhite">Host for SYSxygh</span></span></a></div>';
							}
						}
						echo '<br></div>';
						echo '<div class="clearFloat"></div>';
						$arpString = `arp -a`;
						$arpArray = explode("\n", $arpString);
						echo '<div id=icmpBox class="floatLeft borderGroove textWhite margin10px padding10px bgBlack"><h3 class="bottemBoarder padding10px textToCenter">ARP Data on Network ' . $stripedIP . '0</h3><br>';
						for($j = 0; $j < count($arpArray); $j++){
							if( $arpArray[$j] != '' ){
								$lineSplit = explode(" ", $arpArray[$j]);
								if(count($lineSplit) == 7){
									for($k = 0; $k < count($lineSplit); $k++){
										if($k === 0){
											$arpIP = explode( ')', explode( '(', $lineSplit[$k + 1] )[1])[0];
											echo '<div class="borderGroove floatLeft margin10px padding15px arpDataWidth"><a href="./portScan.php?ipToScan=' . $arpIP . '" target="_blank"><h4>Hostname: <span class="textGreen">' . $lineSplit[$k] . '</span></h4>';
											echo '<h4>IP: <span>' . $arpIP . '</span></h4>';
											echo '<h4>MAC: <span>' . $lineSplit[$k + 3] . '</span></h4><h4 class="textRed">Click for Port Scan</h4></a></div>';
										}
									}
								}
							}
						}
						echo '</div>';
						
						#this is the end of main body div leave it here...
						echo '</div>';
						
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
