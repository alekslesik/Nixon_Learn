<?php

$forename = $surname = $username = $password = $age = $email = "";

if (isset($_POST['forename'])) {
    $forename = fix_string($_POST['forename']);
}

if (isset($_POST['surname'])) {
    $forename = fix_string($_POST['surname']);
}

if (isset($_POST['username'])) {
    $forename = fix_string($_POST['username']);
}

if (isset($_POST['password'])) {
    $forename = fix_string($_POST['password']);
}

if (isset($_POST['age'])) {
    $forename = fix_string($_POST['age']);
}

if (isset($_POST['email'])) {
    $forename = fix_string($_POST['email']);
}


function validate_forename($field)
{
    return ($field == "" ? "Name has't inputted<br>" : "");
}

function validate_surname($field)
{
    return ($field == "" ? "Surname has't inputted<br>" : "");
}

function validate_username($field)
{
    if ($field == "") return "Username hasn't inputted.<br>";
    elseif (strlen($field) < 5)
        return "Username must have 5 or more symbols.<br>";
    elseif (
    preg_match("/[^a-zA-Z0-9_-]/", $field))
        return "Username require letters, numbers or _.<br>";
}

function validate_password($field)
{
    if ($field == "") return "Password hasn't inputted.<br>";
    elseif (strlen($field) < 5)
        return "Password must have 6 or more symbols.<br>";
    elseif (
        !preg_match("/[a-z]/", $field) ||
        !preg_match("/[A-Z]/", $field) ||
        !preg_match("/[0-9]/", $field))
        return "Password require one symbol of each set a-z, A-Z and 0-9.<br>";
    return "";
}

function validate_age($field)
{
    if ($field == "") return "Age hasn't inputted.<br>";
    elseif ($field < 18 || $field > 110)
        return "Age must be between 18 and 110.<br>";
    return "";
}

function validate_email($field)
{
    if ($field == "") return "E-mail hasn't inputted.<br>";
    elseif (
        preg_match("/[^a-zA-Z0-9.@_-]/", $field) ||
        !(strpos($field, ".") > 0 && strpos($field, "@") > 0))
        return "Incorrect E-mail format.<br>";
    return "";
}



