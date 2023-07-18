<?php

namespace models;
include dirname(dirname(dirname(__FILE__))). "/DB/Connection.php";

class StudentDB
{
    //chỉ show tất cả giá trị trong db ra
   /* public static function getStudents()
    {
        try {
            $db = \Database::getDB();

            $query = "SELECT * FROM students  ORDER BY class asc ";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }*/

    //có thêm paginate cho table
    public static function get_student_page($page_number, $items_per_page)
    {
        try {
            $db = \Connection::getDB();

            // Calculate the offset based on the page number and items per page
            $offset = ($page_number - 1) * $items_per_page;

            // Get the specified page of students, ordered by class
            $query = "SELECT * FROM students ORDER BY class ASC LIMIT :limit OFFSET :offset";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':limit', $items_per_page, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $students = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            // Get the total number of students
            $query = "SELECT COUNT(*) FROM students";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $total_students = $stmt->fetchColumn();

            // Calculate the total number of pages based on the number of students and items per page
            $total_pages = ceil($total_students / $items_per_page);

            return array(
                'students' => $students,
                'total_pages' => $total_pages
            );
        } catch (PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }

    public static function softDeleteStudent($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "UPDATE students SET `flag_delete` = 0 WHERE id=:id";
            $statement = $db->prepare($query);
            $statement->bindValue('id', $id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }


    /*public static function deleteStudent($id)
    {
        try {
            $db = Database::getDB();
            $query = "DELETE FROM students WHERE Id=:id";
            $statement = $db->prepare($query);
            $statement->bindValue('id', $id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
        }
    }*/
}

?>