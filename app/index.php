<?php
session_start();
$uriDefault = $_SERVER['DOCUMENT_ROOT'];
include dirname(__FILE__) ."\Utils\Util.php";
include  dirname(__FILE__) ."\Core\Routes.php";


$router->run();

