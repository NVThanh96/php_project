<?php

require_once 'vendor/autoload.php';
include dirname(dirname(dirname(dirname(__FILE__))))."/Utils/requestAPI.php";


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


    public static function getResponse($username, $password)
    {
        $startTime = microtime(true); // Record the start time

        $token = requestAPI::getToken($username, $password);

        $request = new RequestAPI();
        $response = $request->getApi('', '', '', '', $token);

        $request->checkAPI($token, $startTime);

        return $response;
    }

    // sau khi lấy được token
    // bỏ vào trong để đăng nhập
    public
    static function loginWithApi($username, $password)
    {
        $token = requestAPI::getToken($username, $password);
        $responseData = json_decode($token, true);
        if ($responseData['status'] ?? '') {
            self::getResponse($username, $password);
        } else if (empty($token)) {
            $message_error = 'Vui lòng nhập đúng username và password';
            self::check($username, $password, $message_error);
            self::getResponse($username, $password);
        } else {
            $startTime = microtime(true); // Record the start time
            $_SESSION['token'] = $token;
            $sideBar = requestAPI::getSideBar($token);
            $sideBarDecode = json_decode($sideBar, true);
            $_SESSION['email'] = $sideBarDecode['email'];

            foreach ($sideBarDecode['roles'] as $role) {
                $_SESSION['role'] = $role;
            }
            $_SESSION['rolelinhvuc'] = $sideBarDecode['roles'][0] ?? '';
            header('location: /admin');
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
            // Hash the password and compare with the stored hash
            if ($loginDB->verifyPassword($username, $password)) {
                // User authenticated, store session and redirect
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $getInfor = new LoginDB();
                $getInfor->getInformation();
            }
        }
        include('Modules/login/Views/login.php');
    }

    public function verifyPassword($username, $password)
    {
        // Retrieve the hashed password from the database for the given username
        $hashedPassword = $this->getHashedPassword($username);

        if ($hashedPassword !== null) {
            // Verify the provided password against the stored hashed password
            if (password_verify($password, $hashedPassword)) {
                return true; // Passwords match
            }
        }

        return false; // Passwords do not match or hashed password is null
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

}

