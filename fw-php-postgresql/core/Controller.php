<?php

class Controller
{
    protected $load;
    //protected $model;

    public function __construct()
    {
        $this->load = new Loader();
        //$this->model = new Model();
    }

}
