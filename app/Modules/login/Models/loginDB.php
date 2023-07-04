<?php

require_once 'vendor/autoload.php';
include "Utils/requestAPI.php";

class LoginDB
{
    // kiểm tra người dùng đã đăng nhập vào hay chưa
    function checkSession()
    {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }

    // kiếm tra người dùng đó có phải là admin không khi login vào
    function isAdmin()
    {
        $level = $_SESSION['level'] ?? "";
        $roleName = $this->getRoleNameById($level);
        if ($roleName != null) {
            if (isset($level) && $roleName == 'admin') {
                return true;
            }
        }
        return false;
    }

    // kiếm tra người dùng đó có phải là quản lý không khi login vào
    function isManager()
    {
        $level = $_SESSION['level'] ?? "";
        $roleName = $this->getRoleNameById($level);
        if ($roleName !== null) {
            $explode = explode(' ', $roleName);
            if (isset($level) && $explode[0] == 'manager') {
                return true;
            }
        }
        return false;
    }

    // dựa vào role_id để lấy được tên của role đó
    public function getRoleNameById($id)
    {
        try {
            $db = \Connection::getDB();
            $query = "SELECT role_name FROM roles WHERE role_id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();

            $value = $statement->fetch(\PDO::FETCH_COLUMN);
            return $value !== false ? $value : null;
        } catch (\PDOException $e) {
            echo "Database Invalid: " . $e->getMessage();
            return null;
        }
    }

    // kt trong $_SESSION['username'] có tồn tại trong Database
    // nếu có thì lưu 1 số thông tin từ db vào session  để view ra
    public function getInformation()
    {
        $db = \Connection::getDB();
        if ($this->checkSession() == true) {
            $query = 'SELECT * FROM users WHERE username = :username';
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $_SESSION['username']);
            $stmt->execute();
            $db = $stmt->fetch(\PDO::FETCH_ASSOC);
            // Store user information in session variables
            if ($db) {
                $_SESSION['id'] = $db['id'];
                $_SESSION['name'] = $db['name'];
                $_SESSION['level'] = $db['level'];
                $_SESSION['phone'] = $db['phone'];
                $_SESSION['email'] = $db['email'];
            }
        }
    }

    // lấy token từ api để xử lý
    public static function getToken($username, $password)
    {
        $request = new RequestAPI();
        $authUrl = 'https://api.dnict.vn/v1/auth/uaa/token';
        $token = $request->getApi($username, $password, $authUrl, 'GET','');
        return $token;
    }

    // get sidebar theo tài khoản đăng nhập vào
    public static function getSideBar($token)
    {
        $request = new RequestAPI();
        $authUrl = 'https://api.dnict.vn/v1/core/menu/getRouters?appCode=tts';
        $result = $request->getApi('','',$authUrl,'',$token);
        return $result;
    }


    public static function getResponse($username, $password)
    {
        $startTime = microtime(true); // Record the start time

        $token = self::getToken($username, $password);

        $request = new RequestAPI();
        $response  = $request->getApi('','','','',$token);

        $request->checkAPI($token,$startTime);

        return $response;
    }

    // sau khi lấy được token
    // bỏ vào trong để đăng nhập
    public
    static function loginWithApi($username, $password)
    {
        $token = self::getToken($username, $password);
        $responseData = json_decode($token, true);
        if ($responseData['status']??'') {
            self::getResponse($username, $password);
        } else if (empty($token)) {
            $message_error = 'Vui lòng nhập đúng username và password';
            self::check($username, $password, $message_error);
            self::getResponse($username, $password);
        }
        else {
            $startTime = microtime(true); // Record the start time
            $_SESSION['token'] = $token;
            $sideBar = self::getSideBar($token);
            $sideBarDecode = json_decode($sideBar, true);
            $_SESSION['email'] = $sideBarDecode['email'];

            foreach ($sideBarDecode['roles'] as $role) {
                $_SESSION['role'] = $role;
            }
            $_SESSION['rolelinhvuc'] = $sideBarDecode['roles'][0] ?? '';
            header('location: admin');
            $endTime = microtime(true); // Record the end time
            $executionTime = $endTime - $startTime; // Calculate the execution time

            self::getResponse($username, $password);
            return [
                'executionTime' => $executionTime,
            ];

        }
    }

    public
    static function check($username, $password, $message_error = null)
    {
        // Check if the username and password are provided
        if (!empty($username) && !empty($password)) {
            $loginDB = new LoginDB();
            // Check if the user exists
            if ($loginDB->checkUser($username)) {
                // Hash the password and compare with the stored hash
                if ($loginDB->verifyPassword($username, $password)) {
                    // User authenticated, store session and redirect
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $getInfor = new LoginDB();
                    $getInfor->getInformation();
                }
                if ((new LoginDB())->isAdmin()) {
                    header('location: admin');
                } elseif ((new LoginDB())->isManager()) {
                    header('location: admin');
                } else {
                    header('location: ');
                }
            }
        }
        include('Modules/login/Views/login.php');
    }

    public
    static function checkUser($username)
    {
        $db = \Connection::getDB();
        $query = 'SELECT * FROM users WHERE username = :username';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public
    function verifyPassword($username, $password)
    {
        // Retrieve the hashed password from the database for the given username
        $hashedPassword = $this->getHashedPassword($username);

        // Verify the provided password against the stored hashed password
        if (password_verify($password, $hashedPassword)) {
            return true; // Passwords match
        }
        return false; // Passwords do not match
    }

    private
    function getHashedPassword($username)
    {
        // Query the database to retrieve the hashed password for the given username
        $db = \Connection::getDB();
        $query = "SELECT password FROM users WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result && isset($result['password'])) {
            return $result['password']; // Return the hashed password
        }
        return null; // User does not exist or hashed password not found
    }


    public
    static function saveApiToDB($nameApi, $usr, $role, $pass)
    {
        $db = \Connection::getDB();
        $name = $nameApi;
        $username = $usr;
        $password = $pass;
        $email = $username . "@gmail.com";
        $phone = "0" . rand(100000000, 999999999);
        $level = ($role == 'admin') ? 1 : 2;

        $query = "INSERT INTO users (`name`, `username`, `password`, `email`, `phone`, `gender`, `level`, `flag_delete`,`nguon`) ";
        $query .= "VALUES (:name, :username, :password, :email, :phone, 'nam', :level, 1,'API')";

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $statement = $db->prepare($query);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(':level', $level, \PDO::PARAM_INT); // Add PDO::PARAM_INT flag
        $statement->execute();
    }

    public
    static function updateApiToDB($nameApi, $usr, $role, $pass)
    {
        $db = \Connection::getDB();

        $name = $nameApi;
        $username = $usr;
        $password = $pass;
        $level = ($role == 'admin') ? 1 : 2;

        $query = "UPDATE users SET `name` = :name, `username` = :username, `password` = :password, `level` = :level WHERE `username` = :username";

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $statement = $db->prepare($query);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':level', $level, \PDO::PARAM_INT); // Add PDO::PARAM_INT flag
        $statement->execute();
    }


}

