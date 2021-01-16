<?php


class DatabaseModel
{
    private $dbSettings;
    protected $db;

    public function __construct($dbSettings)
    {
        $this->dbSettings = $dbSettings;
        $this->connect();
    }

    public function __destruct()
    {
        $this->disconnect();
    }

    private function connect()
    {
        try
        {
            $this->db = new PDO($this->dbSettings['dsn'] .
                ':host=' . $this->dbSettings['hostname'] .
                ';dbname=' . $this->dbSettings['database'] .
                ';charset=' . $this->dbSettings['char_set']
                , $this->dbSettings['username']
                , $this->dbSettings['password']);
        }
        catch (PDOException $e)
        {
            echo 'database connection error.';
            exit;
        }
    }

    private function disconnect()
    {
        $this->db = null;
    }
}
