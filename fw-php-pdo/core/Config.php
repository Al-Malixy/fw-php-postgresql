<?php

require_once "app/config/my_config.php";

defined('BASEPATH') or exit('No direct script access allowed');

class Config extends my_config
{
    protected $config;
    protected $route;

    public function __construct()
    {
        $this->config = parent::config();
        $this->route = new Route();
    }

    public function get_config()
    {
        return $this->config;
    }
}
