<?php

class LinhVucDB
{

    //có thêm paginate cho table
    public static function getLinhVucPage($page_number, $items_per_page, $flag_delete)
    {
        try {
            $db = \Connection::getDB();
            // Calculate the offset based on the page number and items per page
            $offset = ($page_number - 1) * $items_per_page;

            // Get the specified page of students, ordered by class
            $query = "SELECT * FROM linh_vuc where `flag_delete` = 1 ORDER BY id ASC LIMIT :limit OFFSET :offset";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':limit', $items_per_page, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $linhVuc = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            // Get the total number of students
            $query = "SELECT COUNT(*) FROM linh_vuc where `flag_delete` = 1 ";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $total_hop_dong = $stmt->fetchColumn();

            // Calculate the total number of pages based on the number of students and items per page
            $total_pages = ceil($total_hop_dong / $items_per_page);

            return array(
                'linhVuc' => $linhVuc,
                'total_pages' => $total_pages,
                'flag_delete' => $flag_delete
            );
        } catch (PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function createLinhVuc()
    {
        try {
            $db = \Connection::getDB();
            $query = "INSERT INTO linh_vuc (`ten_linh_vuc`, `ma_linh_vuc`, `trang_thai`, `flag_delete`)";
            $query .= "VALUES (:ten_linh_vuc, :ma_linh_vuc, :trang_thai, 1) ";
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $ten_linh_vuc = $_POST['ten_linh_vuc'] ?? '';
            $ma_linh_vuc = $_POST['ma_linh_vuc']?? '';
            $trang_thai = $_POST['trang_thai']?? '';

            // Bind the values to the prepared statement placeholders

            $statement->bindParam(':ten_linh_vuc', $ten_linh_vuc);
            $statement->bindParam(':ma_linh_vuc', $ma_linh_vuc);
            $statement->bindParam(':trang_thai', $trang_thai);
            // Execute the prepared statement
            $statement->execute();
            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();

        }
    }

    public static function editLinhVuc($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE linh_vuc SET
                    `ten_linh_vuc` = :ten_linh_vuc, 
                    `ma_linh_vuc` = :ma_linh_vuc, 
                    `trang_thai` = :trang_thai 
                    WHERE `id` = " . $id;
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $ten_linh_vuc = $_POST['ten_linh_vuc'];
            $ma_linh_vuc = $_POST['ma_linh_vuc'];
            $trang_thai = $_POST['trang_thai'];


            // Bind the values to the prepared statement placeholders
            $statement->bindParam(':ten_linh_vuc', $ten_linh_vuc);
            $statement->bindParam(':ma_linh_vuc', $ma_linh_vuc);
            $statement->bindParam(':trang_thai', $trang_thai);

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
            $query = "SELECT * FROM linh_vuc WHERE Id = :id"; // Modify this query as per your requirements

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
        return 'Quản Lý Lĩnh Vực';
    }
}

