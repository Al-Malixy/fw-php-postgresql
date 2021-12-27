<?php

require_once "app/middleware/my_middleware.php";

class Middleware extends Config
{
    //protected $my_middleware;
    protected $middleware;

    public function __construct()
    {
        parent::__construct();
        //$this->my_middleware = new my_middleware();
        if ($this->config["middleware"] == true) {
            $this->middleware = new my_middleware();
        }
    }
}
