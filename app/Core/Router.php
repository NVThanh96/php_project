<?php

class Router
{
    protected array $routes;
    protected $noFoundRoutes;
    protected const METHOD_GET = 'GET';
    protected const METHOD_POST = 'POST';
    protected const METHOD_DELETE = 'DELETE';
    protected const METHOD_PUT = 'PUT';
    protected const METHOD_PATCH = 'PATCH';

    public function add($method, $path, $controller)
    {
        $this->routes[$method . $path] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'middleware' => ''
        ];
        return $this;
    }

    public function get($path,$controller){
        return $this->add(self::METHOD_GET,$path,$controller);
    }
    public function post($path,$controller){
        return $this->add(self::METHOD_POST,$path,$controller);
    }
    public function delete($path,$controller){
        return $this->add(self::METHOD_DELETE,$path,$controller);
    }
    public function put($path,$controller){
        return $this->add(self::METHOD_PUT,$path,$controller);
    }
    public function patch($path,$controller){
        return $this->add(self::METHOD_PATCH,$path,$controller);
    }


    public function addNotFoundController($handler){
        $this->noFoundRoutes = $handler;
    }

    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        require 'Views/errors/404.php';
        die();
    }

    public function run(){
        $requestURI = parse_url($_SERVER['REQUEST_URI']);
        $requestPath =$requestURI['path'];
        $method = $_SERVER['REQUEST_METHOD'];

        $callback = null;
        foreach ($this->routes as $route){
            if (isset($route['path']) && $route['path'] == $requestPath && $method == $route['method']) {
                $callback = $route['controller'];
                $middleware = $route['middleware'];
                break;
            }
        }

        // kiểm tra nếu $callback là 1 chuỗi string (result $callback = Contact::execute)
        if (is_string($callback)){
            // thì cắt chuối sau dấu '::'
            $parts = explode('::', $callback);
            /*kết quả: $parts (http://localhost/project_php/app/admin/quanLyHopDong/list)
                array (size=2)
                    0 => string 'QuanLyHopDong' (length=7)
                    1 => string 'list' (length=7)
            */

            //kiểm tra nếu $parts là 1 mảng
            if (is_array($parts)){
                $className = array_shift($parts);
                //var_dump($className); lấy được "QuanLyHopDong"
                $controller = new $className;


                // dùng để lấy method theo đường dẫn trên sẽ lấy được list
                $method = array_shift($parts);

                // sau đó dùng $call back để chứa $handler và $method
                $callback = [$controller,$method];
                /*Result var_dump($callback)
                    array (size=2)
                      0 => object(QuanLyHopDong)[2]
                      1 => string 'list' (length=4)
                */
            }
        }

        /*if ($middleware === 'admin') {
            // Perform your login check here
            if (!isset($_SESSION['admin'])) {
                header("Location: /project_php/app/login");
                exit;
            }
        }*/

        if (!$callback){
            header("HTTP/1.0 404 NOT FOUND");
            if (!empty($this->noFoundController)){
                $callback=$this->noFoundController;
            }
        }

        if (is_callable($callback)) {
            call_user_func_array($callback, [
                array_merge($_GET,$_POST)
            ]);
        }
    }


}