<?php

$root = $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['PHP_SELF']);
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

define('BASEURL', $root);
define('BASEPATH', $url);

// define('BASEURL', 'http://localhost/fw-payment');
// define('BASEPATH', $_SERVER['DOCUMENT_ROOT'] . "fw-payment/");

class my_config
{
    public function __construct()
    {
    }

    public function set_config()
    {
        /* set your config here */
        // set base_url
        $config["base_url"] = "";
        // set base_path
        $config["base_path"] = "";
        // set default page
        $config["page"] = "customers";
        // set default action
        $config["action"] = "index";
        // set database
        $config["database"]["host"] = "localhost";
        $config["database"]["port"] = 5432;
        $config["database"]["user"] = "postgres";
        $config["database"]["pass"] = "root";
        $config["database"]["name"] = "payment-app";

        return $config;
    }
}
