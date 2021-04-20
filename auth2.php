<?php

require_once 'connect/DBConnect.php';

$connection = DBConnect::connect();
if ($connection->connect_error) die ($connection->connect_error);

if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW'])) {
    $un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);
    $pw_tem = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);

    $query = "SELECT * FROM users WHERE username='$un_temp'";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    elseif ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_NUM);
        $salt1 = "qwer";
        $salt2 = "1234";
        $token = hash('ripemd128', "$salt1$pw_tem$salt2");

        if ($token == $row[3]) {
            session_start();
            $_SESSION['username'] = $un_temp;
            $_SESSION['password'] = $pw_tem;
            $_SESSION['forename'] = $row[0];
            $_SESSION['surname'] = $row[1];
            echo "$row[0] $row[1] :
            Hello $row[0], you have registered by name '$row[2]'";
            die ("<p><a href='continue.php'>Click here for continue</a></p>");
        }
        else die("Wrong user-password combination");
    }
    else die("Wrong user-password combination");
} else {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die("Please input login and password");
}

function mysql_entities_fix_string($connection, $string)
{
    return htmlentities(mysql_fix_string($connection, $string));
}

function mysql_fix_string($connection, $string)
{
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
}


