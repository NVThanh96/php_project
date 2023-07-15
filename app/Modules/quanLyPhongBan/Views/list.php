<?php
include "Public/config/config.php";
?>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <style>
        /* Popup styles */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid black;
        }

        /* Close button styles */
        .popup .popup-content button {
            float: right;
        }
    </style>
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
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tên Lĩnh Vực</th>
                            <th>Mã Lĩnh Vực</th>
                            <th>Trạng Thái</th>
                            <th colspan="3" class="text-center">Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($list_linh_vuc)): ?>
                            <?php foreach ($list_linh_vuc as $key => $value): ?>
                                <?php if ($value['flag_delete'] == 1): ?>
                                    <tr>
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $value['ten_linh_vuc']; ?></td>
                                        <td><?php echo $value['ma_linh_vuc']; ?></td>
                                        <td><?php echo $value['trang_thai']; ?></td>

                                            <td class="text-center">
                                                <a href="edit?id=<?= $value['id'] ?>">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                            </td>

                                            <td class="text-center">
                                                <button style="color:red; border: none;background-color: transparent;"
                                                        id="delete-btn-<?= $value['id'] ?>"><i class="fa-solid fa-trash"></i></button>
                                            </td>

                                            <td   class="text-center">
                                                <button onclick="openPopup('<?= $value['id'] ?>')" style="color:green; border: none;background-color: transparent;" >
                                                <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                    </tr>
                                    <div class="popup" id="popup-<?php echo $value['id'] ?>" style="display:none">
                                        <div class="popup-content">
                                            <div class="container" style="margin-top: 20px">
                                                <h2>Tên lĩnh vực: <?php echo $value['ten_linh_vuc']; ?> </h2>
                                                <h2>Mã số lĩnh vực: <?php echo $value['ma_linh_vuc']; ?></h2>
                                                <h2>Trạng thái lĩnh vực: <?php echo $value['trang_thai']; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center"><h3>No records found!</h3></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <div style="float: right">
                        <?php include('Utils/paginate.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    <?php include('Modules/quanLyPhongBan/Public/js/delete.js')?>
    <?php include('Public/js/showInformation.js') ?>
</script>



</body>
<?php include "Views/admin/layouts/footer.php"; ?>
</html>