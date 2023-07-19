<?php
include dirname(__FILE__) . "/Router.php";
require_once \Utils\Util::getDirectoryPath(__FILE__,2) . '/Utils/Util.php';
include \Utils\Util::getDirectoryPath(__FILE__,2) . "/Controllers/site/Home.php";
include \Utils\Util::getDirectoryPath(__FILE__,2) . "/Controllers/site/Student.php";
include \Utils\Util::getDirectoryPath(__FILE__,2) . "/Controllers/site/API.php";
include \Utils\Util::getDirectoryPath(__FILE__,2) . "/Controllers/site/Information.php";
include \Utils\Util::getDirectoryPath(__FILE__,2) . "/Controllers/admin/Admin.php";
include \Utils\Util::getDirectoryPath(__FILE__,2). "/Models/admin/UserDB.php";
/*
mục đích include 'Modules/'.$path.'/Controllers/'.ucfirst($path).'.php'
$path là tên các folder ở trong modules
*/
$Default = '/';
$uriDefault = $Default;
// để lấy giá trị sau biến localhost '/project_php/app/'
$uri = $_SERVER['REQUEST_URI'];

$router = new Router();


// sau đó bỏ vào trong $routes để lấy được controller
$routes = [
    $uriDefault . 'home' => 'Home::show',
    $uriDefault . 'student' => 'Student::',
    $uriDefault . 'api' => 'API::',
    $uriDefault . 'information' => 'Information::',
];
$routeAdmin = [
    $uriDefault .'admin' => 'Admin::home',
];

$directoryConfig = dirname(__DIR__) . '/Modules/*/config.json';
$moduleFilesConfig = glob($directoryConfig, GLOB_NOSORT | GLOB_BRACE);

$directory = dirname(__DIR__) . '\Modules\*/*.php';
$moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);

$arrSearch = [];
$allRoutes = [];

foreach ($moduleFilesConfig as $value) {
    $json = file_get_contents($value);
    $json_data = json_decode($json, true);
    if (isset($json_data['hidden']) && $json_data['hidden'] === true) {
        $isHaveConfigTrue[] = basename(dirname($value));
    }
}
$check = isset($isHaveConfigTrue) ? $isHaveConfigTrue : [];

foreach ($check as $value) {
    $arrSearch[] = $value;
}

foreach ($moduleFiles as $file) {
    //include Routes Modules\quanLyNhanVien/quanLyNhanVienRoutes.php
    include $file;
    $arr = basename(dirname($file));
    if (array_search($arr,$arrSearch) === false) {
        $routeVariable = basename($file, '.php');
        // Check if tồn tại và là 1 mảng thì kết hợp mảng đó lại
        if (isset($$routeVariable) && is_array($$routeVariable)) {
            $allRoutes = array_merge($allRoutes, $$routeVariable);
        }
    }
}

$extendRoutes = $allRoutes;

/*dùng để gọp tất cả các mảng lại với nhau*/
$combinedRoutes = array_merge($routes, $routeAdmin, $extendRoutes);

if (array_key_exists($uri, $combinedRoutes)) {
    //lấy đường dẫn và so sánh với mảng và trả về controller
    $handler = $combinedRoutes[$uri];

    if (strpos($handler, '::') !== false) {
        [$controllerClass, $method] = explode('::', $handler);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $router->get($uri, $controllerClass . '::' . $method);
        } else {
            $router->post($uri, $controllerClass . '::' . $method);
        }
    } else {
       /* \Utils\Util::abort();*/
    }
} else {
    /*\Utils\Util::abort();*/
}


