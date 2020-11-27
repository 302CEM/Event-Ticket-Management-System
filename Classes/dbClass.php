<?php

// Data base class that establish the database connection as well
// the PDOExeption that will throw error once oneis encountered.

class DB

{
    private $host    = 'localhost';
    private $port    = 3306;
    private $db      = 'eventbooking';
    private $user    = 'root';
    private $pass    = '';
    private $charset = 'utf8mb4';
    private $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    public $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db;charset=$this->charset";

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $this->options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
