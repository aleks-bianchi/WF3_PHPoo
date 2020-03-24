<?php
namespace App;

class Cnx
{
    /**
     * @var \PDO
     */
    private static $instance;

    //constructeur privé pour empêcher l'instanciation de la classe
    private function __construct()
    {
    }

    /**
     * @return \PDO
     */
    //singleton pour pouvoir instancier une fois seulement le PDO
    public static function getInstance(): \PDO
    {
        if(is_null(self::$instance)){
            self::$instance = new \PDO(
              "mysql:host=localhost;dbname=biblio",
              "root",
              "",
                [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET names utf8",
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]
            );
        }
        return self::$instance;
    }
}