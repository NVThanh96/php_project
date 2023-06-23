<?php
$folderName = basename(__DIR__);
$path = \Utils\Util::exportPath($folderName); // lấy tên theo đường dẫn

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
$modelsFiles = glob($modelsLink, GLOB_NOSORT | GLOB_BRACE);
foreach ($modelsFiles as $value){
    $a = explode('.', basename($value));
    if (array_search($folderName."DB",$a) === 0){
        include $value;
    }
}

$uriDefault = '/project_php/app/tts/' .$path. '/cuocthi/qldangkydetai/dangkydetai/';
$controller = ucfirst($path);

${$path . 'Routes'} = [
    $uriDefault            => $controller . '::show',
    $uriDefault . "list"   => $controller . '::list',
    $uriDefault . "create" => $controller . '::create',
    $uriDefault . "add"     => $controller . '::add',
    $uriDefault . "edit"   => $controller . '::edit',
    $uriDefault . "update" => $controller . '::update'
];
