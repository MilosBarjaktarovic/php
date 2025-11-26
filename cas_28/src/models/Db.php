<?php

namespace PHP28\models;

use PDO;
use PDOException;

class Db
{
    private static $instance = null;

    public static function getConnection()
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    "mysql:host=localhost;dbname=php27;",
                    "root",
                    ""
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("DB greška: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
