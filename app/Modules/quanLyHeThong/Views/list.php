<?php
include "Public/config/config.php"
?>

<html>
<head>
    <?php include "Views/admin/layouts/header.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Rest of your code -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $node['ten'] ?></li>
                    </ol>
                </div><!-- /.col -->

            </div>
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><?php echo $node['ten'] ?></h1>
                    <a href="create" type="button"
                       class="btn btn-outline-primary btn-flat" style="margin: 0 20px;">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tên</th>
                            <th>Tài Khoản</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Giới Tính</th>
                            <th>Cấp bậc</th>
                            <th>Nguồn</th>
                            <th colspan="3" class="text-center">Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($list_users)): ?>
                            <?php foreach ($list_users as $key => $value): ?>
                                <?php if ($value['flag_delete'] == 1 && $value['level'] !== 'admin'): ?>
                                    <tr <?php echo ($value['level'] == 1) ? 'hidden' : "" ?> >
                                        <td><?php echo ++$key ?></td>
                                        <td><?php echo $value['name']; ?></td>
                                        <td><?php echo $value['username']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td><?php echo $value['phone']; ?></td>
                                        <td><?php echo $value['gender'] == 'nam' ? 'Nam' : 'Nữ' ?></td>
                                        <td>
                                            <?php echo \models\Role::getRoleName($value['level']) ?>
                                        </td>
                                        <td><?php echo $value['nguon']; ?></td>
                                        <td class="text-center">
                                            <a href="edit?id=<?= $value['id'] ?>">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <button style="color:red; border: none;background-color: transparent;"
                                                    id="delete-btn-<?= $value['id'] ?>"><i
                                                        class="fa-solid fa-trash"></i></button>
                                        </td>

                                        <td class="text-center">
                                            <button onclick="openPopup('<?= $value['id'] ?>')"
                                                    style="color:green; border: none;background-color: transparent;">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="popup" id="popup-<?php echo $value['id'] ?>" style="display:none">
                                        <div class="popup-content">
                                            <div class="container" style="margin-top: 20px">
                                                <h2>Người dùng thứ: <?php echo ++$key ?></h2>
                                                <h2>Tên người dùng: <?php echo $value['name']; ?></h2>
                                                <h2>Tài Khoản: <?php echo $value['username']; ?></h2>
                                                <h2>Email: <?php echo $value['email']; ?></h2>
                                                <h2>Số điện thoại: <?php echo $value['phone']; ?></h2>
                                                <h2>Giới
                                                    tính: <?php echo $value['gender'] == 'nam' ? 'Nam' : 'Nữ' ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <h3> have no record!!</h3>
                        <?php endif; ?>

                        </tbody>
                    </table>
                    <?php include('Utils/paginate.php') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    <?php include('Modules/quanLyHeThong/Public/js/delete.js') ?>
    <?php include('Public/js/showInformation.js') ?>
</script>


</body>
<?php include "Views/admin/layouts/footer.php"; ?>
</html>