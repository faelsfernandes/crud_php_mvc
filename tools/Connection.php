<?php

abstract class Connection
{    
    private static $connection;
    
    public static function getCon()
    {
        if(self::$connection == null)
        {
            self::$connection = new PDO('mysql: host=localhost; dbname=crud_mvc_php;', 'fernandes', '56726568'); 
        }
        return self::$connection;
    }
}
    