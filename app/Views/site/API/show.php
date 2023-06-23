<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php include(__DIR__ . '/../layouts/header.php') ?>

<?php
$login_url = 'https://api.dnict.vn/v1/auth/uaa/user';
$data = file_get_contents($login_url); // Fetch data from API
$data = json_decode($data, true); // Convert JSON data to PHP array
// Check if data was retrieved successfully
if ($data) {
    echo '<table class="container table">';
    echo '<thead class="table-dark text-center"><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>';
    echo '<tbody >';

    // Loop through each record in the data array and display it in a table row
    foreach ($data as $record) {
        echo '<tr>';
        echo '<td>' . $record['id'] . '</td>';
        echo '<td>' . $record['name'] . '</td>';
        echo '<td>' . $record['email'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'Error fetching data from API';
}
?>



</body>

<footer>
    <?php include(__DIR__ . '/../layouts/footer.php') ?>
</footer>
</html>
