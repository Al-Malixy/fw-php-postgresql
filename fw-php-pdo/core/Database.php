<?php

class Database extends Config
{
    private $connect;
    private $stmt;

    public function __construct()
    {
        parent::__construct();

        $db_driver = $this->config["database"]["driver"];
        $db_host = $this->config["database"]["host"];
        $db_username = $this->config["database"]["username"];
        $db_password = $this->config["database"]["password"];
        $db_name = $this->config["database"]["name"];
        $db_port = $this->config["database"]["port"];
        $db_options = $this->config["database"]["options"];

        $dsn = "{$db_driver}: host={$db_host}; port={$db_port}; dbname={$db_name}";

        try {
            $this->connect = new PDO($dsn, $db_username, $db_password, $db_options);
            //$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected Successfully";
        } catch (PDOException $e) {
            die($e->getMessage());
            //echo "Connection Failed: " . $e->getMessage();z
            //exit("Connection Failed: " . $e->getMessage());
        }

    }

    public function connect()
    {
        return $this->connect;
    }

    /*
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
     */

    // ---------------------------------------------------------
    protected function query($sql, $params = null, $data = null)
    {
        // prepare statement
        $this->stmt = $this->connect->prepare($sql);
        // bind params
        /*
        if ($params != null) {
        foreach ($params as $key => $value) {
        $this->stmt->bindParam($key, $value);
        }
        }
         */
        // bind value data
        if ($data != null) {
            foreach ($data as $key => $value) {
                if (isset($value["type"])) {
                    $this->stmt->bindValue($key, $value["value"], $value["type"]);
                } else {
                    $this->stmt->bindValue($key, $value, PDO::PARAM_STR);
                }
            }
        }
        // execute query
        $this->stmt->execute();
        // return statement
        return $this->stmt;
        // close connection
        $this->stmt = null;
    }

    /*
    public function bind($param, $value, $type = null)
    {
    if( is_null($type) ) {
    switch( true ) {
    case is_int($value) :
    $type = PDO::PARAM_INT;
    break;
    case is_bool($value) :
    $type = PDO::PARAM_BOOL;
    break;
    case is_null($value) :
    $type = PDO::PARAM_NULL;
    break;
    default :
    $type = PDO::PARAM_STR;
    }
    }

    $this->stmt->bindValue($param, $value, $type);
    }
     */

    protected function get_all($opt_result = null)
    {
        $options = ($opt_result == null) ? PDO::FETCH_ASSOC : $opt_result;
        return $this->stmt->fetchAll($options);
    }

    protected function get_one($opt_result = null)
    {
        $options = ($opt_result == null) ? PDO::FETCH_ASSOC : $opt_result;
        return $this->stmt->fetch($options);
    }

    protected function row_count()
    {
        return $this->stmt->rowCount();
    }

    public function disconnect()
    {
        unset($this->connect);
        unset($this->stmt);
    }

    public function debug()
    {
        return $this->stmt->debugDumpParams();
    }

}
