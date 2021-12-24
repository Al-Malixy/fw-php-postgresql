<?php

class Loader
{
    public function library($library)
    {
        //echo "library $library OK";
    }

    public function model($model)
    {
        $path = "app/web/models/$model.php";

        if (file_exists($path)) {
            require_once $path;
            return new $model();
        }
    }

    public function view($view, $data = [])
    {
        $path = "app/web/views/$view.php";

        if (file_exists($path)) {
            require_once $path;
        }
    }
}
