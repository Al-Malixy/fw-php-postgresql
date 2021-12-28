<?php defined('BASEPATH') or exit('No direct script access allowed');

class my_middleware
{
    public function auth()
    {
        @session_start();
        $user = (isset($_SESSION["user_login"])) ? $_SESSION["user_login"] : null;
        // $user = null;
        // $user = [
        //     "logged_in" => true,
        //     "session_id" => "fd67ffs67s",
        //     "role" => "admin",
        // ];

        if ($user != null) {
            if ($user['role'] == "admin") {
                //header("Location: index.php");
                return true;
            } else {
                exit("Access Blocked");
                //return false;
            }
        } else {
            exit("Not logged In");
            //return false;
        }
    }
}
