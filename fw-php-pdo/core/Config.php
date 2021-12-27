<?php

require_once "app/config/my_config.php";

class Config extends my_config
{
    protected $config;

    public function __construct()
    {
        $this->config = parent::set_config();
    }
}
