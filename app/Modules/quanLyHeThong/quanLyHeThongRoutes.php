<?php
$folderName = basename(__DIR__);
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
$uriDefault = $Default  . $folderName;
$controller = ucfirst($folderName);

${$folderName . 'Routes'} = [
    $uriDefault                     => $controller . '::index',
    $uriDefault . '/user/list'      => $controller . '::list',
    $uriDefault . "/user/create"    => $controller . '::create',
    $uriDefault . "/user/add"       => $controller . '::add',
    $uriDefault . "/user/edit"      => $controller . '::edit',
    $uriDefault . "/user/update"    => $controller . '::updateUser',

    $uriDefault . '/role/list'      => $controller . '::listRole',
    $uriDefault . '/role/create'    => $controller . '::createRole',
    $uriDefault . '/role/add'       => $controller . '::addRole',
    $uriDefault . '/role/edit'      => $controller . '::editRole',
    $uriDefault . '/role/update'    => $controller . '::updateRole',
];
