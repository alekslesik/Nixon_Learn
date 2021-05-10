<?php //convert.php
$f = $c = '';
if (isset($_POST['f'])) $f = sanitizeString($_POST['f']);
if (isset($_POST['c'])) $c = sanitizeString($_POST['c']);

if ($f != '') {
    $c = intval((5 / 9) * ($f - 32));
    $out = "$f f равно $c c";
} elseif ($c != '') {
    $f = intval((9 / 5) * $c + 32);
    $out = "$c c равно $f f";
} else $out = "";
echo <<<_END
<html>  
<head>
<title>Программа перевода температуры</title>
<body>
<pre>
Введите температуру по Фаренгейту или по Цельсию и нажмите кнопу Перевести
<b>$out</b>
<form method="post" action="convert.php">
    По фаренгейту <input type="text" name="f" size="7">
    По Цеьсию <input type="text" name="c" size="7">
    <input type="submit" value="Перевессти">
</form>
</pre>
</body>
</head>
</html>
_END;

function sanitizeString_($var) {
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
