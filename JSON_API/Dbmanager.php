<?php

class DbManager
{



        public static function Connect($dbname)
        {
            $dsn = "mysql:dbname={$dbname};host=localhost";
            try {
                $pdo = new PDO($dsn, 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $exception) {
                die("connection al DB Fallita: " . $exception->getMessage());
            }
        }


    /*
    public static function Connect($dbname)
    {
        $dsn = "mysql:dbname={$dbname};host=192.168.2.200";
        try {
            $pdo = new PDO($dsn, 'tommaso_zamboni', 'silicates.gossip.Olsens.');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $exception) {
            die("connection al DB Fallita: " . $exception->getMessage());
        }
    }
    */
}
