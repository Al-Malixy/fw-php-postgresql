<?php

class Loader
{
    public function helper($helper)
    {
        $path = "app/helper/$helper.php";

        if (file_exists($path)) {
            require_once $path;
            return new $helper();
        }
    }

    public function library($library)
    {
        $path = "app/library/$library.php";

        if (file_exists($path)) {
            require_once $path;
            return new $library();
        }
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
