<?php
// Read the JSON file
include '../Utils/requestAPI.php';

$jsonDataUser = file_get_contents('C:\wamp64\www\project_php\app\Models\sideBarUser.json');
$jsonDataAdmin = file_get_contents('C:\wamp64\www\project_php\app\Models\sideBarUser.json');

function postToAPI($user, $password, $url, $jsonDataUser)
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
        'accept: */*',
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
$password = 'Abc@1234';

postToAPI($admin, $password, $url, $jsonDataAdmin);


/*$request = new RequestAPI();
$authUrl = 'https://api.dnict.vn/v1/auth/uaa/token';
$token = $request->getApi($user, $password, $authUrl, 'GET', '');


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'accept: ',
    'X-Token: ' . $token,
    'Content-Type: application/json'
));

$response = curl_exec($curl);
curl_close($curl);


// Handle the response
if ($response === false) {
    echo 'Error: ' . curl_error($curl);
    echo 'Error decoding JSON: ' . json_last_error_msg();
} else {
    var_dump($responseData);
}*/

