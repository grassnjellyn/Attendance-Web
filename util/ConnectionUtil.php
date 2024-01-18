<?php

class ConnectionUtil
{
    public static function getMySQLConnection() {
        $link = new PDO('mysql:host=localhost;dbname=attendancedb', 'root', '');
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    }
}