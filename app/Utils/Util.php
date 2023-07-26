<?php

namespace Utils;

class Util
{
    /*count about HopDong*/
    public function countHopDong()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT COUNT(*) AS total FROM hop_dong WHERE `daxoa` = 0";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $count = $result['total'];
            $statement->closeCursor();
            return $count;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function countHopDongDangThucHien()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT COUNT(*) AS total FROM `hop_dong` WHERE `trang_thai` = '3'";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $count = $result['total'];
            $statement->closeCursor();
            return $count;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function countHopDongChuaThucHien()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT COUNT(*) AS total FROM `hop_dong` WHERE `trang_thai` = '2'";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $count = $result['total'];
            $statement->closeCursor();
            return $count;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function countHopDongHoanThanh()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT COUNT(*) AS total1 FROM `hop_dong` WHERE `trang_thai` = '1'";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $count = $result['total1'];
            $statement->closeCursor();
            return $count;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    /*end count Hop Dong*/


    public function countUser()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT COUNT(*) AS total FROM users WHERE `level` != 'admin'";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $count = $result['total'];
            $statement->closeCursor();
            return $count;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function countUserAdmin()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT COUNT(*) AS total FROM users WHERE `level` = 'admin'";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $count = $result['total'];
            $statement->closeCursor();
            return $count;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function countUserManager()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT COUNT(*) AS total FROM users WHERE `level` = 'manager'";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $count = $result['total'];
            $statement->closeCursor();
            return $count;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function countUsers()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT COUNT(*) AS total FROM users WHERE `level` = 'user'";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $count = $result['total'];
            $statement->closeCursor();
            return $count;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }


    public function countNhanVien()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT COUNT(*) AS total FROM nhan_vien WHERE `flag_delete` = 1";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $count = $result['total'];
            $statement->closeCursor();
            return $count;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }


    /*
    kiểm tra đường dẫn auto đọc file
    EX: var_dump($pathINFO) == '/admin/quanLyNhanVien/list'
    mục đích là lấy đường dẫn quanLyNhanVien || quanLyHopDong
    ở trong file modules
    */
    public static function exportPath($foldername = '')
    {
        if (isset($_SERVER['PATH_INFO'])) {
            $pathINFO = $_SERVER['PATH_INFO'];
        } else {
            $pathINFO = '';
        }
        $explode = explode('/', $pathINFO);

        /*var_dump($explode);*/
        $search = array_search($foldername, $explode);

        if ($search == true) {
            if (isset($explode[$search])) {
                $path = $explode[$search];
            }
        } else {
            $path = '';
        }
        return $path;
    }

    // cách này giống ở trên nhưng phải khái báo vào $validPaths
    /*public static function exportPath()
    {
        $path = '';

        // Get the current page URL
        $currentPageUrl = $_SERVER['REQUEST_URI'];

        // Define an array of valid module paths
        $validPaths = ['quanLyNhanVien', 'quanLyHopDong', 'quanLyHeThong'];

        // Iterate through valid paths and find the matching one in the current URL
        foreach ($validPaths as $validPath) {
            if (strpos($currentPageUrl, $validPath) !== false) {
                $path = $validPath;
                break;
            }
        }

        return $path;
    }*/


    //là chức năng nếu sai đường dẫn thì trả về
    public static function abort()
    {
        require self::getDirectoryPath(__FILE__,2) . '/Views/errors/404.php';
        die();
    }

    public static function error()
    {
        echo "<h1>404</h1>";
        echo "<p>Bạn không có quyền truy cập vào</p>";
    }

    /*public static function getButton()
    {
        $getButtonLevel = \models\Role::getButtonRole($_SESSION['level']);
        return explode(',', $getButtonLevel);
    }

    public static function checkAdd()
    {
        $value = self::getButton();
        if ($value) {
            return in_array(1, $value) || in_array(0, $value);
        } else {
            return false;
        }
    }

    public static function checkEdit()
    {
        $value = self::getButton();
        if ($value) {
            return in_array(2, $value) || in_array(0, $value);
        } else {
            return false;
        }
    }

    public static function checkDelete()
    {
        $value = self::getButton();
        if ($value) {
            return in_array(3, $value) || in_array(0, $value);
        } else {
            return false;
        }
    }

    public static function checkShow()
    {
        $value = self::getButton();
        if ($value) {
            return in_array(4, $value) || in_array(0, $value);
        } else {
            return false;
        }
    }*/

    /*public static function checkRole()
    {
        $pathJson = file_get_contents("C:\wamp64\www\project_php\app\Views\admin\layouts\sideBar.json");
        $sideBar = json_decode($pathJson, true);
        $readFileJson = \Utils\Util::getSideBar($sideBar['sideBar']);
        foreach ($readFileJson[0]['children'] as $child) {
            foreach ($child['children'] as $child1){
                var_dump($child1);
                if ($child1['role'] === Role::getRoleName($_SESSION['level'])) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }*/

    /*
        public static function find_match($data, $path) {
            foreach ($data as $item) {
                $a = $item[0]['children'];
                $count = Count($a);
                $explodePath = explode('/',$path);
                for ($i=0;$i<$count;$i++){
                    if($a[$i]['name'] == $explodePath[2]){
                        if ($a[$i]['role'] == Role::getRoleName($_SESSION['level'])){
                            return true;
                        }
                    }
                }
            }
            return null;
        }*/

    public static function checkAccess()
    {
        // lấy file json rồi đọc file ra xử lý hiển thị trên view sideBar.php
        $token = $_SESSION['token']; // lấy token của người dùng đăng nhập vào
        $pathJson = \LoginDB::getSideBar($token); // sử dụng token để đọc dữ liệu
        $sideBar = json_decode($pathJson, true); // giải mã đoạn code json
        $readFileJson = isset($sideBar['coreMenuDatas']) ? $sideBar['coreMenuDatas'] : ''; // đọc dữ liệu chỉ lấy trong 'coreMenuDatas
        $str = $_SERVER['PATH_INFO']; // lấy đường dẫn truy cập
        $result = ltrim($str, '/');// xóa dấy '/' đầu tiên
        $queue = $readFileJson;
        while (!empty($queue)) {
            $node = array_shift($queue);
            //so sánh đường dẫn có tồn tại trong danh sách truy cập không
            if ($node['component'] === strtolower($result)) {
                return $node;
            }
            if (isset($node['children']) && is_array($node['children'])) {
                foreach ($node['children'] as $child) {
                    $queue[] = $child;
                }
            }
        }
    }

    public static function getDirectoryPath($value, $levels)
    {
        $directory = $value;
        for ($i = 0; $i < $levels; $i++) {
            $directory = dirname($directory);
        }
        return $directory;
    }


    public static function getFileConfig()
    {

        $directoryConfig = self::getDirectoryPath(__FILE__, 2) . '/Modules/*/config.json';
        $moduleFilesConfig = glob($directoryConfig, GLOB_NOSORT | GLOB_BRACE);
        $arr = [];
        $getLogin = [];

        // [ {pathj: "", controller = ""} , {pathj: "", controller = ""} ]
        foreach ($moduleFilesConfig as $value) {
            $json = file_get_contents($value);
            $json_data = json_decode($json, true);
            if (!isset($json_data['children'])) {
                foreach ($json_data as $item) {
                    // dùng để lấy path và 1 ố controller của web
                    $someFunction = ["path" => $item['path'], "controller" => $item['controller']];
                    array_push($getLogin, $someFunction);
                }
            }else {
                if (isset($json_data['children']) ){
                    foreach ($json_data['children'] as $item)
                    if (isset($item['meta']['component'])) {
                        $c = ["path" => $item['component'], "controller" => $item['meta']['component']];
                        array_push($arr, $c);
                    }
                }
                $a = ["path" => $json_data['path'], "controller" => ""];
                array_push($arr, $a);
            }
        }
        $arr = array_merge($arr, $getLogin);

        return $arr;
    }
}
