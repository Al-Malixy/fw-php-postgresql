<?php defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends Loader
{
    protected $load;
    //protected $model;

    public function __construct()
    {
        $this->load = new Loader();
        //$this->model = new Model();
    }

}
