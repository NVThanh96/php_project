<?php

class HopDongDB
{

    public static function searchDate($db, $offset, $items_per_page, $searchStart, $searchEnd, $searchOption)
    {

        $searchStart = DateTime::createFromFormat('d/m/Y', $searchStart)->format('Y-m-d');
        $searchEnd = DateTime::createFromFormat('d/m/Y', $searchEnd)->format('Y-m-d');
        $query = "SELECT * 
          FROM hop_dong
          WHERE daxoa = 0 
            AND $searchOption BETWEEN :searchStart AND :searchEnd
          ORDER BY so_hop_dong ASC LIMIT :limit OFFSET :offset";

        $stmt = $db->prepare($query);

        // Bind parameters
        $stmt->bindParam(':searchStart', $searchStart);
        $stmt->bindParam(':searchEnd', $searchEnd);
        $stmt->bindParam(':limit', $items_per_page, \PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Fetch the results
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        // Return the results
        return $results;
    }

    public static function get_hop_dong_page($page_number, $items_per_page, $daxoa, $search, $searchPB, $searchTT, $searchStart, $searchEnd, $searchOption)
    {
        try {
            $db = \Connection::getDB();
            // Calculate the offset based on the page number and items per page
            $offset = ($page_number - 1) * $items_per_page;

            $hopDong = [];
            $total_hop_dong = 0;

            if (!empty($searchStart) && !empty($searchEnd)) {
                if (empty($searchOption)) {
                    throw new \InvalidArgumentException('Vui lòng chọn option trước khi thực hiện');
                } else {
                    $hopDong = self::searchDate($db, $offset, $items_per_page, $searchStart, $searchEnd, $searchOption);
                    $total_hop_dong = self::getTotalHopDongWithSearch($db, $search, $searchPB, $searchTT);
                }
            } elseif (empty($search) && empty($searchPB) && empty($searchTT)) {
                $hopDong = self::getHopDongData($db, $offset, $items_per_page);
                $total_hop_dong = self::getTotalHopDong($db);
            } elseif (empty($search) || empty($searchPB) || empty($searchTT)) {
                $hopDong = self::getHopDongDataWithSearch($db, $offset, $items_per_page, $search, $searchPB, $searchTT);
                $total_hop_dong = self::getTotalHopDongWithSearch($db, $search, $searchPB, $searchTT);
            } else {
                $hopDong = self::getHopDongDataWithSearchMultiple($db, $offset, $items_per_page, $search, $searchPB, $searchTT);
                $total_hop_dong = self::getTotalHopDongWithSearch($db, $search, $searchPB, $searchTT);
            }

            // Calculate the total number of pages based on the number of hop_dong and items per page
            $total_pages = ceil($total_hop_dong / $items_per_page);

            return [
                'hopDong' => $hopDong,
                'total_pages' => $total_pages,
                'daxoa' => $daxoa
            ];
        } catch (\PDOException $e) {
            throw new \PDOException("Database Error: " . $e->getMessage(), (int)$e->getCode(), $e);
        }
    }

    public static function getHopDongData($db, $offset, $items_per_page)
    {
        $query = "SELECT hop_dong.* 
              FROM hop_dong 
              WHERE hop_dong.daxoa = 0
              ORDER BY hop_dong.so_hop_dong ASC LIMIT :limit OFFSET :offset";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':limit', $items_per_page, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    private static function getTotalHopDong($db)
    {
        $query = "SELECT COUNT(*) FROM hop_dong WHERE hop_dong.daxoa = 0";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    private static function getHopDongDataWithSearch($db, $offset, $items_per_page, $search, $searchPB, $searchTT)
    {
        $query = "SELECT hop_dong.* 
          FROM hop_dong
          LEFT JOIN phong_ban ON hop_dong.id_phong_ban = phong_ban.id
          WHERE hop_dong.daxoa = 0 
              AND (so_hop_dong = :so_hop_dong OR ten_hop_dong = :ten_hop_dong OR id_phong_ban = :id_phong_ban OR trang_thai = :trang_thai)
          ORDER BY hop_dong.so_hop_dong ASC LIMIT :limit OFFSET :offset";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':so_hop_dong', $search);
        $stmt->bindValue(':ten_hop_dong', $search);
        $stmt->bindValue(':id_phong_ban', $searchPB);
        $stmt->bindValue(':trang_thai', $searchTT);
        $stmt->bindValue(':limit', $items_per_page, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    private static function getHopDongDataWithSearchMultiple($db, $offset, $items_per_page, $search, $searchPB, $searchTT)
    {
        $query = "SELECT hop_dong.* 
              FROM hop_dong
              LEFT JOIN phong_ban ON hop_dong.id_phong_ban = phong_ban.id
              WHERE hop_dong.daxoa = 0 
                         AND ((so_hop_dong = :so_hop_dong OR ten_hop_dong = :ten_hop_dong) AND id_phong_ban = :id_phong_ban AND trang_thai = :trang_thai) 
                         OR (so_hop_dong = :so_hop_dong OR ten_hop_dong = :ten_hop_dong) AND id_phong_ban = :id_phong_ban  
                         OR (so_hop_dong = :so_hop_dong OR ten_hop_dong = :ten_hop_dong) AND trang_thai = :trang_thai
              ORDER BY hop_dong.so_hop_dong ASC LIMIT :limit OFFSET :offset";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':so_hop_dong', $search);
        $stmt->bindValue(':ten_hop_dong', $search);
        $stmt->bindValue(':id_phong_ban', $searchPB);
        $stmt->bindValue(':trang_thai', $searchTT);
        $stmt->bindValue(':limit', $items_per_page, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    private static function getTotalHopDongWithSearch($db, $search, $searchPB, $searchTT)
    {
        $query = "SELECT COUNT(*) 
          FROM hop_dong
          WHERE hop_dong.daxoa = 0 AND (so_hop_dong = :so_hop_dong OR ten_hop_dong = :ten_hop_dong OR id_phong_ban = :id_phong_ban OR trang_thai = :trang_thai)";

        $stmt = $db->prepare($query);
        $stmt->bindValue(':so_hop_dong', $search);
        $stmt->bindValue(':ten_hop_dong', $search);
        $stmt->bindValue(':id_phong_ban', $searchPB);
        $stmt->bindValue(':trang_thai', $searchTT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public static function insertHopDong($db, $ten_hop_dong, $so_hop_dong, $ngay_ky, $id_phong_ban, $khach_hang, $kinh_phi, $thoi_gian_thuc_hien, $ngay_ket_thuc, $trang_thai)
    {
        try {
            $query = "INSERT INTO hop_dong (`ten_hop_dong`,`so_hop_dong`, `ngay_ky`, `id_phong_ban`,`khach_hang`, 
            `kinh_phi`, `thoi_gian_thuc_hien`,`ngay_ket_thuc`,`trang_thai`,`daxoa`)";
            $query .= "VALUES (:ten_hop_dong, :so_hop_dong, :ngay_ky, :id_phong_ban, :khach_hang, 
            :kinh_phi, :thoi_gian_thuc_hien,:ngay_ket_thuc, :trang_thai, 0) ";
            $statement = $db->prepare($query);

            if (!empty($ngay_ky) && !empty($ngay_ket_thuc)) {
                $formatNgayKy = DateTime::createFromFormat('d/m/Y', $ngay_ky)->format('Y-m-d');
                $formatNgayKetThuc = DateTime::createFromFormat('d/m/Y', $ngay_ket_thuc)->format('Y-m-d');
                $statement->bindParam(':ngay_ky', $formatNgayKy);
                $statement->bindParam(':ngay_ket_thuc', $formatNgayKetThuc);
            }
            $statement->bindParam(':ten_hop_dong', $ten_hop_dong);
            $statement->bindParam(':so_hop_dong', $so_hop_dong);
            $statement->bindParam(':id_phong_ban', $id_phong_ban);
            $statement->bindParam(':khach_hang', $khach_hang);
            $statement->bindParam(':kinh_phi', $kinh_phi);
            $statement->bindParam(':thoi_gian_thuc_hien', $thoi_gian_thuc_hien);
            $statement->bindParam(':trang_thai', $trang_thai);

            $statement->execute();

            $id_hop_dong = $db->lastInsertId(); // Get the last inserted ID

            return $id_hop_dong;

        } catch (\PDOException $e) {
            // Log the error or handle it appropriately
            echo "Database Error: " . $e->getMessage();
        }
    }

    public static function insertFile($db, $ten, $duong_dan, $id_hop_dong)
    {
        date_default_timezone_set('Asia/Bangkok');
        $timeInMillis = Strtotime('now');
        $gio = date('H:i:s', $timeInMillis);

        try {
            $query = "INSERT INTO file (`ten`, `duong_dan`, `id_hop_dong`, `daxoa`, `gio`) 
            VALUES (:ten, :duong_dan, :id_hop_dong, 0,:gio)";
            $statement = $db->prepare($query);

            $statement->bindParam(':ten', $ten);
            $statement->bindParam(':duong_dan', $duong_dan);
            $statement->bindParam(':id_hop_dong', $id_hop_dong);
            $statement->bindParam(':gio', $gio);

            $statement->execute();

            // Handle success or any additional logic

        } catch (\PDOException $e) {
            // Log the error or handle it appropriately
            echo "Database Error: " . $e->getMessage();
        }
    }

    private static function insertThanhToan($db, $noi_dung_thanh_toan, $thoi_gian, $gia_tri_thanh_toan, $id_hop_dong)
    {
        date_default_timezone_set('Asia/Bangkok');
        $timeInMillis = Strtotime('now');
        $gio = date('H:i:s', $timeInMillis); // Get the current time

        $query = "INSERT INTO thanh_toan (noi_dung_thanh_toan, thoi_gian, gia_tri_thanh_toan, id_hop_dong, daxoa, gio) 
              VALUES (:noi_dung_thanh_toan, :thoi_gian, :gia_tri_thanh_toan, :id_hop_dong, 0, :gio)";
        $statement = $db->prepare($query);

        if (!empty($thoi_gian)) {
            $format_thoi_gian = DateTime::createFromFormat('d/m/Y', $thoi_gian)->format('Y-m-d');
            $statement->bindParam(':thoi_gian', $format_thoi_gian);
        }
        $statement->bindParam(':noi_dung_thanh_toan', $noi_dung_thanh_toan);
        $statement->bindParam(':gia_tri_thanh_toan', $gia_tri_thanh_toan);
        $statement->bindParam(':id_hop_dong', $id_hop_dong);
        $statement->bindParam(':gio', $gio);

        $statement->execute();

        return $db->lastInsertId();
    }



    public function createHopDong()
    {
        try {
            $db = \Connection::getDB();

            // Assuming you have retrieved the values from user input and stored them in variables
            $ten_hop_dong = $_POST['ten_hop_dong'];
            $so_hop_dong = $_POST['so_hop_dong'];
            $ngay_ky = $_POST['ngay_ky'];
            $id_phong_ban = $_POST['id_phong_ban'];
            $khach_hang = $_POST['khach_hang'];
            $kinh_phi = $_POST['kinh_phi'];
            $thoi_gian_thuc_hien = $_POST['thoi_gian_thuc_hien'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $trang_thai = $_POST['trang_thai'];

            // Insert hop_dong
            $id_hop_dong = self::insertHopDong($db, $ten_hop_dong, $so_hop_dong, $ngay_ky, $id_phong_ban, $khach_hang, $kinh_phi, $thoi_gian_thuc_hien, $ngay_ket_thuc, $trang_thai);

            // Assuming you have retrieved the files and stored them in an array
            $files = $_FILES['file'];

            // Insert files
            foreach ($files['name'] as $key => $name) {
                $file_temp = $files['tmp_name'][$key];
                $file_path = "C:\wamp64\www\JobDnict\php_project\app\Modules\quanLyHopDong\Public\saveFile"; // Adjust this path to your desired location
                $file_name = $name;
                $file_destination = $file_path .'\\'. $file_name;

                // Move the file to the destination
                move_uploaded_file($file_temp, $file_destination);
                $formatFilePath = str_replace('C:\wamp64\www','',$file_path) .'\\'. $file_name;
                // Insert file information into the 'file' table
                self::insertFile($db, $file_name, $formatFilePath, $id_hop_dong);
            }


            // Assuming you have retrieved the payment information and stored them in arrays
            $noi_dung_thanh_toan = $_POST['noi_dung_thanh_toan'];
            $thoi_gian_thanh_toan = $_POST['thoi_gian_thanh_toan'];
            $gia_tri_thanh_toan = $_POST['gia_tri_thanh_toan'];

            // Insert payment information into the 'thanh_toan' table
            for ($i = 0; $i < count($thoi_gian_thanh_toan); $i++) {
                self::insertThanhToan($db, $noi_dung_thanh_toan[$i], $thoi_gian_thanh_toan[$i], $gia_tri_thanh_toan[$i], $id_hop_dong);
            }

        } catch (\PDOException $e) {
            // Log the error or handle it appropriately
            echo "Database Error: " . $e->getMessage();
        }
    }

    public static function editHopDong($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE hop_dong SET 
                    `ten_hop_dong` = :ten_hop_dong, 
                    `so_hop_dong` = :so_hop_dong, 
                    `ngay_ky` = :ngay_ky,
                    `khach_hang` = :khach_hang, 
                    `kinh_phi` = :kinh_phi, 
                    `thoi_gian_thuc_hien` = :thoi_gian_thuc_hien,
                    `ngay_ket_thuc` = :ngay_ket_thuc,
                    `trang_thai` = :trang_thai,
                    `id_phong_ban` = :id_phong_ban 
                    WHERE `id` = " . $id;
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $ten_hop_dong = $_POST['ten_hop_dong'];
            $so_hop_dong = $_POST['so_hop_dong'];
            $ngay_ky = $_POST['ngay_ky'];
            $khach_hang = $_POST['khach_hang'];
            $kinh_phi = $_POST['kinh_phi'];
            $thoi_gian_thuc_hien = $_POST['thoi_gian_thuc_hien'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $trang_thai = $_POST['trang_thai'];
            $id_phong_ban = $_POST['id_phong_ban'];

            if (!empty($ngay_ky) && !empty($ngay_ket_thuc)) {
                $formatNgayKy = DateTime::createFromFormat('d/m/Y', $ngay_ky)->format('Y-m-d');
                $formatNgayKetThuc = DateTime::createFromFormat('d/m/Y', $ngay_ket_thuc)->format('Y-m-d');
                $statement->bindParam(':ngay_ky', $formatNgayKy);
                $statement->bindParam(':ngay_ket_thuc', $formatNgayKetThuc);
            }

            // Bind the values to the prepared statement placeholders
            $statement->bindParam(':ten_hop_dong', $ten_hop_dong);
            $statement->bindParam(':so_hop_dong', $so_hop_dong);
            $statement->bindParam(':khach_hang', $khach_hang);
            $statement->bindParam(':kinh_phi', $kinh_phi);
            $statement->bindParam(':thoi_gian_thuc_hien', $thoi_gian_thuc_hien);
            $statement->bindParam(':trang_thai', $trang_thai);
            $statement->bindParam(':id_phong_ban', $id_phong_ban);

            // Execute the prepared statement
            $statement->execute();
            // cập nhật file trong sql
            $sexoaValue = $_POST['seXoaFile'];
            $arr = explode(',', $sexoaValue);
            if (!empty($arr)) {
                $db = \Connection::getDB();
                $query = "UPDATE file SET `daxoa` = 1 WHERE `id` IN (";

                $params = array();
                foreach ($arr as $index => $fileId) {
                    $paramName = ":id{$index}";
                    $query .= $paramName . ",";
                    $params[$paramName] = $fileId;
                }

                $query = rtrim($query, ",") . ")";
                $statement = $db->prepare($query);
                $statement->execute($params);
            }


            $files = $_FILES['file'];

            // Insert files vào folder savefile
            if (isset($files)){
                foreach ($files['name'] as $key => $name) {
                    $file_temp = $files['tmp_name'][$key];
                    $file_path = "C:\wamp64\www\JobDnict\php_project\app\Modules\quanLyHopDong\Public\saveFile"; // Adjust this path to your desired location
                    $file_name = $name;
                    $file_destination = $file_path .'\\'. $file_name;

                    if(!empty($file_name) && !empty($file_destination)){
                        // Move the file to the destination
                        move_uploaded_file($file_temp, $file_destination);
                        $formatFilePath = str_replace('C:\wamp64\www','',$file_path) .'\\'. $file_name;
                        // Insert file information into the 'file' table
                        self::insertFile($db, $file_name, $formatFilePath, $id);
                    }
                }
            }
            // Update daxoa column in thanh_toan table
            $query = "UPDATE thanh_toan SET daxoa = 1 WHERE id_hop_dong = :id_hop_dong";
            $statement = $db->prepare($query);
            $statement->bindParam(':id_hop_dong', $id);
            $statement->execute();

            // Assuming you have retrieved the payment information and stored them in arrays
            $thoi_gian_thanh_toan = $_POST['thoi_gian_thanh_toan'] ?? '';
            $noi_dung_thanh_toan = $_POST['noi_dung_thanh_toan']?? '';
            $gia_tri_thanh_toan = $_POST['gia_tri_thanh_toan']?? '';

            // Insert payment information into the 'thanh_toan' table
            if (!empty($thoi_gian_thanh_toan)){
                for ($i = 0; $i < count($thoi_gian_thanh_toan); $i++) {
                    self::insertThanhToan($db, $noi_dung_thanh_toan[$i], $thoi_gian_thanh_toan[$i], $gia_tri_thanh_toan[$i], $id);
                }
            }
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }


    public static function softDeleteHopDong($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE hop_dong SET `daxoa` = 1  WHERE Id=:id";
            $statement = $db->prepare($query);
            $statement->bindValue('id', $id);
            $statement->execute();
            $statement->closeCursor();
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function getValuesByID($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT * FROM hop_dong WHERE Id = :id"; // Modify this query as per your requirements

            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();

            $values = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $values;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();

        }
    }

    public static function getListPhongBan()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT id, ten_phong FROM phong_ban"; // Modify this query as per your requirements

            $statement = $db->prepare($query);
            $statement->execute();

            $values = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $values;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function getRecordFileById($id)
    {
        try {
            $records = [];
            $db = \Connection::getDB();
            $query = "SELECT * FROM file WHERE id_hop_dong = :id AND daxoa = 0"; // Modify the table name as per your database structure
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $records[] = $row;
            }
            return $records;

        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
            return null;
        }
    }

    public static function getRecordThanhToanById($id) {
        $db = \Connection::getDB();
        $query = "SELECT * FROM thanh_toan WHERE id_hop_dong = :id_hop_dong  AND daxoa = 0 ORDER BY id ASC";
        $statement = $db->prepare($query);
        $statement->bindParam(':id_hop_dong', $id);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
