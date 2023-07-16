<?php

class PhongBanDB
{

    //có thêm paginate cho table
    public static function getPhongBanPage($page_number, $items_per_page, $flag_delete)
    {
        try {
            $db = \Connection::getDB();
            // Calculate the offset based on the page number and items per page
            $offset = ($page_number - 1) * $items_per_page;

            // Get the specified page of students, ordered by class
            $query = "SELECT * FROM phong_ban where `da_xoa` = 0 ORDER BY id ASC LIMIT :limit OFFSET :offset";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':limit', $items_per_page, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $phongban = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            // Get the total number of students
            $query = "SELECT COUNT(*) FROM phong_ban where `da_xoa` = 0 ";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $total_hop_dong = $stmt->fetchColumn();

            // Calculate the total number of pages based on the number of students and items per page
            $total_pages = ceil($total_hop_dong / $items_per_page);

            return array(
                'phongBan' => $phongban,
                'total_pages' => $total_pages,
                'flag_delete' => $flag_delete
            );
        } catch (PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function createPhongBan()
    {
        try {
            $db = \Connection::getDB();
            $query = "INSERT INTO phong_ban (`ten_phong`, `ma_phong`,`sap_xep`, `da_xoa`)";
            $query .= "VALUES (:ten_phong, :ma_phong, 1, 0) ";
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $ten_phong = $_POST['ten_phong'] ?? '';
            $ma_phong = $_POST['ma_phong']?? '';


            // Bind the values to the prepared statement placeholders

            $statement->bindParam(':ten_phong', $ten_phong);
            $statement->bindParam(':ma_phong', $ma_phong);

            // Execute the prepared statement
            $statement->execute();
            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();

        }
    }

    public static function editPhongBan($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE phong_ban SET
                    `ten_phong` = :ten_phong, 
                    `ma_phong` = :ma_phong
                    WHERE `id` = " . $id;
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $ten_phong = $_POST['ten_phong'];
            $ma_phong = $_POST['ma_phong'];


            // Bind the values to the prepared statement placeholders
            $statement->bindParam(':ten_phong', $ten_phong);
            $statement->bindParam(':ma_phong', $ma_phong);

            // Execute the prepared statement
            $statement->execute();
            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();

        }
    }

    public static function softDelete($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE linh_vuc SET `flag_delete` = 0  WHERE Id=:id";
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
            $query = "SELECT * FROM phong_ban WHERE Id = :id"; // Modify this query as per your requirements

            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();

            $values = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $values;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }
}

