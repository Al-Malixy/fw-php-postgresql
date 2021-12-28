<?php

class my_route
{
    public static function route()
    {
        $route["default"] = [
            "middleware" => "auth",
            "route" => "home",
            "allowed" => ["index", "add"],
        ];
        $route["index"] = "home";
        return $route;
    }
}
