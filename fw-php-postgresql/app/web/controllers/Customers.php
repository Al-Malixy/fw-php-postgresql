<?php

class Customers extends Controller
{
    protected $m_cust;

    public function __construct()
    {
        parent::__construct();
        $this->m_cust = $this->load->model("m_customers");
    }

    public function index()
    {
        $this->show();
    }

    function show()
    {
        $data['pegawai'] = $this->m_cust->select_all_customers();
        $this->load->view("customers_index", $data);
    }

    public function add()
    {
        $this->load->view("customers_form");
    }

    function hello($params = [])
    {
        if ($params) {
            if (is_array($params) && !empty($params)) {
                if (count($params) > 1) {
                    $text = implode(" & ", $params);
                    echo "Hello $text";
                } else {
                    $text = implode("", $params);
                    echo "Hello $text";
                }
            } else {
                echo "Hello $params";
            }
        } else {
            echo "Hello World";
        }
    }
}
