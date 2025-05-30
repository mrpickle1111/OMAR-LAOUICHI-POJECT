<?php
session_start();
include ("connect.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="text-align: center; padding:15%;">
        <p stule="font-size:50px; font-weight:bold">
            HELLO <?PHP 
            if(isset($_SESSION['username'])) {
              $username = $_SESSION['username'];
              $query =mysqli_query($CONN, "SELECT * FROM users WHERE username='$username'");
              while($row = mysqli_fetch_array($query)) {
                echo $row['username'];
              }
            }
            ?>
        </p>
    </div>
</body>
</html>