<?php
// Read the JSON file
include '../Utils/requestAPI.php';
/*require_once "C:\wamp64\www\JobDnict\php_project\app\Modules\quanLyHopDong\Views\config.php";*/


function path()
{
    $directory = dirname(__DIR__) . '\Modules\*';
    $moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);
    $paths = [];

    foreach ($moduleFiles as $key => $value) {
        if (basename($moduleFiles[$key]) !== 'Readme.txt' && basename(strpos($moduleFiles[$key], 'login') === false)) {
            $paths[] = $value;
        }
    }

    /*  $result = [];
      foreach ($paths as $path) {
          $foldername = basename($path);
          $result[] = '/' . $foldername;
      }*/
    return $paths;
}



function getViewsFromModule($RootModule)
{
    $directory = dirname(__DIR__) . '\Modules' . $RootModule . '\Views\*';
    $moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);
    $views = [];
    $ModuleName = str_replace("/", "", $RootModule);
    foreach ($moduleFiles as $key => $value) {
        if (basename($moduleFiles[$key]) !== 'Readme.txt' && strpos($moduleFiles[$key], 'login') === false) {
            $baseName = baseName($value);
            if (strpos($baseName, '.php')) {
                /*  $a =str_replace(".php", "",$baseName);
                  var_dump($ModuleName . "_".$a);*/
                $views[] = $value;
            }

        }
    }
    return $views;
}

/*var_dump(path());
$arrPathRoot = path();
foreach ($arrPathRoot as $str_obj) {
    $arrViewByModule = getViewsFromModule($str_obj);
   /* var_dump($arrViewByModule);*/

function pathFromParent($parent)
{
    $directory = $parent . '/*';
    $moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);
    $paths = [];
    foreach ($moduleFiles as $key => $value) {
        if (basename($moduleFiles[$key]) !== 'Readme.txt' && strpos($moduleFiles[$key], 'login') === false) {
            $paths[] = $value;
        }
    }
    return $paths;
}

function getConfig($path)
{
    $directory = $path . '/config.json';
    $moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);
    foreach ($moduleFiles as $value) {
        $json = file_get_contents($value);
        return json_decode($json, true);
    }
    return null;
}

$baseFolder = dirname(__DIR__) . '/Modules';
$arrB = pathFromParent($baseFolder);

$result = [];

foreach ($arrB as $item) {
    // chỉ lấy những file có config ở trong
    $config = getConfig($item);
    if ($config !== null) {
        $result[] = $config;
    }
}

$output = json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
$formattedOutput = '<pre>' . $output . '</pre>';

echo $formattedOutput;


/*function writeToJson()
{

    $aav = [];

    $jsonData = json_encode($aav, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // Specify the file path
    $filePath = 'test.json';

    // Open the file in write mode ('w' flag)
    $file = fopen($filePath, 'w');

    if ($file) {
        // Write the JSON data to the file
        fwrite($file, $jsonData);

        // Close the file handle
        fclose($file);

        echo 'Data has been written to ' . $filePath;
    } else {
        echo 'Unable to open file for writing.';
    }
}*/


/*function doRegister() {
    $username = getPOST('username');
    $fullname = getPOST('fullname');
    $email    = getPOST('email');
    $password = getPOST('password');
    $address  = getPOST('address');

    $sql    = "select * from users where username = '$username' or email = '$email'";
    $result = executeResult($sql);
    if ($result == null || count($result) == 0) {
        $password = md5Security($password);

        $sql = "insert into users(fullname, username, email, password, address) values ('$fullname', '$username', '$email', '$password', '$address')";
        execute($sql);

        $res = [
            "status" => 1,
            "msg"    => "Create new account success!!!"
        ];
    } else {
        $res = [
            "status" => -1,
            "msg"    => "Email|Username existed!!!"
        ];
    }
    echo json_encode($res);
}*/

/*function getJson(Json json, int lvl) {
    $html = "";
    echo lvl + "---" + json->id;
    echo lvl + "---" + json-> ten;
    if(isset(json->children) && json->children.length > 0 {
        foreach(json->children as jsonChild) {
            $html = $html +getJson(jsonChild, lvl++);
        }

	} else {
        return $html;
    }

}*/


