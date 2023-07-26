<?php

class Router
{
    protected $routes = [];
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

    protected function abort($code = 404)
    {
        http_response_code($code);
        require 'Views/errors/404.php';
        die();
    }

    public function run(){
        $requestURI = parse_url($_SERVER['REQUEST_URI'])['path'];
        $arrConfigPath = \Utils\Util::getFileConfig();
        $checkPageNotFound = true;
        $callback = '';
        foreach ($arrConfigPath as $value){
            if($value['path'] == $requestURI && isset($value['controller'])){
                $checkPageNotFound = false;
                $callback = $value['controller'];
            }
        }

        if ($checkPageNotFound === true){
            \Utils\Util::abort();
        }

        // kiểm tra nếu $callback là 1 chuỗi string (result $callback = Contact::execute)
        if (is_string($callback)){
            // thì cắt chuối sau dấu '::'
            $parts = explode('::', $callback);
            if (is_array($parts)){
                $className = array_shift($parts);
                $controller = new $className;
                $method = array_shift($parts);
                $callback = [$controller,$method];

            }
        }

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