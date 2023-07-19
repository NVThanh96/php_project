<?php

class QuanLyPhongBan
{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'login';
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
                $this->softDelete();
                break;
            default:
                break;
        }
    }


    public function list()
    {
        if (!empty($_SESSION['email'])) {
            $this->index();
        } else {
            $this->error();
        }
    }

    public function error()
    {
        echo '<h1>404</h1>';
        echo '<p>Bạn không được quyền truy cập vào trang này.</p>';
    }


    public function create()
    {
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);
        if (!empty($_SESSION['email'])) {
            include('Modules/quanLyPhongBan/Views/create.php');
        } else {
            $this->error();
        }
    }

    public function add()
    {
        PhongBanDB::createPhongBan();
        $this->index();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id');
        $_SESSION['id'] = $id;
        $values = PhongBanDB::getValuesByID($id);
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);
        if (!empty($_SESSION['email'])) {
            include('Modules/quanLyPhongBan/Views/edit.php');
        } else {
            $this->error();
        }
    }

    public
    function update()
    {
        $id = $_SESSION['id'];
        PhongBanDB::editPhongBan($id);
        $this->index();
    }

    public
    function index()
    {
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // số lượng giá trị sẽ hiện thị trong 1 bảng
        $items_per_page = 6;
        $da_xoa = 0;

        $result = PhongBanDB::getPhongBanPage($page_number, $items_per_page, $da_xoa);

        $list_phong_ban = $result['phongBan'];
        $total_pages = $result['total_pages'];
        include('Modules/quanLyPhongBan/Views/list.php');
    }

    public
    function softDelete()
    {
        $id = filter_input(INPUT_GET, 'id');
        PhongBanDB::softDelete($id);
        $this->index();
    }

}