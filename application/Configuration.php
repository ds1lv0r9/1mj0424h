<?php


class Configuration
{
    private $config;

    public function __construct()
    {
        define('BASE_URI', $_SERVER['SCRIPT_NAME']);

        $this->config['db_settings'] = [
            'dsn' => 'mysql',
            'hostname' => 'database:3306',
            'username' => 'root',
            'password' => 'example',
            'database' => 'some_database',
            'char_set' => 'utf8mb4',
        ];
    }

    public function getSettings()
    {
        return $this->config;
    }
}
