<?php defined('BASEPATH') or exit('No direct script access allowed');

class my_route
{
    public static function route()
    {
        $route["app"] = "welcome";
        $route["default"] = [
            "middleware" => "auth",
            "route" => "home",
            "allowed" => ["index", "add"],
        ];
        $route["index"] = "home";
        return $route;
    }
}
