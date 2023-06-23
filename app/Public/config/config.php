<?php

$totalHopDong = (new Utils\Util)->countHopDong();
$totalUser = (new Utils\Util)->countUser();
$totalNhanVien = (new Utils\Util)->countNhanVien();

// lấy file json rồi đọc file ra xử lý hiển thị trên view sideBar.php
$token = $_SESSION['token']??''; // lấy token của người dùng đăng nhập vào
$pathJson = LoginDB::getSideBar($token); // sử dụng token để đọc dữ liệu
$sideBar = json_decode($pathJson, true); // giải mã đoạn code json
$readFileJson = $sideBar['coreMenuDatas'] ?? '' ; // đọc dữ liệu chỉ lấy trong 'coreMenuDatas
$str = $_SERVER['PATH_INFO'] ?? ''; // lấy đường dẫn truy cập
$result = ltrim($str, '/');// xóa dấy '/' đầu tiên

$queue = $readFileJson;
while (!empty($queue)) {
    $node = array_shift($queue);
    if ($node['component'] === '/project_php/app/'.lcfirst($result)){
        return $node;
    }
    if (isset($node['children']) && is_array($node['children'])) {
            foreach ($node['children'] as $child) {
                $queue[] = $child;
        }
    }
}

// tiêu đề của mỗi trang
$titleAdd = 'Thêm ';
$titleUpdate = 'Cập nhật ';
$titleList = 'Danh sách ';

// con của quản lý hệ thông nên ko nhận theo $name đc
$titleListRole = 'Danh sách Chức Vụ';
$titleAddRole = 'Thêm Chức Vụ';
$titleUpdateRole = 'Cập nhật Chức Vụ';



