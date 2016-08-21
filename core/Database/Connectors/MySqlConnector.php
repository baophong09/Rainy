<?php

namespace Rainy\Database\Connectors;

class MySqlConnector extends Connector implements ConnectorInterface
{
    public function connect($config) {
        $config["dns"] = $this->getDns($config);

        // create object PDO
        $connection = $this->createConnection($config, $this->options);

        // use database
        if(isset($config["database"]) && $config["database"]) {
            $connection->exec("use `".$config['database']."`;");
        }

        // set charset
        if(isset($config['charset'])) {
            $query = "set names '{$charset}'" . ($config['collation']) ? " collate '{$config['collation']}'" : '';

            $connection->prepare($query)->execute();
        }

        // return Object PDO
        return $connection;
    }

    public function getDns($config) {
        return isset($config['port'])
                        ? "mysql:host=".$config['host'].";port=".$config['port'].";dbname=".$config["database"] 
                        : "mysql:host=".$config['host'].";dbname=".$config["database"];
    }
}