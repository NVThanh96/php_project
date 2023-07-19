<?php
$Default = '/JobDnict/php_project/app';

$totalHopDong = (new Utils\Util)->countHopDong();
$totalUser = (new Utils\Util)->countUser();
$totalNhanVien = (new Utils\Util)->countNhanVien();

// lấy file json rồi đọc file ra xử lý hiển thị trên view sideBar.php
$token = $_SESSION['token']??''; // lấy token của người dùng đăng nhập vào
$pathJson = requestAPI::getSideBar($token); // sử dụng token để đọc dữ liệu
$sideBar = json_decode($pathJson, true); // giải mã đoạn code json
$readFileJson = $sideBar['coreMenuDatas'] ?? '' ; // đọc dữ liệu chỉ lấy trong 'coreMenuDatas
$str = $_SERVER['PATH_INFO'] ?? ''; // lấy đường dẫn truy cập
$result = $str;// xóa dấy '/' đầu tiên

$queue = $readFileJson;
$URI = $_SERVER['REQUEST_URI'];
while (!empty($queue)) {
    $node = array_shift($queue);
    if ($node['component'] === $URI){
        return $node;
    }
    if (isset($node['children']) && is_array($node['children'])) {
            foreach ($node['children'] as $child) {
                $queue[] = $child;
        }
    }
}



$URI = parse_url( $_SERVER['REQUEST_URI'])['path'];
while (!empty($queue)) {
    $node1 = array_shift($queue);
    if ($node1['component'] === $URI){
        return $node1;
    }

}

