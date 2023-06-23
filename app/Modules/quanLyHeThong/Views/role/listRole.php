<?php
include "Public/config/config.php"
?>

<html>
<head>
    <?php include "Views/admin/layouts/header.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <?php if (isset($list_roles)): ?>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Chức Vụ</th>
                            <th>Mô Tả</th>
                            <th>Lĩnh Vực</th>
                            <th colspan="3" class="text-center" > Tùy chọn</th>

                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_roles as $key => $value): ?>
                                <?php if ($value['flag_delete'] == 1 ): ?>
                                    <tr>
                                        <td><?php echo ++$key ?></td>
                                        <td><?php echo ucfirst($value['role_name']); ?></td>
                                        <td><?php echo ucfirst($value['description']); ?></td>
                                        <td><?php echo ($value['id_linh_vuc'] > 0) ? \models\Role::getNameLinhVuc($value['id_linh_vuc']) : 'all'; ?></td>
                                            <td class="text-center">
                                                <a href="edit?role_id=<?= $value['role_id'] ?>">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                            </td>

                                            <td class="text-center">
                                                <button style="color:red; border: none;background-color: transparent"
                                                        id="delete-btn-<?= $value['role_id'] ?>"
                                                        role_id="<?= $value['role_id'] ?>">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>

                                            <td   class="text-center">
                                                <button onclick="openPopup('<?= $value['role_id'] ?>')" style="color:green; border: none;background-color: transparent;" >
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                    </tr>
                                    <div class="popup" id="popup-<?php echo $value['role_id'] ?>" style="display:none">
                                        <div class="popup-content">
                                            <div class="container" style="margin-top: 20px">
                                                <h2>chức vụ thứ: <?php echo ++$key ?></h2>
                                                <h2>Tên chức vụ: <?php echo ucfirst($value['role_name']); ?></h2>
                                                <h2>Mô tả chức vụ:  <?php echo ucfirst($value['description']); ?></h2>
                                                <h2>Về lĩnh vực:  <?php echo ($value['id_linh_vuc'] > 0) ? \models\Role::getNameLinhVuc($value['id_linh_vuc']) : 'tất cả lĩnh vực'; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <h3> have no record!!</h3>
                    <?php endif; ?>
                    <?php include('paginate.php') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    <?php include('Modules/quanLyHeThong/Public/js/deleteRole.js') ?>
    <?php include('Public/js/showInformation.js') ?>
</script>

</body>
<?php include "Views/admin/layouts/footer.php"; ?>
</html>