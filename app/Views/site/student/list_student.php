<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<?php include(__DIR__ . '/../layouts/header.php') ?>

    <div class="table-responsive container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Class</th>
                <th>Gender</th>
                <th colspan="2" class="d-flex justify-content-center">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($list_students as $key => $value): ?>
                    <?php if ($value['flag_delete'] == 1): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['class']; ?></td>
                            <td>
                                <?php echo ($value['gender'] == 1) ? 'Nam' : 'Nữ'; ?>
                            </td>

                            <td>
                                <a class="btn btn-success" href=""
                                   role="button">Edit</a>
                            </td>

                            <td>
                                <button class="btn btn-danger" id="delete-btn-<?= $value['id'] ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php include(__DIR__ . '/../student/paginate.php') ?>

    </div>
</body>

<footer>
    <script><?php include(__DIR__ . '/../../../Public/js/delete.js') ?></script>
    <?php include(__DIR__ . '/../layouts/footer.php') ?>
</footer>

</html>