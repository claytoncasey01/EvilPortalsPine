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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
      initial-scale=0.75, maximum-scale=0.75, user-scalable=no">
    <meta name="theme-color" content="#5170ad" />
    <script src="jquery-2.2.1.min.js"></script>
    <script type="text/javascript">
      function redirect() {
          setTimeout(function() {
            document.location.href = $destination; 
          }, 100);
        }
    </script>
    <script src="scanner.js"></script>
    <link href='assets/css/fonts.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet prefetch" href="assets/css/bulma.min.css">
    <link rel='stylesheet prefetch' href='assets/css/style.css'>
    <link rel='stylesheet prefetch' href='assets/css/normalize.min.css'>
    <link rel="icon" type="image/png" href="assets/img/ymwp832k1s.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WiFi Initialization</title>
  </head>
  <body>
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
      <symbol id="logo" viewBox="0 0 144.428 147.758">
        <style>
          .st1,.st11,.st3,.st4,.st5,.st7{fill:#4bacc6;stroke:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:.75}.st11,.st3,.st4,.st5,.st7{fill:#31859b}.st11,.st4,.st5,.st7{fill:#ea700d}.st11,.st5,.st7{fill:#ffc000}.st11,.st7{fill:#f59d56}.st11{fill:none;stroke:#fff}
        </style>
        <path d="M9.3 43.2l33-8.1 9.8-2.3 8 34.7L28 83l-4.3-9L9.3 43.2z" class="st1"/>
        <path d="M42.2 112.7l10 2.2 8-34.7L28 64.7 23.6 74 9.3 104.6l33 8.1z" class="st1"/>
        <path d="M37.8 103.5L70 87.9l22.3 28-7.9 6.3-27 20.8-15-30.3-4.5-9.2z" class="st1"/>
        <path d="M117.9 95.4V85.2H82L74.2 120l10 2.2 33.2 7 .5-33.8z" class="st1"/>
        <path d="M110 101.8l-22.4-28L110 46l8 6.3L144 74l-26.2 21.5-7.9 6.4zM42.2 35.2l-4.4 9.1 32 15.5 22.4-28-8-6.3L57.3 4.8 42.2 35.2z" class="st1"/>
        <path d="M74.2 27.8l8 34.7h35.6V52.3l-.4-33.8-33.2 7-10 2.3z" class="st1"/>
        <path d="M67.4 48.6L50 62.7v22.4l17.5 14 21.8-5L99 74l-9.7-20.3-21.9-5z" fill="#00b050" stroke-linecap="round" stroke-linejoin="round" stroke-width=".8"/>
        <path d="M57 53.6l-19.2-9.3 4.5-9.2 9.8-2.3L57 53.6zM92.2 31.9L79 48.3l-4.7-20.5 9.8-2.3 8 6.4zM117.8 62.5h-21L109.8 46l8 6.3v10.2zM117.9 85.2H96.7l13.2 16.6 8-6.4V85.2zM92.2 115.9L78.9 99.2 74.3 120l10 2.2 7.9-6.3zM56.9 94.2l-19 9.2 4.3 9.2 10 2.3 4.7-20.7zM47 73.9L28 83 23.6 74l4.4-9.2L47 74z" class="st3"/>
        <path d="M94.7 65l-7 8.9-4.1-5.1-1.5-6.3h11.4l1.2 2.5zM93.5 85.2H82.2l1.4-6.3 4-5 7.1 8.8-1.2 2.5zM77.1 97L70 88l5.7-2.9h6.5l-2.6 11.2-2.5.6zM59.7 92.9l-2.1-1.7 2.5-11 6 2.8 3.9 5-10.3 4.9zM50 72.5l10-4.9 1.6 6.1-1.5 6.5-10.2-5v-2.7z" class="st4"/>
        <path d="M59.6 54.9l10.4 5-4 4.9-6 2.9-2.4-11.1 2-1.7z" class="st4"/>
        <path d="M79.7 51.4L77 51l-7.1 9 5.8 2.7H82l-2.4-11.2z" class="st4"/>
        <path d="M67.4 48.7l9 11.1-5.6 2.7h-6.6l3.2-13.8z" class="st5"/>
        <path d="M80.4 65l5.7 2.6 3.2-14-13 6.2 4.1 5.1zM84.7 73.8l1.4 6.4L99 73.9l-12.9-6.3-1.4 6.2zM80.5 82.7l-4 5.1 12.7 6.3-3-13.9-5.7 2.5zM67.3 99L64 85.1h6.6l5.8 2.7L67.3 99zM58.8 73.9l-8.8 11 14 .2-1.3-6.3-4-5z" class="st5"/>
        <path d="M62.7 69l1.5-6.5-14.3.1L58.8 74l3.9-4.8z" class="st5"/>
        <path d="M61.6 74L60 80.2l5.9 2.9 4 4.9 5.7-2.8h6.5l1.3-6.2 4-5-4-5.1-1.4-6.3-6.4.1-5.8-2.8-3.9 5-6 2.8 1.6 6.3z" fill="#fee599" stroke-linecap="round" stroke-linejoin="round" stroke-width=".8"/>
        <path d="M62.6 69l-4 4.8 4 5 1.3 6.3h6.6l5.8 2.7 4.1-5 5.6-2.6-1.5-6.5 1.5-6-5.7-2.8-4-5.1-5.6 2.6H64L62.6 69z" class="st7"/>
        <path d="M56.9 94.2l2.7-1.3-2.1-1.7-.6 3z" fill="#bfbfbf" stroke-linecap="round" stroke-linejoin="round" stroke-width=".8"/>
        <path d="M50 85.1" stroke-linecap="round" stroke-linejoin="round" stroke-width=".8"/>
        <path d="M79.7 51.4l-.7-3-2 2.5 2.7.5zM93.5 62.5l1.2 2.5 2-2.5h-3.2zM94.7 82.7l-1.2 2.5h3.2l-2-2.5zM79.6 96.3l-2.5.6 1.8 2.3.7-2.9zM59.7 92.9l-2.8 1.3.7-3 2 1.7zM50 75.3l-3-1.4 3-1.4v2.8zM57.6 56.6l-.7-3 2.7 1.3-2 1.7z" class="st7"/>
        <path d="M63 81.7l3 1.4 1.8 2.2h2.6l2.7 1.3 2.7-1.3h2.7l1.9-2.4 2.6-1.2.6-2.6 1.6-2-.7-3.1.7-3-1.6-2-.6-2.6-2.7-1.3-2-2.3h-2.5L73 61.5l-2.5 1.2H68L66 64.9l-3 1.4-.6 3-1.6 1.9.7 2.9-.6 3 1.5 1.8.6 2.8z" fill="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width=".8"/>
        <path d="M117.9 95.4L144 73.9l-26.2-21.5v10.1l-68 .1v22.5l68 .1v10.2z" class="st11"/>
        <path d="M84.2 122.2l33.2 7 .5-33.8-8 6.4-42.5-53.2-17.5 14L92.2 116l-8 6.3z" class="st11"/>
        <path d="M42.2 112.7L57.4 143l26.8-20.8-10-2.2 15-66.4-21.8-5L52 115l-9.9-2.2z" class="st11"/>
        <path d="M23.6 73.8L9.3 104.6l33 8-4.5-9.2 61.3-29.6-9.8-20.2L28 83l-4.4-9.2z" class="st11"/>
        <path d="M42.3 35.1l-33 8L23.6 74l4.4-9.2 61.3 29.5 9.8-20.3-61.3-29.6 4.5-9.2z" class="st11"/>
        <path d="M84.2 25.5L57.4 4.8 42.2 35l10-2.3 15.2 66.3 21.9-5-15-66.3 9.9-2.3z" class="st11"/>
        <path d="M117.9 52.4l-.5-34-33.2 7.1 8 6.4L49.9 85l17.5 14 42.5-53 8 6.3z" class="st11"/>
      </symbol>
    </svg>
    <div class="radix">
      <div class="card">
        <form method="POST" action="captiveportal/index.php", onsubmit="redirect()">
          <header class="card-header">
            <svg class="card-header-icon logo">
              <use xlink:href="#logo" />
            </svg>
            <p class="card-header-title title is-4">Radix</p>
            <style>
            </style>
          </header>
          <div class="card-content">
            <div class="content">
              <p>Select the Wifi network that you want the controller to connect to and then provide the password</p>
              <label class="label">Network</label>
              <span id="loader" class="loader is-loading"></span>
              <div id="network-list" class="list is-hoverable is-hidden"></div>
              <div class="field">
                <label class="label">Password</label>
                <div class="control">
                  <input class="input" id="password" type="password" placeholder="Enter password">
                  <input type="hidden" name="hostname" value="<?=getClientHostName($_SERVER['REMOTE_ADDR']);?>">
                  <input type="hidden" name="mac" value="<?=getClientMac($_SERVER['REMOTE_ADDR']);?>">
                  <input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
                  <input type="hidden" name="target" value="<?=$destination?>">
                  <input type="hidden" name="ssid" value="<?=getClientSSID($_SERVER['REMOTE_ADDR']);?>">
                </div>
              </div>
            </div>
          </div>
          <footer class="card-footer">
            <a href="#" class="card-footer-item button  is-light" disabled>Rescan</a>
            <button type="submit" id="submit-btn" class="card-footer-item button is-primary is-light">Login</button>
          </footer>
        </form>
      </div>
    </div>
  </body>
</html>