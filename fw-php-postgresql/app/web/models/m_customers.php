<?php

class m_customers extends Model
{
    private $table = "customer.orders";

    public function __construct()
    {
        parent::__construct();
    }

    function select_all_customers()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->db->query($sql);
        return $query;
    }

    function insert_customer()
    {
        // $data = [
        //     "order_id" => "BRG1",
        //     "name" => "Biaya Admin",
        //     "price" => 25000,
        //     "quantity" => 1,
        // ];

        $sql = "INSERT INTO " . $this->table . " (order_id, name, price, quantity) VALUES ('BRG1', 'Biaya Admin', 25000, 1)";
        $query = $this->db->query($sql);
        return $query; //pg_affected_rows($query);
    }
}
