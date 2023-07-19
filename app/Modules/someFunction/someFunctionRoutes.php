<?php
use Utils\Util;
$folderName = basename(__DIR__);

// tự động thêm Controller
$controllerLink = dirname(__DIR__) . '\*\Controllers\*.php';
$controllerFiles = glob($controllerLink, GLOB_NOSORT | GLOB_BRACE);
foreach ($controllerFiles as $value){
    $a = explode('.', basename($value));
    if (array_search($folderName,$a) === 0){
        include $value;
    }
}

// tự động thêm Models
$modelsLink = dirname(__DIR__) . '\*\Models\*.php';
$modelsArray = glob($modelsLink, GLOB_NOSORT | GLOB_BRACE);

$searchKeyword = $folderName;
$searchResults = array();

foreach ($modelsArray as $model) {
    if (strpos($model, $searchKeyword) !== false) {
        $searchResults[] = $model;
    }
}
foreach ($searchResults as $value){
    $a = explode('.', basename($value));
    include $value;
}

$uriDefault = '/'.$folderName;
$controller = ucfirst($folderName);

${$folderName . 'Routes'} = [
    $uriDefault             => $controller . '::show',
    $uriDefault . "/upload"   => $controller . '::upload',
    $uriDefault . "/uploadPlugin"   => $controller . '::uploadPlugin',
    $uriDefault . "/changeActive"   => $controller . '::changeActive',
    $uriDefault . '/listPlugin'  =>  $controller . '::listPlugin',
    $uriDefault . "/removePlugin"   => $controller . '::removePlugin',
    $uriDefault . '/showLog'  =>  $controller . '::showLog',
    $uriDefault . '/reloadPlugin'  =>  $controller . '::reloadPlugin',
];

