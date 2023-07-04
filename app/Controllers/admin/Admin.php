<?php

class Admin
{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? '';

            switch ($action) {
                case 'home':
                    $this->home();
                    break;
                default:
                    break;
            }
    }

    public
    function home()
    {
        if (isset($_SESSION['token'])) {
            include('Views/admin/index.php');
        } else {
            $message_error = "Vui lòng đăng nhập trước!";
            include("Modules/login/Views/login.php");
        }
    }
}