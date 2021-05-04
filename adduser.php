<?php

$forename = $surname = $username = $password = $age = $email = $fail = "";

if (isset($_POST['forename'])) {
    $fail = validate_forename(fix_string($_POST['forename']));
}

if (isset($_POST['surname'])) {
    $fail .= validate_surname(fix_string($_POST['surname']));
}

if (isset($_POST['username'])) {
    $fail .= validate_username(fix_string($_POST['username']));
}

if (isset($_POST['password'])) {
    $fail .= validate_password(fix_string($_POST['password']));
}

if (isset($_POST['age'])) {
    $fail .= validate_age(fix_string($_POST['age']));
}

if (isset($_POST['email'])) {
    $fail .= validate_email(fix_string($_POST['email']));
}


/**
 * Convert all applicable characters to HTML entities
 * @param $string string The string being converted.
 * @return string
 */
function fix_string($string)
{
    return htmlentities($string);
}

/**
 * Forename validator
 * @param $forename string The forename being validated.
 * @return string
 */
function validate_forename($forename)
{
    return ($forename == "" ? "Name has't inputted<br>" : "");
}

/**
 * Surname validator
 * @param $surname string The surname being validated.
 * @return string
 */
function validate_surname($surname)
{
    return ($surname == "" ? "Surname has't inputted<br>" : "");
}

/**
 * Username validator
 * @param $username string The username being validated.
 * @return string
 */
function validate_username($username)
{
    if ($username == "") return "Username hasn't inputted.<br>";
    elseif (strlen($username) < 5)
        return "Username must have 5 or more symbols.<br>";
    elseif (
    preg_match("/[^a-zA-Z0-9_-]/", $username))
        return "Username require letters, numbers or _.<br>";
}

/**
 * Password validator
 * @param $password string The password being validated.
 * @return string
 */
function validate_password($password)
{
    if ($password == "") return "Password hasn't inputted.<br>";
    elseif (strlen($password) < 5)
        return "Password must have 6 or more symbols.<br>";
    elseif (
        !preg_match("/[a-z]/", $password) ||
        !preg_match("/[A-Z]/", $password) ||
        !preg_match("/[0-9]/", $password))
        return "Password require one symbol of each set a-z, A-Z and 0-9.<br>";
    return "";
}

/**
 * Age validator
 * @param $age string The age being validated.
 * @return string
 */
function validate_age($age)
{
    if ($age == "") return "Age hasn't inputted.<br>";
    elseif ($age < 18 || $age > 110)
        return "Age must be between 18 and 110.<br>";
    return "";
}

/**
 * Email validator
 * @param $email string The email being validated.
 * @return string
 */
function validate_email($email)
{
    if ($email == "") return "E-mail hasn't inputted.<br>";
    elseif (
        preg_match("/[^a-zA-Z0-9.@_-]/", $email) ||
        !(strpos($email, ".") > 0 && strpos($email, "@") > 0))
        return "Incorrect E-mail format.<br>";
    return "";
}



