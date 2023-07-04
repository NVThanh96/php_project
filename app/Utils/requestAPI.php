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
        $errorLogFiles = $this->getErrorLogFiles();
        foreach ($errorLogFiles as $errorLogFile) {
            $this->processErrorLog($errorLogFile, $token, $startTime);
        }
    }

    private function getErrorLogFiles()
    {
        $errorLogDirectory = dirname(__DIR__) . '\Public\logError\*.log';
        $errorLogFiles = glob($errorLogDirectory, GLOB_NOSORT | GLOB_BRACE);

        $filteredErrorLogFiles = array_filter($errorLogFiles, function ($file) {
            return strpos($file, 'error') !== false;
        });

        return $filteredErrorLogFiles;
    }

    private function processErrorLog($errorLogFile, $token, $startTime)
    {
        $responseData = json_decode($token, true);
        $status = $responseData['status'] ?? '';
        $error = $responseData['error'] ?? '';
        $path = $responseData['path'] ?? '';
        date_default_timezone_set('Asia/Bangkok');
        $timeInMillis = Strtotime('now');
        $dateTime = date('H:i:s', $timeInMillis);
        if (!empty($status)) {
            $errorLogMessage = PHP_EOL . '----Lỗi đường dẫn----' . PHP_EOL. 'Vào lúc: '. $dateTime .PHP_EOL . $error . " : " . $status . " Kiểm tra lại đường dẫn api của bạn: " . $path . PHP_EOL;
            $this->logError(new Exception($errorLogMessage), $errorLogFile);
            header('Location: login');
        } elseif ($token) {
            $endTime = microtime(true);
            $executionTime = $endTime - $startTime;
            $time = PHP_EOL . "----Thành Công----" . PHP_EOL. 'Vào lúc: '. $dateTime .PHP_EOL. "Thời gian thực hiện: " . $executionTime . " giây" . PHP_EOL;
            $this->logError(new Exception($time), $errorLogFile);
        } else {
            $endTime = microtime(true);

            $executionTime = $endTime - $startTime;
            $time = PHP_EOL . "----False----" . PHP_EOL .'Vào lúc: '. $dateTime .PHP_EOL.  "Thời gian thực hiện: " . $executionTime . " giây" . PHP_EOL;
            $errorLogMessage = "Vui lòng kiểm tra lại username và password" . PHP_EOL;
            $combine = $time . $errorLogMessage;
            $this->logError(new Exception($combine), $errorLogFile);
        }
    }

    private function logError($message, $errorLogFile)
    {
        error_log($message, 3, $errorLogFile);
    }

}
