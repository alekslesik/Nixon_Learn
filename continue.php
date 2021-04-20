<?php //continue.php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $forename = $_SESSION['forename'];
    $surname = $_SESSION['surname'];

    echo "Welcome $forename. <br>
     Your whole name $forename $surname.<br>
     Your login '$username'
     Your password '$password'" ;
}
else echo "Please for entry <a href='auth2.php'>click here'</a>.";
