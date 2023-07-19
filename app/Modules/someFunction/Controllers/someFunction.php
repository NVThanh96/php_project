<?php
include dirname(dirname(dirname(dirname(__FILE__)))). "/Public/config/config.php";
include dirname(dirname(dirname(dirname(__FILE__)))). "/Models/json_to_api.php";

class  someFunction
{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? '';

        switch ($action) {
            case 'upload':
                $this->upload();
                break;
            case 'listPlugin':
                $this->listPlugin();
                break;
            case 'uploadPlugin':
                $this->uploadPlugin();
                break;
            case 'removePlugin':
                $this->removePlugin();
                break;
            case 'changeActive':
                $this->changeActive();
                break;
            case 'showLog':
                $this->showLog();
                break;
            case 'reloadPlugin':
                $this->reloadPlugin();
                break;
            default:
                break;
        }
    }

    public function upload()
    {
        include 'Modules/someFunction/Views/upload.php';
    }

    public function listPlugin()
    {
        $baseFolder = dirname(dirname(__DIR__));
        // get all file mota.txt
        $getFileMoTa = $this->pathMoTa($baseFolder);

        $getFileConfig = $this->pathConfig($baseFolder);

        include 'Modules/someFunction/Views/listPlugin.php';
    }

    public function changeActive()
    {
        $file = urldecode($_GET['file']); // Get the file path from the URL parameter
        $json = file_get_contents($file);
        $json_data = json_decode($json, true);
        if ($json_data[0]['hidden'] === true) {
            $json_data[0]['hidden'] = false;
        } else {
            $json_data[0]['hidden'] = true;
        }

        file_put_contents($file, json_encode($json_data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        $this->listPlugin();
    }


    public function pathConfig($path)
    {
        $directory = $path . '\*\config.json';
        $moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);
        $paths = [];
        foreach ($moduleFiles as $key => $value) {
            if (basename($moduleFiles[$key]) !== 'Readme.txt' && basename(strpos($moduleFiles[$key], 'login') === false) && basename(strpos($moduleFiles[$key], 'someFunction') === false)) {
                $paths[] = $value;
            }
        }
        return $paths;
    }

    public function pathMoTa($parent)
    {
        $directory = $parent . '\*\mota.txt';
        $moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);
        $paths = [];
        foreach ($moduleFiles as $key => $value) {
            if (basename($moduleFiles[$key]) !== 'Readme.txt' && basename(strpos($moduleFiles[$key], 'login') === false) && basename(strpos($moduleFiles[$key], 'someFunction') === false)) {
                $paths[] = $value;
            }
        }
        return $paths;
    }

    public function removePlugin()
    {
        $folderPath = $_POST['folderPath'];

        if (is_dir($folderPath)) {
            SomeFunctionDB::deletePlugin($folderPath);
        } else {
            echo "Folder not found.";
        }

    }

    public function uploadPlugin()
    {
        // Create an instance of the SomeFunctionDB class
        $someFunction = new SomeFunctionDB();

        // Handle the file upload and get the message
        $someFunction->handleFileUpload();

        $this->listPlugin();

    }

    public function showLog()
    {
        include('Modules/someFunction/Views/showLog.php');
    }

    public function reloadPlugin()
    {
        $sourceApiUrl = 'C:\wamp64\www\JobDnict\php_project\app\Models\writeToJson\test.json';
        /*$sourceApiUrl = 'C:\wamp64\www\JobDnict\php_project\app\Models\json_to_api.php';*/
        $targetApiUrl = 'https://api.dnict.vn/v1/core/menu/setRouters?appCode=tts';
        $token = $_SESSION['token'];
        $jsonToApi = new JsonToApi();
        $jsonToApi->processJsonData();
        // Get the data from the source API
        $data = file_get_contents($sourceApiUrl);


        // Create a POST request to the target API using cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $targetApiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'X-Token: ' . $token
        ]);
        $result = curl_exec($ch);
        curl_close($ch);

        // Handle the response from the target API
        if ($result !== false) {
            // Success

            $this->listPlugin();
        } else {
            // Error
            echo "Error pushing values to the target API.";
        }
    }



}