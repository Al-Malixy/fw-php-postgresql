<?php

require_once "app/middleware/my_middleware.php";

class Middleware extends my_middleware
{
    public function get_middleware($middleware)
    {
        if (method_exists(new my_middleware, $middleware)) {
            return $this->$middleware();
        } else {
            return null;
        }
    }
}
