<?php defined('BASEPATH') or exit('No direct script access allowed');

class App extends Config
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $default_page = $this->config["page"];
        $default_action = $this->config["action"];
        $default_params = [];

        // $page = (isset($_GET['page']) && $_GET['page'] != null) ? $_GET['page'] : $default_page;

        $get = (isset($_GET['page']) && $_GET['page'] != null) ? $_GET['page'] : $default_page;
        $page = $this->route->get_route($get);

        if ($page == null) {
            header("Location: index.php?page=$page");
        } else {
            $path_file = "app/web/controllers/$page.php";
            if (file_exists($path_file)) {
                require_once $path_file;
                if (class_exists($page)) {
                    $run = new $page();
                    $action = (isset($_GET['action']) && $_GET['action'] != null) ? $_GET['action'] : $default_action;
                    if (method_exists($run, $action)) {
                        if ($action == null) {
                            $run->$action();
                        } else {
                            $params = (isset($_GET['params'])) ? $_GET['params'] : $default_params;
                            if ($params == null) {
                                $run->$action();
                            } else {
                                $run->$action($params);
                            }
                        }
                    } else {
                        $html = '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
                        $html .= '<h1 style="text-align: center"> ERROR </h1>';
                        $html .= '<hr>';
                        $html .= '<h1 style="text-align: center"> Method Not Exists </h1>';
                        $html .= '</div>';
                        echo $html;
                    }
                } else {
                    $html = '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
                    $html .= '<h1 style="text-align: center"> ERROR </h1>';
                    $html .= '<hr>';
                    $html .= '<h1 style="text-align: center"> Class Not Exists </h1>';
                    $html .= '</div>';
                    echo $html;
                }
            } else {
                $html = '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
                $html .= '<h1 style="text-align: center"> 404 </h1>';
                $html .= '<hr>';
                $html .= '<h1 style="text-align: center"> Page Not Found </h1>';
                $html .= '</div>';
                echo $html;
            }
        }
    }
}
