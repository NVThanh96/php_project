<?php

use models\Role;
use models\User;
use Utils\Util;


class QuanLyHeThong
{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? '';
        switch ($action) {
            case 'index';
                $this->index();
                break;
            case 'list';
                $this->list();
                break;
            case 'create':
                $this->create();
                break;
            case 'add':
                $this->addUser();
                break;
            case 'edit':
                $this->edit();
                break;
            case 'update':
                $this->updateUser();
                break;
            case 'deleteSoft':
                $this->softDeleteUser();
                break;
            case 'listRole';
                $this->listRole();
                break;
            case 'createRole';
                $this->createRole();
                break;
            case 'addRole';
                $this->addRole();
                break;
            case 'editRole';
                $this->editRole();
                break;
            case 'updateRole';
                $this->updateRole();
                break;
            case 'deleteSoftRole':
                $this->softDeleteRole();
                break;
            default:
                break;
        }

    }

    public function index()
    {
        $totalHopDong = (new Util)->countHopDong();
        $totalUser = (new Util)->countUser();
        $totalNhanVien = (new Util)->countNhanVien();

        include('Views/admin/index.php');
    }

    public function list()
    {
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);

        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // số lượng giá trị sẽ hiện thị trong 1 bảng
        $items_per_page = 6;
        $flag_delete = 0;

        $result = User::getUserPage($page_number, $items_per_page, $flag_delete);

        $list_users = $result['user'];
        $total_pages = $result['total_pages'];
        $checkAccess = Util::checkAccess();
        include('Modules/' . $path . '/Views/list.php');
    }


    public function create()
    {
        $roles = Role::getRole();
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = Util::exportPath($folderName);

        $checkAccess = Util::checkAccess();
        include('Modules/' . $path . '/Views/create.php');
    }

    public function addUser()
    {
        User::createUser();
        $this->list();
    }


    public function edit()
    {
        $roles = Role::getRole();
        $id = filter_input(INPUT_GET, 'id');
        $_SESSION['id'] = $id;
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = Util::exportPath($folderName);


        $checkAccess = Util::checkAccess();
        $values = User::getUserByID($id);

        include('Modules/'.$path.'/Views/edit.php');

    }

    public function updateUser()
    {

        $id = $_SESSION['id'];
        User::editUser($id);
        $this->list();
    }

    public function softDeleteUser()
    {

        $id = filter_input(INPUT_GET, 'id');
        User::softDeleteUser($id);
        $this->list();
    }

    public function error()
    {
        include('Views/errors/404.php');
    }

    public function listRole()
    {
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);

        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // số lượng giá trị sẽ hiện thị trong 1 bảng
        $items_per_page = 6;
        $flag_delete = 0;

        $result = Role::getRolePage($page_number, $items_per_page, $flag_delete);

        $list_roles = $result['roles'];
        $total_pages = $result['total_pages'];

        $pathInfor = $_SERVER['PATH_INFO'];
        $scriptName = dirname($_SERVER['SCRIPT_FILENAME']);
        $pathJson = file_get_contents($scriptName . "\Views\admin\layouts\sideBar.json");
        $structured_data = json_decode($pathJson, true);

        $data = $structured_data;

        $checkAccess = Util::checkAccess();
        include('Modules/' . $path . '/Views/role/listRole.php');
    }

    public
    function createRole()
    {
        $getAllLinhVuc = Role::getAllLinhVuc();
        $folderName = basename(dirname(__DIR__));
        $path = \Utils\Util::exportPath($folderName);
        include('Modules/' . $path . '/Views/role/create.php');
    }

    public
    function addRole()
    {
        try {
            Role::createRole();
            $this->listRole();
        } catch (PDOException $e) {
            echo "Have error" . $e->getMessage();
        }
    }

    public
    function editRole()
    {
        $getAllLinhVuc = Role::getAllLinhVuc();
        $id = filter_input(INPUT_GET, 'role_id');

        $a = Role::getButtonRole($id);
        $explodedArray = explode(',', $a ?? '');
        $_SESSION['role_id'] = $id;
        $values = Role::getValuesByID($id);

        $folderName = basename(dirname(__DIR__));
        $path = \Utils\Util::exportPath($folderName);
        include('Modules/'.$path.'/Views/role/edit.php');
    }

    public
    function updateRole()
    {
        $id = $_SESSION['role_id'];
        /*$checkAccess = Util::checkAccess();
        if (isset($checkAccess)) {*/
        Role::editRole($id);
        $this->listRole();
        /*} else {
            $this->error();
        }*/
    }

    public
    function softDeleteRole()
    {

        $role_id = filter_input(INPUT_GET, 'role_id');
        Role::softDeleteRole($role_id);
        $this->listRole();

    }

}