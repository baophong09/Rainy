<?php

namespace Rainy\Database;

use \PDO as PDO;
use \Exception as Exception;

class Database
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
}