<?php

class Login
{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'login';
        switch ($action) {
            case 'login':
                $this->index();
                break;
            case 'btnLogin':
                $this->login();
                break;
            case 'btnLogout':
                $this->logout();
                break;
            default:
                break;
        }
    }
    public function index($message_error = null)
    {
        /*var_dump(dirname(__FILE__));
        var_dump(dirname(__DIR__));
        var_dump(dirname($_SERVER));*/
        include('Modules/login/Views/login.php');
    }

    public function login()
    {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        if (!empty($username) && !empty($password)){
            LoginDB::loginWithApi($username, $password);
        }else{
            $message_error = 'Vui lòng nhập đủ tất cả các trường.';
            $this->index($message_error);
        }
    }

    public
    function logout()
    {
        $startTime = microtime(true); // Record the start time
        $endTime = microtime(true); // Record the end time
        include('Modules/login/Views/logout.php');
    }
}