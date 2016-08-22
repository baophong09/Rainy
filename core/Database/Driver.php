<?php

namespace Rainy\Database;

use \PDO as PDO;
use \Exception as Exception;
use \Rainy\Database\Connectors\MySqlConnector as MySqlConnector;

/**
 * Class Driver choose driver to use (MySql, LiteSQL etc..)
 */
class Driver
{
    /**
     * Get Class Connector
     *
     * @param Array $config
     *
     * @return Object MySqlConnector
     * @return Exception Driver is missing
     */
    public function connector($config)
    {
        if(!isset($config['driver'])) {
            throw new Exception('Driver is missing');
        }

        switch ($config['driver']) {
            case 'mysql':
                return new MySqlConnector;
        }
    }

    /**
     * Connection connector and Database
     *
     * @param Array $config
     *
     * @return Object MySqlDatabase
     * @return Exception Can't create PDO
     */
    public function createConnection($config)
    {
        try {
            $pdo = $this->connector($config)->connect($config);
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() . "\n";
        }

        if($pdo) {
            switch($config['driver']) {
                case 'mysql':
                    return new MySqlDatabase($pdo);
            }
        }

        throw new Exception("Pdo create fail");
    }
}