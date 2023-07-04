<?php

class NhanVienDB
{

    //có thêm paginate cho table
    public static function getNhanVienPage($page_number, $items_per_page, $flag_delete)
    {
        try {
            $db = \Connection::getDB();
            // Calculate the offset based on the page number and items per page
            $offset = ($page_number - 1) * $items_per_page;

            // Get the specified page of students, ordered by class
            $query = "SELECT * FROM nhan_vien where `flag_delete` = 1 ORDER BY id ASC LIMIT :limit OFFSET :offset";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':limit', $items_per_page, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $nhanVien = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            // Get the total number of students
            $query = "SELECT COUNT(*) FROM nhan_vien where `flag_delete` = 1 ";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $total_hop_dong = $stmt->fetchColumn();

            // Calculate the total number of pages based on the number of students and items per page
            $total_pages = ceil($total_hop_dong / $items_per_page);

            return array(
                'nhanVien' => $nhanVien,
                'total_pages' => $total_pages,
                'flag_delete' => $flag_delete
            );
        } catch (PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function createNhanVien()
    {
        try {
            $db = \Connection::getDB();
            $query = "INSERT INTO nhan_vien (`ten_nhan_vien`, `tuoi`, `gioi_tinh`, `dia_chi`, `ngay_vao_lam`, `luong`,`flag_delete`)";
            $query .= "VALUES (:ten_nhan_vien, :tuoi, :gioi_tinh, :dia_chi, :ngay_vao_lam, :luong, 1) ";
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $ten_nhan_vien = $_POST['ten_nhan_vien'];
            $tuoi = $_POST['tuoi'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $dia_chi = $_POST['dia_chi'];
            $ngay_vao_lam = $_POST['ngay_vao_lam'];
            $luong = $_POST['luong'];

            // Bind the values to the prepared statement placeholders

            $statement->bindParam(':ten_nhan_vien', $ten_nhan_vien);
            $statement->bindParam(':tuoi', $tuoi);
            $statement->bindParam(':gioi_tinh', $gioi_tinh);
            $statement->bindParam(':dia_chi', $dia_chi);
            $statement->bindParam(':ngay_vao_lam', $ngay_vao_lam);
            $statement->bindParam(':luong', $luong);
            // Execute the prepared statement
            $statement->execute();
            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();

        }
    }

    public static function editNhanVien($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE nhan_vien SET
                    `ten_nhan_vien` = :ten_nhan_vien, 
                    `tuoi` = :tuoi, 
                    `gioi_tinh` = :gioi_tinh, 
                    `dia_chi` = :dia_chi, `ngay_vao_lam` = :ngay_vao_lam, 
                    `luong` = :luong 
                    WHERE `id` = " . $id;
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $ten_nhan_vien = $_POST['ten_nhan_vien'];
            $tuoi = $_POST['tuoi'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $dia_chi = $_POST['dia_chi'];
            $ngay_vao_lam = $_POST['ngay_vao_lam'];
            $luong = $_POST['luong'];


            // Bind the values to the prepared statement placeholders
            $statement->bindParam(':ten_nhan_vien', $ten_nhan_vien);
            $statement->bindParam(':tuoi', $tuoi);
            $statement->bindParam(':gioi_tinh', $gioi_tinh);
            $statement->bindParam(':dia_chi', $dia_chi);
            $statement->bindParam(':ngay_vao_lam', $ngay_vao_lam);
            $statement->bindParam(':luong', $luong);

            // Execute the prepared statement
            $statement->execute();
            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();

        }
    }

    public static function softDeleteNhanVien($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE nhan_vien SET `flag_delete` = 0  WHERE Id=:id";
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
            $query = "SELECT * FROM nhan_vien WHERE Id = :id"; // Modify this query as per your requirements

            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();

            $values = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $values;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function getTitle(){
        return 'Quản Lý Nhân Viên';
    }

}

