<?php
use Utils\Util;

$folderName = basename(__DIR__)??'';
$path = Util::exportPath($folderName); // lấy tên theo đường dẫn

// tự động thêm Controller
$controllerLink = dirname(__DIR__) . '\*\Controllers\*.php';
$controllerFiles = glob($controllerLink, GLOB_NOSORT | GLOB_BRACE);
foreach ($controllerFiles as $value){
    $a = explode('.', basename($value));
    if (array_search(ucfirst($folderName),$a) === 0){
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

$uriDefault = $Default . $folderName;
$controller = ucfirst($folderName);
/*
$configLink = dirname(__FILE__) . '\*.json';
$configArray = glob($configLink, GLOB_NOSORT | GLOB_BRACE);
foreach ($configArray as $value) {
    $json = file_get_contents($value);
    $json_data = json_decode($json, true);
    $children = $json_data['children'] ?? '';

    $searchValue = basename($_SERVER['PATH_INFO'] ?? '');
    $result = false;

    if (!empty($children)){
        foreach ($children as $key => $child) {
            if ($searchValue === $child['path']) {
                $result = $key;
                break;
            }
        }
    }
    if ($result !== false) {
        $route = $uriDefault . '/' . $children[$result]['path'];
        ${$folderName . 'Routes'} = [
            $route => $controller . '::' . $children[$result]['path'],
        ];
    } else {
        ${$folderName . 'Routes'} = [
            $uriDefault . "/add" => $controller . '::add',
            $uriDefault . "/update" => $controller . '::update',
            $uriDefault . "/search" => $controller . '::search',
            $uriDefault . "/searchHD" => $controller . '::searchHD',
        ];
    }
}
*/
