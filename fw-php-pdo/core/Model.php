<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model extends Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

}
