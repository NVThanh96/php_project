<?php

namespace models;
class HopDongDB
{

    //có thêm paginate cho table
    public static function get_hop_dong_page($page_number, $items_per_page, $flag_delete)
    {
        try {
            $db = \Connection::getDB();
            // Calculate the offset based on the page number and items per page
            $offset = ($page_number - 1) * $items_per_page;

            // Get the specified page of hop_dong, ordered by so_hop_dong
            $query = "SELECT hop_dong.*, linh_vuc.ten_linh_vuc 
                  FROM hop_dong
                  JOIN linh_vuc ON hop_dong.linh_vuc_id = linh_vuc.id
                  WHERE hop_dong.flag_delete = 1
                  ORDER BY hop_dong.so_hop_dong ASC LIMIT :limit OFFSET :offset";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':limit', $items_per_page, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $hopDong = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            // Get the total number of hop_dong
            $query = "SELECT COUNT(*) FROM hop_dong WHERE hop_dong.flag_delete = 1";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $total_hop_dong = $stmt->fetchColumn();

            // Calculate the total number of pages based on the number of hop_dong and items per page
            $total_pages = ceil($total_hop_dong / $items_per_page);

            return array(
                'hopDong' => $hopDong,
                'total_pages' => $total_pages,
                'flag_delete' => $flag_delete
            );
        } catch (PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }


    public static function createHopDong()
    {
        try {
            $db = \Connection::getDB();
            $query = "INSERT INTO hop_dong (`ten_hop_dong`, `khach_hang`, `linh_vuc_id`, 
                      `so_hop_dong`, `ngay_ky`, `gia_tri`, `Thoi_gian_thuc_hien`,
                      `file_hop_dong`,`tinh_trang_hop_dong`,`flag_delete`)";
            $query .= "VALUES (:ten_hop_dong, :khach_hang, :linh_vuc_id, :so_hop_dong, 
            :ngay_ky, :gia_tri, :Thoi_gian_thuc_hien, :file_hop_dong,:tinh_trang_hop_dong, 1) ";
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $ten_hop_dong = $_POST['ten_hop_dong'];
            $khach_hang = $_POST['khach_hang'];
            $linh_vuc_id = $_POST['linh_vuc_id'];
            $so_hop_dong = $_POST['so_hop_dong'];
            $ngay_ky = $_POST['ngay_ky'];
            $gia_tri = $_POST['gia_tri'];
            $Thoi_gian_thuc_hien = $_POST['Thoi_gian_thuc_hien'];
            $file_hop_dong = $_POST['file_hop_dong'];
            $tinh_trang_hop_dong = $_POST['tinh_trang_hop_dong'];

            // Bind the values to the prepared statement placeholders
            $statement->bindParam(':ten_hop_dong', $ten_hop_dong);
            $statement->bindParam(':khach_hang', $khach_hang);
            $statement->bindParam(':linh_vuc_id', $linh_vuc_id);
            $statement->bindParam(':so_hop_dong', $so_hop_dong);
            $statement->bindParam(':ngay_ky', $ngay_ky);
            $statement->bindParam(':gia_tri', $gia_tri);
            $statement->bindParam(':Thoi_gian_thuc_hien', $Thoi_gian_thuc_hien);
            $statement->bindParam(':file_hop_dong', $file_hop_dong);
            $statement->bindParam(':tinh_trang_hop_dong', $tinh_trang_hop_dong);
            // Execute the prepared statement
            $statement->execute();
            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();

        }
    }

    public static function editHopDong($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE hop_dong SET `ten_hop_dong` = :ten_hop_dong, 
                    `khach_hang` = :khach_hang, 
                    `linh_vuc_id` = :linh_vuc_id, 
                    `so_hop_dong` = :so_hop_dong, 
                    `ngay_ky` = :ngay_ky, `gia_tri` = :gia_tri, 
                    `Thoi_gian_thuc_hien` = :Thoi_gian_thuc_hien,
                    `file_hop_dong` = :file_hop_dong, 
                    `tinh_trang_hop_dong` = :tinh_trang_hop_dong
                    WHERE `id` = " . $id;
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $ten_hop_dong = $_POST['ten_hop_dong'];
            $khach_hang = $_POST['khach_hang'];
            $linh_vuc_id = $_POST['linh_vuc_id'];
            $so_hop_dong = $_POST['so_hop_dong'];
            $ngay_ky = $_POST['ngay_ky'];
            $gia_tri = $_POST['gia_tri'];
            $Thoi_gian_thuc_hien = $_POST['Thoi_gian_thuc_hien'];
            $file_hop_dong = $_POST['file_hop_dong'];
            $tinh_trang_hop_dong = $_POST['tinh_trang_hop_dong'];

            // Bind the values to the prepared statement placeholders
            $statement->bindParam(':ten_hop_dong', $ten_hop_dong);
            $statement->bindParam(':khach_hang', $khach_hang);
            $statement->bindParam(':linh_vuc_id', $linh_vuc_id);
            $statement->bindParam(':so_hop_dong', $so_hop_dong);
            $statement->bindParam(':ngay_ky', $ngay_ky);
            $statement->bindParam(':gia_tri', $gia_tri);
            $statement->bindParam(':Thoi_gian_thuc_hien', $Thoi_gian_thuc_hien);
            $statement->bindParam(':file_hop_dong', $file_hop_dong);
            $statement->bindParam(':tinh_trang_hop_dong', $tinh_trang_hop_dong);

            // Execute the prepared statement
            $statement->execute();
            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();

        }
    }

    public static function softDeleteHopDong($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE hop_dong SET `flag_delete` = 0  WHERE Id=:id";
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

    public static function getListLinhVuc()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT id, ten_linh_vuc FROM linh_vuc"; // Modify this query as per your requirements

            $statement = $db->prepare($query);
            $statement->execute();

            $values = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $values;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();

        }
    }

    public static function getRecordById($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT * FROM linh_vuc WHERE id = :id"; // Modify the table name as per your database structure

            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id, \PDO::PARAM_INT);
            $statement->execute();
            $record = $statement->fetch(\PDO::FETCH_ASSOC);

            return $record;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
            return null;
        }
    }
}
