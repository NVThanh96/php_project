<?php
include "Router.php";
include "Controllers/site/Home.php";
include "Controllers/site/Student.php";
include "Controllers/site/API.php";
include "Controllers/site/Information.php";
include "Controllers/admin/Admin.php";

include "Models/admin/UserDB.php";

require_once 'Utils/Util.php';



/*
mục đích include 'Modules/'.$path.'/Controllers/'.ucfirst($path).'.php'
$path là tên các folder ở trong modules
*/
$Default = '/JobDnict/php_project/app/';

$uriDefault = $Default;
$router = new Router();
// để lấy giá trị sau biến localhost '/project_php/app/'
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// sau đó bỏ vào trong $routes để lấy được controller
$routes = [
    $uriDefault . '' => 'Home::',
    $uriDefault . 'student' => 'Student::',
    $uriDefault . 'api' => 'API::',
    $uriDefault . 'information' => 'Information::',
];
$routeAdmin = [
    $uriDefault . 'admin' => 'Admin::home',
    $uriDefault . 'admin/logout' => 'Admin::logout',
];

// đường dẫn truy cập vào các file có trong modules và lấy các file .php ở trong folder
$directory = dirname(__DIR__) . '\Modules\*/*.php';
$moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);
$allRoutes = [];
foreach ($moduleFiles as $file) {

    //include Routes Modules\quanLyNhanVien/quanLyNhanVienRoutes.php
    include $file;
    // auto truy cập vào và lấy mảng ra và gộp lại
    // lệnh này lấy được quanLyHeThong và quanLyHopDong nối với Routes
    $routeVariable = basename($file, '.php');
    // Check if tồn tại và là 1 mảng thì kết hợp mảng đó lại
    if (isset($$routeVariable) && is_array($$routeVariable)) {
        $allRoutes = array_merge($allRoutes, $$routeVariable);
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
        \Utils\Util::abort();
    }
} else {
    \Utils\Util::abort();
}