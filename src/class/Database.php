<?php

namespace App\class;

use PDO;

include_once(dirname(__DIR__).'/config.php');

class Database
{
    public static function connect(): ?PDO
    {
        $hostname = $_SERVER['HTTP_HOST'];

        return new PDO("mysql:host=$hostname;dbname=" . DBNAME, DBUSER, DBPASS, PDO_OPTIONS);
    }
}