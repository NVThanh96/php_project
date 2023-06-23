// Router.php dùng để khai báo 1 số chức năng
    - add($method, $path, $controller) dùng để lấy phương thức, đường dẫn và controller
    - các gọi các chức năng khác như get, post, delete, put, patch
    - và chức năng run được  gọi ra sử dụng tại index.php ngoài cùng

// Routes.php dùng để khai báo và tạo $routes = [] chứa đường dẫn và function
    - sau đó $directory = dirname(__DIR__) . '\Modules\*/*.php'; truy vào đường dẫn
    - để tự động đọc các file *Route.php
    - rồi dùng vòng lặp để thêm các đường dẫn
        ex: //include Routes Modules\quanLyNhanVien/quanLyNhanVienRoutes.php
    - Dùng function basename
        $routeVariable = basename($file, '.php'); để lấy tên các file và bỏ '.php'
          var_dump($routeVariable) sẽ cho ra    quanLyHeThongRoutes
                                                quanLyHopDongRoutes
                                                quanLyLinhVucRoutes
                                                quanLyNhanVienRoutes
    - Sau đó kiểm tra có tồn tại biến $routeVariable và có phải là 1 mảng không
        if true thì kết hợp các mảng đó lại với nhau $allRoutes = array_merge($allRoutes, $$routeVariable);
    - sau đó gọi 1 biến để chứa mảng trên và hợp mảng ngoài và mảng trong lại với nhau

    - tiếp tục kiểm tra có tồn tại đường dẫn đó trong $combineRoutes
        if true
            tạo 1 chứa controller
                $handler = $combinedRoutes[$uri]; trả về QuanLyHopDong::add
            if (strpos($handler, '::') == true)
                [$controllerClass, $method] = explode('::', $handler);
                    ($controlerClass sẽ là chứa giá trị trước '::'
                     $handler sẽ là chứa giá trị sau '::')

                     if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                $router->get($uri, $controllerClass . '::' . $method);
                            } else {
                                $router->post($uri, $controllerClass . '::' . $method);
                            }
                            nếu else thì sẽ trả về trang lỗi
