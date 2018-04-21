<?php

namespace modules;

use Exception;
use PDO;

class Controller
{
    public function __construct()
    {
    }

    /**
     * Includes all models.
     */
    public function handle()
    {
    }
}



/**
 * Base model
 *
 * PHP version 7.0
 */
class Model
{
    /**
     * Get the PDO database connection
     *
     * @return mixed
     * @throws Exception
     */
    protected static function getDB()
    {
        static $db = null;
        try {
            if ($db === null) {
                $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
                // Throw an Exception when an error occurs
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (Exception $e) {
            throw new Exception("Can not connect DB");
        };
        return $db;
    }
}


























































