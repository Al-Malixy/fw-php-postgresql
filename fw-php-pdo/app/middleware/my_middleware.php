<?php

class my_middleware
{
    public function __construct()
    {
        //$this->auth_check();
    }

    public function auth_check()
    {
        session_start();
        //$user = isset($_SESSION["user_login"]);
        $user = (isset($_SESSION["user_login"])) ? $_SESSION["user_login"] : null;

        var_dump($user);

        if ($user != null) {
            if ($user['role'] == "admin") {
                header("Location: index.php");
            } else {
                exit("Access Blocked");
            }
        } else {
            die("Not logged In");
        }
    }
}
