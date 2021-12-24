<?php

class Welcome extends Controller
{

    // public function __construct()
    // {
    //     $this->index();
    // }

    public function index()
    {
        $this->start();
    }

    public function start()
    {
        echo '<h3 style="text-align: center"> Hello World! <hr> Welcome to FW-PHP page beta version. </h3>';
    }

    public function version()
    {
        echo '<h3 style="text-align: center"> Version: v0.1 BETA </h3>';
    }
}
