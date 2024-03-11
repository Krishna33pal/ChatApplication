<?php
session_start(); // Make sure to start the session at the beginning

if(isset($_SESSION["userName"]) && isset($_SESSION["phone"])) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ChatRoom</title>
    <link rel="stylesheet" href="CSS/style.css" />
  </head>
  <body>

         


    <h1>ChatRoom</h1>
    <div class="chat">
      <h2>Welcome to <span><?= $_SESSION["userName"]  ?>  </span></h2>
      <div class="msg">
      </div>
      <div class="input_msg">
   <input type="text" placeholder="✍🏻Write message here✍🏻" id="input_msg" />


        <button onclick="update()">Send</button>
      </div>
    </div>
  </body>

<script type="text/javascript" src="js/script.js"></script>






</html>
<?php
} else {
    header("location: Login.php");
    exit(); // Make sure to exit after redirecting
}
?>
