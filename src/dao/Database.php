<?php


namespace projet1\dao;

class Database
{

    private $host       = "localhost";
    private $db_name    = "testsql01";
    private $username   = "root";
    private $password   = "Mezough@1987";
    public  ?\PDO $db;

    public function getConnection(): \PDO
    {
        if (!isset($this->db)) {
            try {
                // $db = new PDO('mysql:host=127.0.0.1;charset=utf8;dbname=testdomi','muller','codapppw');
                $this->db = new \PDO("mysql:host=" . $this->host . ";charset=utf8;dbname=" . $this->db_name, $this->username, $this->password);
                $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die('Erreur : ' .  $e->getCode() . ' - ' . $e->getMessage());
            }
        }
        return $this->db;
    }

    public function deconnect()
    {
        return $this->db = null;
    }
}
