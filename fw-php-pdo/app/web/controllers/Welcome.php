<?php defined('BASEPATH') or exit('No direct script access allowed');

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
        echo '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
        echo '<h1 style="text-align: center"> Hello World! </h1>';
        echo '<hr>';
        echo '<h1 style="text-align: center"> Welcome to FW-PHP page beta version. </h1>';
        echo '</div>';
    }

    public function version()
    {
        echo '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
        echo '<h3 style="text-align: center"> Version: v0.1 BETA </h3>';
        echo '</div>';
    }

    public function hello($params = [])
    {
        if ($params) {
            if (is_array($params) && !empty($params)) {
                if (count($params) > 1) {
                    $text = implode(" & ", $params);
                    echo "Hello $text";
                } else {
                    $text = implode("", $params);
                    echo "Hello $text";
                }
            } else {
                echo "Hello $params";
            }
        } else {
            echo "Hello World";
        }
    }

}
