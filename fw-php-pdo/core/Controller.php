<?php

class Controller extends Middleware
{
    protected $load;
    //protected $model;
    // protected $mw;

    public function __construct()
    {
        $this->load = new Loader();
        //$this->model = new Model();
        parent::__construct();
        // if ($this->config["middleware"] == true) {
        //     $this->mw = $this->my_middleware;
        // }
        $this->middleware->auth_check();
    }

}
