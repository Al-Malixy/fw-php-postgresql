<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once "app/config/my_route.php";

class Route extends my_route
{
    public function get_route($page)
    {
        $route = $this->route();
        // check valid route
        if (isset($route[$page])) {
            // check middleware already set. if not set, return route
            if (isset($route[$page]["middleware"])) {
                $config = new Config();
                $get_config = $config->get_config();
                // check config. if middleware set true get and run middleware. if false, bypass
                if ($get_config["middleware"] == true) {
                    $middleware = new Middleware();
                    $get_middleware = $middleware->get_middleware($route[$page]["middleware"]);
                    // check middleware method, if exists run middleware
                    if ($get_middleware == null) {
                        exit("Middleware Not Exists");
                    } else {
                        // check middleware result. if true, return route
                        if ($get_middleware == true) {
                            return $route[$page]["route"];
                        } else {
                            return $get_middleware;
                        }
                    }
                } else {
                    return $route[$page]["route"];
                }
            } else {
                return $route[$page];
            }
        } else {
            exit("Route Not Exists");
        }
    }
}
