<?php

include "db.php";

session_start();

if(isset($_POST["name"]) && isset($_POST["phone"])){
    
    $name = $_POST["name"];
    $phone = $_POST["phone"];
  $q = "SELECT * FROM `users` WHERE uname = '$name' && phone = '$phone'";

    if($rq = mysqli_query($db, $q)){
        if(mysqli_num_rows($rq) == 1){
            //echo "Login";

           $_SESSION["userName"] = $name;
              $_SESSION["phone"]=$phone;
              echo "Login";
                header("location: index.php");
        }
        else {


  $q = "SELECT * FROM `users` WHERE phone = '$phone'";
           if($rq = mysqli_query($db, $q)){
            if(mysqli_num_rows($rq) == 1){

             // echo $phone."is already taken by other pesron!!";
              
       echo "<script> alert($phone + 'is already taken by other pesron!!') </script>";

            }
            else {
 $q = "INSERT INTO `users`(`uname`, `phone`) VALUES ('$name','$phone') ";
           if($rq = mysqli_query($db, $q)){
          $q = "SELECT * FROM `users` WHERE uname = '$name' && phone = '$phone'";

          if($rq = mysqli_query($db, $q)){
            if(mysqli_num_rows($rq) == 1){

            //  echo "Now, You can Login & Register!!";

              $_SESSION["userName"] = $name;
              $_SESSION["phone"]=$phone;

              header("location: index.php");
            }
          }

           }
            

            }
           }
            
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/Login.css">
    <title>Login</title>
</head>
<body>
<h1>ChatRoom</h1>
<div class="login div">
    <h2>Login</h2>
    <p>
        A chat room is a virtual space where users can communicate with each
        other through the internet.
        <form action="" method="post">
            <h3>Username:</h3>
            <input type="text" placeholder="Name" name="name"/> <!-- Added name attribute -->
            <h3>Mobile:</h3>
            <input type="number" placeholder="with country code" min="1111111" max="9999999999" name="phone"/>
            <button type="submit">Login/Register</button> <!-- Added type attribute -->
        </form>
    </p>
</div>
</body>
</html>
