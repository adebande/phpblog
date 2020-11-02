<?php
namespace App;

use PDO;

class PdoConnection {

    public static function getPDO (): PDO
    {
        return new PDO('mysql:dbname=phpblog; host=127.0.0.1', 'admin', 'admin', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

} 