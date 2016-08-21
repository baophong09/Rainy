<?php

namespace Rainy\Database;

use \PDO as PDO;
use \Exception as Exception;

class Database
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
}