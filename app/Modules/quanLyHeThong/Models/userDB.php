<?php
namespace models;

class User
{
    public static function getUserPage($page_number, $items_per_page, $flag_delete)
    {
        try {
            $db = \Connection::getDB();
            // Calculate the offset based on the page number and items per page
            $offset = ($page_number - 1) * $items_per_page;

            // Get the specified page of students, ordered by class
            $query = "SELECT * FROM users where `flag_delete` = 1 ORDER BY id ASC LIMIT :limit OFFSET :offset";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':limit', $items_per_page, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $roles = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            // Get the total number of students
            $query = "SELECT COUNT(*) FROM users where `flag_delete` = 1 ";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $total_hop_dong = $stmt->fetchColumn();

            // Calculate the total number of pages based on the number of students and items per page
            $total_pages = ceil($total_hop_dong / $items_per_page);

            return array(
                'user' => $user,
                'roles' => $roles,
                'total_pages' => $total_pages,
                'flag_delete' => $flag_delete
            );
        } catch (PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function createUser()
    {
        try {
            $db = \Connection::getDB();
            $query = "INSERT INTO users (`name`, `username`, `password`, `email`, `phone`, `gender`, `level`,`flag_delete`,`nguon`)";
            $query .= "VALUES (:name, :username, :password, :email, :phone, :gender, :level, 1,'Database') ";
            $statement = $db->prepare($query);

// Assuming you have retrieved the values from user input and stored them in variables
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $level = $_POST['level'];

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Bind the values to the prepared statement placeholders
            $statement->bindParam(':name', $name);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':password', $hashedPassword);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':phone', $phone);
            $statement->bindParam(':gender', $gender);
            $statement->bindParam(':level', $level);
            // Execute the prepared statement
            $statement->execute();

            if (empty($statement)){
                echo 'input not null';
            }

            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();

        }
    }

    public static function editUser($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE users SET
                    `name` = :name, 
                    `username` = :username, 
                    `password` = :password, 
                    `email` = :email, `phone` = :phone, 
                    `gender` = :gender, 
                    `level` = :level
                    WHERE `id` = " . $id;
            $statement = $db->prepare($query);

            // Assuming you have retrieved the values from user input and stored them in variables
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $level = $_POST['level'] ?? null;

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Bind the values to the prepared statement placeholders
            $statement->bindParam(':name', $name);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $hashedPassword);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':phone', $phone);
            $statement->bindParam(':gender', $gender);
            $statement->bindParam(':level', $level);

            // Execute the prepared statement
            $statement->execute();
            // Handle success or any additional logic
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function softDeleteUser($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE users SET `flag_delete` = 0  WHERE Id=:id";
            $statement = $db->prepare($query);
            $statement->bindValue('id', $id);
            $statement->execute();
            $statement->closeCursor();
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function getUserByID($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT * FROM users WHERE Id = :id"; // Modify this query as per your requirements

            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();

            $values = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $values;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
            return [];
        }
    }

}
