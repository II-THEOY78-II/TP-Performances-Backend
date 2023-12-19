<?php

namespace App\Common;

use App\Common\Timers;
use PDO;

class Database{
    
    static private ?Database $instance = null;
    private PDO $pdo;

    public function getPDO() : PDO {
        return $this->pdo;
    }

    private function __construct(){
        $this->pdo = new PDO("mysql:host=db;dbname=tp;charset=utf8mb4", "root", "root");
    }

    static public function getInstance(){
        $timer = Timers::getInstance();
        $timerId = $timer->startTimer('TestgetDB');
        if(self::$instance === null){
            self::$instance = new Database();
        }
        $timer->endTimer('TestgetDB', $timerId);
        return self::$instance;
    }
}