/*var_dump(getViews());*/

/*function getTitle()
{
    $directory = dirname(__DIR__) . '\Modules\*\Models\*';
    $moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);
    $classNames = [];

    foreach ($moduleFiles as $key => $value) {
        if (basename($moduleFiles[$key]) !== 'Readme.txt' && strpos($moduleFiles[$key], 'login') === false) {
            $className = str_replace('.php', '', basename($value));
            $classNames[] = $className;
            require_once $value;
        }
    }
    return $classNames;
}

function getViews()
{
    $directory = dirname(__DIR__) . '\Modules\*\Views\*';
    $moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);
    $views = [];

    foreach ($moduleFiles as $key => $value) {
        if (basename($moduleFiles[$key]) !== 'Readme.txt' && strpos($moduleFiles[$key], 'login') === false) {
            $views[] = $value;
        }
    }
    return $views;
}


function getAllFolders($dir)
{
    $folders = array();
    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                if (is_dir($dir . '/' . $entry)) {
                    $folders[] = $dir . '/' . $entry;
                    $folders = array_merge($folders, getAllFolders($dir . '/' . $entry));
                }
            }
        }
        closedir($handle);
    }
    return $folders;
}

writeToJson();


function dataProcess()
{
    $paths = path();
    $data = [];

    foreach ($paths as $key => $path) {
        $name = str_replace('/', '', $path);
        $getName = str_replace('/', '', $path);
        $getPath = $path;
        $titles = getTitle();
        $title = isset($titles[$key]) ? $titles[$key]::getTitle() : null;

        $data[] = [
            'name' => $getName,
            'path' => $getPath,
            'component' => null,
            'redirect' => null,
            'hidden' => false,
            'alwaysShow' => false,
            'props' => null,
            'meta' => [
                'title' => $title,
                'icon' => null,
                'noCache' => false,
                'affix' => false,
                'breadcrumb' => false,
                'activeMenu' => null,
                'component' => null,
                'link' => null,
                'isIframe' => false,
                'roles' => []
            ],
            'children' => getRedirectchildren($name),
        ];
    }

    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $jsonData);

    return $data;
}

function getRedirectchildren($name)
{
    $component = getViews();

    $redirectParent = [];
    foreach ($component as $value) {
        $baseName = basename($value);
        $a = strpos(basename($value), 'config');
        if (basename(dirname(dirname($value))) === $name ) {
            if(empty($a) && $a === false) {
                $redirectChildren = getRedirectChild($value);
                $redirectParent[] = [
                    'name' => cutDomain($baseName),
                    'path' => cutStringModule($value),
                    'component' => cutStringModule($value),
                    'redirect' => null,
                    'hidden' => false,
                    'alwaysShow' => false,
                    'props' => null,
                    'meta' => [
                        'title' => isset($titleName) ? $titleName[$baseName] : null,
                        'icon' => null,
                        'noCache' => false,
                        'affix' => false,
                        'breadcrumb' => false,
                        'activeMenu' => null,
                        'component' => cutStringModule($value),
                        'link' => null,
                        'isIframe' => false,
                        'roles' => []
                    ],
                    'children' => is_dir($value) ? $redirectChildren : [],
                ];
            }else{
                require_once $value;
            }
        }
    }
    return $redirectParent;
}

function getRedirectChild($value)
{
    global $titleName;
    $redirectChildren = [];
    $comeInFolder = $value . '/*';
    $moduleFiles = glob($comeInFolder, GLOB_NOSORT | GLOB_BRACE);
    foreach ($moduleFiles as $moduleFile) {
        $baseName = basename($moduleFile);
        $searchResult = strpos('config.php', $baseName);
        if (isset($searchResult) && $searchResult !== false) {
            include $moduleFile;
        } else {
            $redirectChild = [
                'name' => strpos($baseName, '.php') !== false ? cutDomain($baseName) : $baseName,
                'path' => cutDomain($baseName),
                'component' => cutStringModule($moduleFile),
                'redirect' => null,
                'hidden' => true,
                'alwaysShow' => false,
                'props' => null,
                'meta' => [
                    'title' => strpos($baseName, '.php') !== false ? $titleName[$baseName] : null,
                    'icon' => null,
                    'noCache' => false,
                    'affix' => false,
                    'breadcrumb' => false,
                    'activeMenu' => cutStringModule(dirname($moduleFile)),
                    'component' => cutStringModule($moduleFile),
                    'link' => null,
                    'isIframe' => false,
                    'roles' => []
                ],
                'children' => is_dir($moduleFile) ? getRedirectChild($moduleFile) : [],
            ];
            $redirectChildren[] = $redirectChild;
        }
    }
    return $redirectChildren;
}


function cutStringModule($path)
{
    return str_replace('C:\\wamp64\\www\\JobDnict\\php_project\\app\\Modules', '', $path);
}

function cutDomain($baseName)
{
    return ucfirst(str_replace(".php", "", $baseName));
}

function writeToJson()
{

    $data = dataProcess();

    $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

// Specify the file path
    $filePath = 'test.json';

// Open the file in write mode ('w' flag)
    $file = fopen($filePath, 'w');

    if ($file) {
        // Write the JSON data to the file
        fwrite($file, $jsonData);

        // Close the file handle
        fclose($file);

        echo 'Data has been written to ' . $filePath;
    } else {
        echo 'Unable to open file for writing.';
    }
}*/


