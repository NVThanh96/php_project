<?php
$folderName = basename(__DIR__) ?? '';

$controllerLink = dirname(__DIR__) . '\*\Controllers\*.php';
$controllerFiles = glob($controllerLink, GLOB_NOSORT | GLOB_BRACE);
$modelsLink = dirname(__DIR__) . '\*\Models\*.php';
$modelsArray = glob($modelsLink, GLOB_NOSORT | GLOB_BRACE);

// tự động thêm Controller
foreach ($controllerFiles as $value) {
    $a = explode('.', basename($value));
    if (array_search($folderName, $a) === 0) {
        require_once($value);
    }
}

// tự động thêm Models
$searchKeyword = $folderName;
$searchResults = array();
foreach ($modelsArray as $model) {
    if (strpos($model, $searchKeyword) !== false) {
        $searchResults[] = $model;
    }
}
foreach ($searchResults as $value) {
    $a = explode('.', basename($value));
    require_once($value);
}