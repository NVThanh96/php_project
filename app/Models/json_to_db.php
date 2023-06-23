<?php
include 'C:\wamp64\www\project_php\app\DB\Connection.php';

// Assuming you have a custom class or framework for database connection
$db = \Connection::getDB();

// Check if the database connection was successful
if (!isset($db)) {
    die('Connection failed: Unable to connect to the database.');
}

// Read the JSON file
$jsonData = file_get_contents('C:\wamp64\www\project_php\app\Views\admin\layouts\sideBar.json');

// Decode the JSON data
$data = json_decode($jsonData, true);

/*// Drop table if it exists
$sqlDrop = "DROP TABLE IF EXISTS sidebar";
if ($db->query($sqlDrop) == true) {
    echo "Table dropped successfully<br>";
} else {
    echo "Error dropping table: ";
}*/

// Create a table in the database
$sql = "CREATE TABLE IF NOT EXISTS sidebar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    view VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL,
    redirect VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    icon VARCHAR(255) NOT NULL,
    chucNangTitle VARCHAR(255) NOT NULL,
    parent_id INT DEFAULT NULL
)";

if ($db->query($sql) == true) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: ";
}

// Function to insert sidebar data recursively
function insertSidebarData($db, $data, $parentId = null) {
    foreach ($data as $item) {
        $name = $item['name'];
        $view = $item['view'];
        $path = $item['path'];
        $redirect = $item['redirect'];
        $role = is_array($item['role']) ? implode(',', $item['role']) : $item['role'];
        $icon = $item['icon'];
        $chucNangTitle = $item['chucNangTitle'];

        // Insert sidebar item into the database
        $parentId = $parentId === null ? 'NULL' : $parentId;
        $sql = "INSERT INTO sidebar (name, view, path, redirect, role, icon, chucNangTitle, parent_id) 
                VALUES ('$name', '$view', '$path', '$redirect', '$role', '$icon', '$chucNangTitle', $parentId)";
        if ($db->query($sql) == false) {
            echo "Error inserting data: ";
        }

        // If the sidebar item has children, recursively call the function
        if (isset($item['children'])) {
            $lastId = $db->lastInsertId();
            insertSidebarData($db, $item['children'], $lastId);
        }
    }
}

// Insert data into the database
insertSidebarData($db, $data['sideBar']);
