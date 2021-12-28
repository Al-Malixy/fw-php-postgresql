<?php defined('BASEPATH') or exit('No direct script access allowed');

class Database extends Config
{
    private $connect;

    public function __construct()
    {
        parent::__construct();

        $db_host = $this->config["database"]["host"];
        $db_port = $this->config["database"]["port"];
        $db_name = $this->config["database"]["name"];
        $db_username = $this->config["database"]["username"];
        $db_password = $this->config["database"]["password"];

        $this->connect = pg_connect("host=$db_host port=$db_port dbname=$db_name user=$db_username password=$db_password");

        if (!$this->connect) {
            echo "Error : Unable to open database\n";
            die();
        }
    }

    //connect to database
    public function connect()
    {
        return $this->connect;
    }

    //run query
    public function query($sql)
    {
        return pg_query($this->connect, $sql);
    }

    //escape string inout
    public function esc($string)
    {
        return pg_escape_string($string);
    }

    //close connection
    public function close()
    {
        return pg_close($this->connect);
    }

    //error debug
    public function debug($option = false)
    {
        if ($option == true) {
            return pg_last_error($this->connect);
        }
    }
}
