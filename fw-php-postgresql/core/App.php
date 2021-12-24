<?php

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

        $page = (isset($_GET['page']) && $_GET['page'] != NULL) ? $_GET['page'] : $default_page;

        if ($page == NULL) {
            header("Location: index.php?page=$page");
        } else {
            $path_file = "app/web/controllers/$page.php";
            if (file_exists($path_file)) {
                require_once $path_file;
                $run = new $page();
                $action = (isset($_GET['action']) && $_GET['action'] != NULL) ? $_GET['action'] : $default_action;
                if ($action == NULL) {
                    $run->$action();
                } else {
                    $params = (isset($_GET['params'])) ? $_GET['params'] : $default_params;
                    if ($params == NULL) {
                        $run->$action();
                    } else {
                        $run->$action($params);
                    }
                }
            } else {
                echo '<h3 style="text-align: center"> 404 - Page Not Found </h3>';
            }
        }
    }
}
