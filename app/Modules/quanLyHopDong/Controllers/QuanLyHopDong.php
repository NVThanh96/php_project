<?php

use Utils\Util;

class QuanLyHopDong
{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'login';
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
            include('Modules/' . $path . '/Views/create.php');
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
        // Create an instance of the SomeFunctionDB class
        $createHopDong = new HopDongDB();

        // Handle the file upload and get the message
        $createHopDong->createHopDong();

        header('location:list' );
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
            include('Modules/' . $path . '/Views/edit.php');
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
        $path = \Utils\Util::exportPath($folderName);

        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // số lượng giá trị sẽ hiển thị trong 1 bảng
        $items_per_page = 6;
        $daxoa = 0;
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $searchPB = isset($_GET['search_phong_ban']) ? $_GET['search_phong_ban'] : '';
        $searchTT = isset($_GET['search_trang_thai']) ? $_GET['search_trang_thai'] : '';
        $searchOption = isset($_GET['thoi_gian_ket_thuc']) ? $_GET['thoi_gian_ket_thuc'] : '';

        $searchStart = isset($_GET['thoi_gian_thuc_hien']) ? $_GET['thoi_gian_thuc_hien'] : '';
        $searchEnd = isset($_GET['thoi_gian_ket_thuc']) ? $_GET['thoi_gian_ket_thuc'] : '';
        $searchOption = isset($_GET['option']) ? $_GET['option'] : '';

        $result = HopDongDB::get_hop_dong_page($page_number, $items_per_page, $daxoa, $search, $searchPB, $searchTT, $searchStart, $searchEnd, $searchOption);

        $list_hop_dong = $result['hopDong'] ?? '';
        $total_pages = $result['total_pages'] ?? '';
        $pathInfor = $_SERVER['PATH_INFO'];
        $scriptName = dirname($_SERVER['SCRIPT_FILENAME']);
        $pathJson = file_get_contents($scriptName . "\Views\admin\layouts\sideBar.json");
        $structured_data = json_decode($pathJson, true);

        $data = $structured_data;
        if (!empty($_SESSION['email'])) {
            include('Modules/' . $path . '/Views/list.php');
        } else {
            $this->error();
        }
    }


    public function softDeleteHopDong()
    {
        $id = filter_input(INPUT_GET, 'id');
        HopDongDB::softDeleteHopDong($id);
        $this->index();
    }

}