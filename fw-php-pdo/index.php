<?php

if (!session_id()) {
    @session_start();
}

require_once "core/Init.php";

$app = new App();
$app->run();
