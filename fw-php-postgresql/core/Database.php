<?php

class Database extends Config
{
    private $connect;

    public function __construct()
    {
        parent::__construct();

        $db_host = $this->config["database"]["host"];
        $db_port = $this->config["database"]["port"];
        $db_user = $this->config["database"]["user"];
        $db_pass = $this->config["database"]["pass"];
        $db_name = $this->config["database"]["name"];

        $this->connect = pg_connect("host=$db_host port=$db_port dbname=$db_name user=$db_user password=$db_pass");

        if (!$this->connect) {
            echo "Error : Unable to open database\n";
            die();
        }
    }

    //connect to database
    function connect()
    {
        return $this->connect;
    }

    //run query
    function query($sql)
    {
        return pg_query($this->connect, $sql);
    }

    //escape string inout
    function esc($string)
    {
        return pg_escape_string($string);
    }

    //close connection
    function close()
    {
        return pg_close($this->connect);
    }

    //error debug
    function debug($option = false)
    {
        if ($option == true) {
            return pg_last_error($this->connect);
        }
    }
}
