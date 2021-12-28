<?php defined('BASEPATH') or exit('No direct script access allowed');

class Database extends Config
{
    private $connect;

    public function __construct()
    {
        parent::__construct();

        $db_host = $this->config["database"]["host"];
        $db_username = $this->config["database"]["username"];
        $db_password = $this->config["database"]["password"];
        $db_name = $this->config["database"]["name"];
        $db_port = $this->config["database"]["port"];

        $this->connect = new mysqli($db_host, $db_username, $db_password, $db_name, $db_port/*, $db_socket*/);

        if ($this->connect->connect_errno) {
            printf("Connect failed: %s\n", $this->connect->connect_error);
            exit();
        }

    }

    public function connect()
    {
        return $this->connect;
    }

    public function esc_string($str)
    {
        return $this->connect->real_escape_string($str);
    }

    public function query($sql)
    {
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
        $stmt->close();
    }

    public function end()
    {
        $this->connect->close();
    }
}
