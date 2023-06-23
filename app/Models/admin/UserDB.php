<?php

class UserDB
{
    public static function checkUser($username) {
        try {
            $db = \Connection::getDB();
            $query = 'SELECT * FROM users WHERE username = :username';
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $result;
        } catch (Exception $e) {
            echo "Database error: " . $e->getMessage();
        }
    }

}