<?php

namespace IRFANM\PHP\EREPORT\Config;
use \PDO;

class Database
{
    private static ?\PDO $koneksi = null;

    public static function getConnection(string $env = "test"): \PDO
    {
        if(self::$koneksi == null)
        {
            require_once __DIR__ . "/../../config/Database.php";
            
            $config = getDatabaseConfig();
            self::$koneksi = new \PDO(
                $config['database'][$env]['url'],
                $config['database'][$env]['username'],
                $config['database'][$env]['password']
            );
        }
        return self::$koneksi;
    }

    public static function beginTransaction()
    {
        self::$koneksi->beginTransaction();
    }

    public static function commitTransaction()
    {
        self::$koneksi->commit();
    }

    public static function rollbackTransaction()
    {
        self::$koneksi->rollBack();
    }
}