/* chạy vòng lặp để đổ dũ liệu*/
/*function writeToJson()
{
    $paths = path();
    $data = [];
    $title = getTitle();
    $redirect = getRedirect();

    foreach ($redirect as $key => $redirectPath) {
        $a = basename(dirname(dirname($redirectPath)));
        foreach ($paths as $index => $path) {
            $name = str_replace('/', '', $path);
            if ($a === $name && strpos(basename($redirectPath), '.php') !== false) {
                $getName = str_replace('/quanLy', 'Core', $path);
                $getPath = $path;
                $data[] = [
                    'name' => $getName,
                    'path' => $getPath,
                    'component' => null,
                    'redirect' => $redirectPath,
                    'hidden' => false,
                    'alwaysShow' => false,
                    'props' => null,
                    "meta" => [
                        'title' => $title[$index]::getTitle(),
                        'icon' => null,
                        'noCache' => false,
                        'affix' => false,
                        'breadcrumb' => false,
                        'activeMenu' => null,
                        'component' => null,
                        'link' => null,
                        'isIframe' => false,
                        'roles' => []
                    ],
                    'children' => []
                ];
                break; // Exit the inner loop since the match is found
            }
        }
    }

    $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // Specify the file path
    $filePath = 'test.json';

    // Open the file in write mode ('w' flag)
    $file = fopen($filePath, 'w');

    if ($file) {
        // Write the JSON data to the file
        fwrite($file, $jsonData);

        // Close the file handle
        fclose($file);

        echo 'Data has been written to ' . $filePath;
    } else {
        echo 'Unable to open file for writing.';
    }
}*/


/*function postToAPI($user, $password, $url, $jsonDataUser)
{
    $request = new RequestAPI();
    $authUrl = 'https://api.dnict.vn/v1/auth/uaa/token';
    $token = $request->getApi($user, $password, $authUrl, 'GET', '');
    $jsonDataArray = json_decode($jsonDataUser, true); // Decode the JSON string into an associative array
    $jsonDataArray['appcode'] = 'tts'; // Set the 'appcode' key
    $data = json_encode($jsonDataArray); // Encode the modified array back to JSON

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'X-Token: ' . $token,
        'Content-Type: application/json'
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    // Handle the response
    if ($response === false) {
        echo 'Error: ' . curl_error($curl);
    } else {
        var_dump($response);
    }

}

$appCode = 'tts';
$url = 'https://api.dnict.vn/v1/core/menu/setRouters?appCode='.$appCode;

$user = 'trungtamso_user';
$admin = 'trungtamso_user';
$password = 'Abc@1234';*/
