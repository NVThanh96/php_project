<?php
session_start();
include __DIR__ ."\Utils\Util.php";
include __DIR__ ."\Core\Routes.php";


$router->run();

