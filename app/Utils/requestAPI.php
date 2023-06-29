<?php
class RequestAPI
{
    public function getApi($username, $password, $authUrl, $method, $token)
    {
        $curl = curl_init();

        if ($token == null) {
            curl_setopt($curl, CURLOPT_URL, $authUrl);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            $headers = ['Authorization: Basic ' . base64_encode($username . ':' . $password)];
        } else {
            if (isset($authUrl)) {
                curl_setopt($curl, CURLOPT_URL, $authUrl);
                $headers = ['X-Token: ' . $token];
            } else {
                $headers = ['X-Token: ' . $token];
            }
        }
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);
        return $response;
    }

    public function checkAPI($token, $startTime)
    {
        $directory1 = dirname(__DIR__) . '\Public\logError\*.log';
        $moduleFiles1 = glob($directory1, GLOB_NOSORT | GLOB_BRACE);
        foreach ($moduleFiles1 as $value) {
            if (strpos($value, 'error') !== false) {
                echo $value;
            }
        }
        $responseData = json_decode($token, true);
        $status = $responseData['status'] ?? '';
        $error = $responseData['error'] ?? '';
        $path = $responseData['path'] ?? '';

        if (isset($status) && !empty($status)) {
            $errorLogMessage = PHP_EOL . '----Lỗi đường dẫn---- ' . $error . " : " . $status . " Kiểm tra lại đường dẫn api của bạn: " . $path . PHP_EOL;
            header('location: login');
            error_log(new Exception($errorLogMessage), 3, $value);
        } else if ($token) {
            $endTime = microtime(true); // Record the end time
            $executionTime = $endTime - $startTime; // Calculate the execution time
            $time = PHP_EOL . "----Thành Công----" . PHP_EOL . "Thời gian thực hiện: " . $executionTime . " giây" . PHP_EOL;
            error_log(new Exception($time), 3, $value);
        } else {
            $endTime = microtime(true); // Record the end time
            $executionTime = $endTime - $startTime; // Calculate the execution time

            $time = PHP_EOL . "----False----" . PHP_EOL . "Thời gian thực hiện: " . $executionTime . " giây" . PHP_EOL;
            $errorLogMessage = "Vui lòng kiểm tra lại username và password" . PHP_EOL;
            $combine = $time . $errorLogMessage;
            error_log(new Exception($combine), 3, $value);
        }

    }
}
