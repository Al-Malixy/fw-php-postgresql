<?php

class m_home extends Model
{
    private $table_pgw = 'tbl_pgw';

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        // return $this->db->connect();
        $sql = "SELECT * FROM {$this->table_pgw}";
        return $this->db->query($sql);
        // $this->db->query($sql);
        // return $this->db->debug();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO {$this->table_pgw} (id, niy, nama, email) VALUES (:id, :niy, :nama, :email)";
        return $this->db->query($sql, null, $data);
    }
}
