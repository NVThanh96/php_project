<?php
$Default = '/JobDnict/php_project/app';

$totalHopDong = (new Utils\Util)->countHopDong();
$totalUser = (new Utils\Util)->countUser();
$totalNhanVien = (new Utils\Util)->countNhanVien();

// lấy file json rồi đọc file ra xử lý hiển thị trên view sideBar.php
$token = $_SESSION['token']??''; // lấy token của người dùng đăng nhập vào
$pathJson = requestAPI::getSideBar($token); // sử dụng token để đọc dữ liệu
$sideBar = json_decode($pathJson, true); // giải mã đoạn code json
$readFileJson = $sideBar['coreMenuDatas'] ?? ''; // Read data from 'coreMenuDatas'
$str = $_SERVER['PATH_INFO'] ?? ''; // Get the accessed path
$result = ltrim($str, '/'); // Remove the leading '/'

$queue = is_array($readFileJson) ? $readFileJson : []; // Ensure $queue is an array
$URI = $_SERVER['REQUEST_URI'];

while (!empty($queue)) {
    $node = array_shift($queue);
    if ($node['component'] === $URI) {
        // Do something with the found node, e.g., store it in a variable
        $foundNode = $node;
        break; // Exit the loop if a matching node is found
    }

    if (isset($node['children']) && is_array($node['children'])) {
        // Add children nodes to the queue for further search
        foreach ($node['children'] as $child) {
            $queue[] = $child;
        }
    }
}

// If you need to find nodes based on the path of the URI (as seen in $result)
$URI1 = parse_url($_SERVER['REQUEST_URI'])['path'];
$queue1 = is_array($readFileJson) ? $readFileJson : []; // Ensure $queue1 is an array
while (!empty($queue1)) {
    $node1 = array_shift($queue1);

    if ($node1['activeMenu'] === $URI1) {
        // Do something with the found node, e.g., store it in a variable
        $foundNode1 = $node1;

        break; // Exit the loop if a matching node is found
    }
    if (isset($node1['children']) && is_array($node1['children'])) {
        // Add children nodes to the queue for further search
        foreach ($node1['children'] as $child1) {
            $queue1[] = $child1;
        }
    }
}

