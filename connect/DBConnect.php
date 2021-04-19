<?php
final class DBConnect
{
    private static string $host = "localhost";
    private static string $user = "root";
    private static string $password = "";

    public static function connect($database = "nixon") {
        return new mysqli(self::$host, self::$user, self::$password, $database);
    }
}
