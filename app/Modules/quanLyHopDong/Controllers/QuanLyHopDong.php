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
        $this->index();
    }

    public function create()
    {
        $list_linh_vuc = HopDongDB::getListLinhVuc(); // Replace `getListLinhVuc()` with your actual method to fetch the list
        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);
        $checkAccess = Util::checkAccess();
            include('Modules/' . $path . '/Views/create.php');

    }
    public function error()
    {
        include('Views/errors/404.php');
    }


    public function add()
    {
        HopDongDB::createHopDong();
        $this->index();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id');
        $_SESSION['id'] = $id;

        $record = HopDongDB::getRecordById($id);

        // Get the selected "Lĩnh Vực" ID from the fetched record
        $selected_linh_vuc_id = is_array($record) ? $record['id'] : null;

        // Get the list of "Lĩnh Vực" to populate the dropdown
        $list_linh_vuc = HopDongDB::getListLinhVuc();

        $folderPath = __DIR__;
        $folderName = basename(dirname($folderPath));
        $path = \Utils\Util::exportPath($folderName);
        $values = HopDongDB::getValuesByID($id);
        $checkAccess = Util::checkAccess();
            include('Modules/' . $path . '/Views/edit.php');
    }

    public function update()
    {
        $id = $_SESSION['id'];
        HopDongDB::editHopDong($id);
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

        $result = HopDongDB::get_hop_dong_page($page_number, $items_per_page, $flag_delete);

        $list_hop_dong = $result['hopDong'];
        $total_pages = $result['total_pages'];
        $pathInfor = $_SERVER['PATH_INFO'];
        $scriptName = dirname($_SERVER['SCRIPT_FILENAME']);
        $pathJson = file_get_contents($scriptName . "\Views\admin\layouts\sideBar.json");
        $structured_data = json_decode($pathJson, true);

        $data = $structured_data;
        include('Modules/' . $path . '/Views/list.php');
    }

    public function softDeleteHopDong()
    {
        $id = filter_input(INPUT_GET, 'id');
        HopDongDB::softDeleteHopDong($id);
        $this->index();
    }


}