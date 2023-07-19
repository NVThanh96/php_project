<?php


class quanLyNhanVien
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
                $this->softDeleteNhanVien();
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
            include('Modules/quanLyNhanVien/Views/create.php');
        } else {
            $this->error();
        }
    }

    public function add()
    {
        NhanVienDB::createNhanVien();
        $this->index();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id');
        $_SESSION['id'] = $id;
        $values = NhanVienDB::getValuesByID($id);
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);
        if (!empty($_SESSION['email'])) {

            include('Modules/quanLyNhanVien/Views/edit.php');
        } else {
            $this->error();
        }
    }

    public function update()
    {
        $id = $_SESSION['id'];
        NhanVienDB::editNhanVien($id);
        $this->index();
    }

    public function index()
    {
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // số lượng giá trị sẽ hiện thị trong 1 bảng
        $items_per_page = 6;
        $flag_delete = 0;

        $result = NhanVienDB::getNhanVienPage($page_number, $items_per_page, $flag_delete);

        $list_nhan_vien = $result['nhanVien'];
        $total_pages = $result['total_pages'];
        include('Modules/quanLyNhanVien/Views/list.php');
    }

    public function softDeleteNhanVien()
    {
        $id = filter_input(INPUT_GET, 'id');
        NhanVienDB::softDeleteNhanVien($id);
        $this->index();
    }

}