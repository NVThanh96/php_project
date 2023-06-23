<?php $pathinfo = pathinfo($_SERVER['REQUEST_URI']);
$path = $pathinfo['dirname'] . '/admin';
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php include('Views/site/layouts/header.php') ?>
<div class="container">
    <h1>
        My Information
    </h1>
    <h4 style="margin: 20px">
        <p <?php echo isset($_SESSION['id']) ? '' : 'style="display: none;"' ?>>ID: <?php echo isset($_SESSION['id']) ?? ""; ?></p>
        <p<?php echo isset($_SESSION['name']) ? '' : 'style="display: none;"' ?>>Name: <?php echo $_SESSION['name'] ?? ""; ?></p>
        <p<?php echo isset($_SESSION['username']) ? '' : 'style="display: none;"' ?>>User Name: <?php echo $_SESSION['username'] ?? ""; ?></p>

        <p <?php echo isset($_SESSION['phone']) ? '' : 'style="display: none;"' ?>>Phone: <?php echo $_SESSION['phone'] ?? ''; ?></p>
        <p<?php echo isset($_SESSION['email']) ? '' : 'style="display: none;"' ?>>Email: <?php echo $_SESSION['email']?? ''; ?></p>
        <p<?php echo isset($_SESSION['level']) ? '' : 'style="display: none;"' ?>>Level: <?php echo $_SESSION['level']?? ''; ?></p>
    </h4>
</div>
</body>

<footer>
    <?php include('Views/site/layouts/footer.php') ?>
    <script><?php include('Public/js/showAndHide.js') ?></script>
</footer>
</html>
