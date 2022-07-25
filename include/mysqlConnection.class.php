<?php

class Connection
{

    function __construct()
    {
        $this->host = '127.0.0.1';
        $this->user = 'root';
        $this->password = '';
        $this->dbname = 'portal_cidadao';
    }

    function connect()
    {
        $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}
