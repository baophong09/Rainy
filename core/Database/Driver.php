<?php

namespace Rainy\Database;

use \PDO as PDO;
use \Exception as Exception;
use \Rainy\Database\Connectors\MySqlConnector as MySqlConnector;

class Driver
{
    public function connector($config)
    {
        if(!isset($config['driver'])) {
            throw new Exception('Driver is missing')
        }

        switch ($config['driver']) {
            case 'mysql':
                return new MySqlConnector;
        }
    }

    public function createConnection($config)
    {
        $pdo = $this->connector($config);

        if($pdo) {
            switch($config['driver']) {
                case 'mysql':
                    return new MySqlDatabase($pdo);
            }
        }

        throw new Exception("Pdo create fail");
    }
}