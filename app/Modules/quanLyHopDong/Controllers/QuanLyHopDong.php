<?php

use Utils\Util;

class QuanLyHopDong
{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? '';
        switch ($action) {
            case 'show':
                $this->show();
                break;
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
            case 'search':
                $this->search();
                break;
            case 'deleteSoft':
                $this->softDeleteHopDong();
                break;
            default:
                break;
        }

    }

    public function show()
    {
        $totalHopDong = (new Util)->countHopDong();
        $totalUser = (new Util)->countUser();
        $totalNhanVien = (new Util)->countNhanVien();
        include('Views/admin/index.php');
    }

    public function list()
    {
        if (!empty($_SESSION['email'])) {
            $this->index();
        } else {
            $this->error();
        }
    }

    public function create()
    {
        $list_phong_ban = HopDongDB::getListPhongBan(); // Replace `getListLinhVuc()` with your actual method to fetch the list
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);
        if (!empty($_SESSION['email'])) {
            include('Modules/quanLyHopDong/Views/create.php');
        } else {
            $this->error();
        }
    }

    public function error()
    {
        include('Views/errors/404.php');
    }


    public function add()
    {
        HopDongDB::createHopDong();
        header('location:list');
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id');
        $_SESSION['id'] = $id;

        $list_hop_dong = HopDongDB::getValuesByID($id);
        $list_phong_ban = HopDongDB::getListPhongBan();
        $fileIDHD = HopDongDB::getRecordFileById($id);
        $totalThanhToan = HopDongDB::getRecordThanhToanById($id);

        $fileThanhToanJson = json_encode($totalThanhToan);
        $fileIDHDJson = json_encode($fileIDHD);

        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);
        if (!empty($_SESSION['email'])) {
            include('Modules/quanLyHopDong/Views/edit.php');
        } else {
            $this->error();
        }
    }

    public function update()
    {
        $id = $_SESSION['id'];
        HopDongDB::editHopDong($id);
        header('location: list');
    }

    public function index()
    {
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));

        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // số lượng giá trị sẽ hiển thị trong 1 bảng
        $items_per_page = 6;
        $daxoa = 0;

        $result = HopDongDB::get_hop_dong_page($page_number, $items_per_page, $daxoa);

        $total_pages = $result['total_pages'] ?? '';
        $list_hop_dong = $result['hopDong'] ?? '';
        $pathInfor = $_SERVER['PATH_INFO'] ?? '';
        $scriptName = dirname($_SERVER['SCRIPT_FILENAME']);
        if (!empty($_SESSION['email'])) {
            include('Modules/quanLyHopDong/Views/list.php');
        } else {
            $this->error();
        }
    }

    public function search()
    {
        HopDongDB::search();
    }

    public function softDeleteHopDong()
    {
        $id = filter_input(INPUT_GET, 'id');
        HopDongDB::softDeleteHopDong($id);
        $this->index();
    }

}