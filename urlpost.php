<?php //
    if (isset($_POST['url']))
    {
        echo file_get_contents('http://' . sanitizeString($_POST['url']));
    }

/**
 * Sanitize input string
 * @param $var string
 * @return string
 */
function sanitizeString($var)
    {
        return stripslashes(htmlentities(strip_tags($var)));
    }