<?php  

namespace App\core;

use PDO;
use PDOException;
class Database
{
    public static function connect()
    {
        try {
            return new PDO(
                "mysql:host=localhost;dbname=test;charset=utf8",
                "root",
                ""
            );
        } catch (PDOException $e) {
            echo "Erreur connexion DB";
            exit;
        }
    }
}
