<?php
session_start();
include dirname(__FILE__) ."\Utils\Util.php";
include  dirname(__FILE__) ."\Core\Routes.php";


$router->run();

