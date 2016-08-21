<?php

namespace Rainy\Database\Connectors;

use \PDO as PDO;
use \Exception as Exception;

class Connector
{
    protected $options = [];

    public function createConnection($config, $options)
    {
        if(isset($config["dsn"]) && isset($config["username"]) && isset($config["password"])) {
            return $this->PDOConnect($config["dsn"], $config["username"], $config["password"], $options);
        }

        throw new Exception("Connection configs are missing !");
    }

    public function PDOConnect($dsn, $username, $password, $options)
    {
        return new PDO($dsn, $username, $password, $options);
    }

    public function setOptions($options)
    {
        return $this->options = $options;
    }
}

