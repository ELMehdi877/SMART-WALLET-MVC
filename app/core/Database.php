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
                "pgsql:host=localhost;port=5432;dbname=test;user=postgres;password=Mehdi877"
            );
        } catch (PDOException $e) {
            echo "Erreur connexion DB : " . $e->getMessage();
            exit;
        }
    }
}
