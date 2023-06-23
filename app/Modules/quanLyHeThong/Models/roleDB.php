<?php

namespace models;

class Role
{
    public static function getRolePage($page_number, $items_per_page, $flag_delete)
    {
        try {
            $db = \Connection::getDB();
            // Calculate the offset based on the page number and items per page
            $offset = ($page_number - 1) * $items_per_page;

            // Get the specified page of students, ordered by class
            $query = "SELECT * FROM roles where `flag_delete` = 1 ORDER BY role_id ASC LIMIT :limit OFFSET :offset";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':limit', $items_per_page, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $roles = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            // Get the total number of students
            $query = "SELECT COUNT(*) FROM roles where `flag_delete` = 1 ";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $total_hop_dong = $stmt->fetchColumn();

            // Calculate the total number of pages based on the number of students and items per page
            $total_pages = ceil($total_hop_dong / $items_per_page);

            return array(
                'roles' => $roles,
                'total_pages' => $total_pages,
                'flag_delete' => $flag_delete
            );
        } catch (PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function createRole()
    {
        try {
            $db = \Connection::getDB();
            $query = "INSERT INTO roles (`role_name`, `description`,`id_linh_vuc`, `flag_delete`,`button`)";
            $query .= "VALUES (:role_name, :description,:id_linh_vuc, 1, :button) ";
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $role_name = $_POST['role_name'];
            $description = $_POST['description'];
            $id_linh_vuc = $_POST['id_linh_vuc'];
            $button = $_POST['button'];

            // Bind the values to the prepared statement placeholders
            $statement->bindParam(':role_name', $role_name);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':id_linh_vuc', $id_linh_vuc);
            $statement->bindParam(':button', $button);
            // Execute the prepared statement
            $statement->execute();

            if (empty($statement)) {
                echo 'input not null';
            }
            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function getValuesByID($role_id)
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT * FROM roles WHERE role_id = :role_id"; // Modify this query as per your requirements

            $statement = $db->prepare($query);
            $statement->bindValue(':role_id', $role_id);
            $statement->execute();

            $values1 = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $values1;

        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
            return [];
        }
    }

    public static function editRole($role_id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE roles SET
        role_name = :role_name, 
        description = :description,
        id_linh_vuc = :id_linh_vuc,
        button = :button
        WHERE role_id = :role_id";
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $role_name = $_POST['role_name'];
            $description = $_POST['description'];
            $id_linh_vuc = $_POST['id_linh_vuc'];
            $button = $_POST['button'];

            // Bind the values to the prepared statement placeholders
            $statement->bindParam(':role_name', $role_name);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':id_linh_vuc', $id_linh_vuc);
            $statement->bindParam(':role_id', $role_id);
            $statement->bindParam(':button', $button);

            // Execute the prepared statement
            $statement->execute();
            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        }
    }


    public static function softDeleteRole($role_id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE roles SET `flag_delete` = 0  WHERE role_id=:role_id";
            $statement = $db->prepare($query);
            $statement->bindValue('role_id', $role_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function getRole()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT * FROM roles";
            $statement = $db->prepare($query);
            $statement->execute();
            return $statement;
        } catch (\PDOException $e) {
            echo "Have error" . $e->getMessage();
        }
    }

    public static function getButtonRole($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT button FROM roles WHERE role_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            if ($result === null) {
                return '';
            }

            return $result['button'];
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }


    public static function getRoleName($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT * FROM roles WHERE role_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            if ($result) {
                return $result['role_name'];
            } else {
                return null; // hoặc xử lý trường hợp không tìm thấy kết quả
            }
        } catch (\PDOException $e) {
            echo "Có lỗi xảy ra: " . $e->getMessage();
        }
    }

    public static function getAllLinhVuc()
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT * FROM linh_vuc";
            $statement = $db->prepare($query);
            $statement->execute();
            return $statement;
        } catch (\PDOException $e) {
            echo "Have error" . $e->getMessage();
        }
    }

    public static function getNameLinhVuc($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT ten_linh_vuc FROM linh_vuc WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            if ($result) {
                return $result['ten_linh_vuc'];
            } else {
                return null; // or handle the case when no result is found
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}