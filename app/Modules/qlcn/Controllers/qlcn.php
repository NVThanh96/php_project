<?php

use models\qlcnDB;
use Utils\Util;
class Qlcn
{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? '';
        switch ($action) {
            case 'list':
                $this->list();
                break;
            case 'create':
                $this->create();
                break;
            case 'add':
                $this->add();
                break;
            case 'edit':
                $this->edit();
                break;
            case 'update':
                $this->update();
                break;
            case 'deleteSoft':
                $this->softDeleteNhanVien();
                break;
            default:
                break;
        }

    }

    public function list()
    {
        $this->index();
    }

    public function create()
    {
        $folderName = basename(dirname(__DIR__));
        $path = Util::exportPath($folderName);
        include('Modules/' . $path . '/Views/create.php');
    }

    public function add()
    {
        qlcnDB::createNhanVien();
        $this->index();

    }

    public function edit()
    {
        $folderName = basename(dirname(__DIR__));
        $path = \Utils\Util::exportPath($folderName);

        $id = filter_input(INPUT_GET, 'id');
        $_SESSION['id'] = $id;
        $values = qlcnDB::getValuesByID($id);
        include('Modules/' . $path . '/Views/edit.php');
    }

    public function update()
    {
        $id = $_SESSION['id'];
        qlcnDB::editNhanVien($id);
        $this->index();
    }

    public function index()
    {
        $folderName = basename(dirname(__DIR__));
        $path = \Utils\Util::exportPath($folderName);

        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // số lượng giá trị sẽ hiện thị trong 1 bảng
        $items_per_page = 6;
        $flag_delete = 0;

        $result = qlcnDB::getNhanVienPage($page_number, $items_per_page, $flag_delete);

        $list_nhan_vien = $result['nhanVien'];
        $total_pages = $result['total_pages'];
        include('Modules/' . $path . '/Views/list.php');
    }

    public function softDeleteNhanVien()
    {
        $id = filter_input(INPUT_GET, 'id');
        qlcnDB::softDeleteNhanVien($id);
        $this->index();
    }

    public function error()
    {
        include "Views/errors/404.php";
    }
}