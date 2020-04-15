<?php
$con= new mysqli("localhost", "root", "", "iotproject");
$list= $con->query("SELECT * FROM HOMEINTRUSIONDETECTOR WHERE ID=1");
$list= mysqli_fetch_assoc($list);
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Home Intrusion Detector</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<article>
<body oncontextmenu="return false" onload="results()">
  <header>
    <div id="header">
      <div id="headername"><p>Home Intrusion Detector</p></div>
    </div>
  </header>
  <main>
    <div id="results">
      <div id="enteredinfo">
        <?php
        if($list['System']==1) {
          if($list['Detected']==1) {
            echo '<div><p><i class="material-icons md-48 red">remove_red_eye</i></p></div>';
            echo '<div><p><span style="color: red">Alert</span></p></div>';
          }
          else {
            echo '<div><p><i class="material-icons md-48 green">remove_red_eye</i></p></div>';
            echo '<div><p><span style="color: green">Secure</span></p></div>';
          }
        }
        else {
          echo '<div><p><i class="material-icons md-48 inactive">remove_red_eye</i></p></div>';
          echo '<div><p><span style="color: rgba(0, 0, 0, 0.26)">Secure</span></p></div>';
        }
         ?>
      </div>
      <div id="displayresults">
        <table>
          <tr>
            <div class="outertsmembers">
              <p>Alarm
                <?php
                if($list['System']==1) {
                  if($list['Alarm']==1) {
                    echo '<div><i class="material-icons md-48 red">alarm_on</i></button></div>';
                  }
                  else {
                    echo '<div><button name="alarmswitch"><i class="material-icons md-48 green">alarm_off</i></button></div>';
                  }
                }
                else {
                    echo '<div><i class="material-icons md-48 inactive">alarm_off</i></div>';
                }
                 ?>
              </p>
              <?php
              if($list['System']==1) {
                if($list['Detected']==1) {
                  echo '<div><button name="alarmswitch" class="toggles"><i class="material-icons md-48 red">toggle_on</i></button></div>';
                }
                else {
                  echo '<div class="toggles"><i class="material-icons md-48 inactive">toggle_off</i></div>';
                }
              }
              else {
                echo '<div class="toggles"><i class="material-icons md-48 inactive">toggle_off</i></div>';
              }
               ?>
          </tr>

          <tr>
            <div class="outertsmembers">
              <p>System
                <?php
                if($list['System']==1) {
                  echo '<div><i class="material-icons md-48 green">check_circle</i></div>';
                }
                else {
                  echo '<div><i class="material-icons md-48 red">cancel</i></div>';
                }
                ?>
              </p>
              <?php
              if($list['System']==1) {
                echo '<div><i class="material-icons md-48 green">toggle_on</i></div>';
              }
              else {
                echo '<div><i class="material-icons md-48 red">toggle_off</i></div>';
              }
              ?>
           </div>
          </tr>
        </table>
      </div>
    </div>
  </main>
  <script>
  </script>
</body>
</article>
</html>
