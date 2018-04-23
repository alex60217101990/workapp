<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 23.04.2018
 * Time: 13:31
 */

namespace modules\model;
use modules\config;
use PDO;
/**
 * Base model
 *
 * PHP version 7.0
 */
abstract class Model
{
    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            $dsn = 'mysql:host=' . config::DB_HOST . ';dbname=' . config::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, config::DB_USER, config::DB_PASSWORD);
            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }
}
