<?php

$project = dirname($_SERVER['PHP_SELF']);
$server_dir = rtrim($_SERVER['DOCUMENT_ROOT'], "/");
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];

$root = $server_dir . $project . "/";
$url = $protocol . $host . $project . "/";

define('BASEURL', $root);
define('BASEPATH', $url);

class my_config
{
    public function config()
    {
        /* set your config here */
        // set base_url
        $config["base_url"] = "";
        // set base_path
        $config["base_path"] = "";

        // set default page
        $config["page"] = "welcome";
        // set default action
        $config["action"] = "index";

        // set database
        $config["database"]["driver"] = "mysql";
        $config["database"]["host"] = "localhost";
        $config["database"]["username"] = "root";
        $config["database"]["password"] = "";
        $config["database"]["name"] = "unira-cr";
        $config["database"]["port"] = 3308;
        $config["database"]["options"] = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        // set middleware
        $config["middleware"] = true;

        return $config;
    }
}
