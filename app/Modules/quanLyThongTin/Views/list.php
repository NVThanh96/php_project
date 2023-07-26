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
                        <li class="breadcrumb-item active"><?php echo $node1['ten'] ?></li>
                    </ol>
                </div><!-- /.col -->

            </div>
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><?php echo $node1['ten'] ?></h1>
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
                            <th>Tên Nhân Viên</th>
                            <th>Tuổi</th>
                            <th>Giới Tính</th>
                            <th>Địa Chỉ</th>
                            <th>Ngày Vào Làm</th>
                            <th>Lương</th>
                            <th colspan="3" class="text-center">Tùy chọn</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($list_nhan_vien)): ?>
                            <?php foreach ($list_nhan_vien as $key => $value): ?>
                                <?php if ($value['flag_delete'] == 1): ?>
                                    <tr>
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $value['ten_nhan_vien']; ?></td>
                                        <td><?php echo $value['tuoi']; ?></td>
                                        <td><?php echo $value['gioi_tinh']; ?></td>
                                        <td><?php echo $value['dia_chi']; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($value['ngay_vao_lam'])); ?></td>
                                        <td><?php echo number_format($value['luong'], 0, ',', '.') . ' VND'; ?></td>


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
                                            <div class="container custom-container">
                                                <h2 style="color: blue;">Nhân viên số: <?php echo $key + 1 ?></h2>
                                                <h2 style="color: green;">Tên nhân viên:<?php echo $value['ten_nhan_vien']; ?></h2>
                                                <h2 style="color: red;">Tuổi: <?php echo $value['tuoi']; ?></h2>
                                                <h2 style="color: orange;">Giới tính: <?php echo $value['gioi_tinh']; ?></h2>
                                                <h2 style="color: purple;">Địa chỉ: <?php echo $value['dia_chi']; ?></h2>
                                                <h2 style="color: teal;">Ngày vào làm: <?php echo date('d/m/Y', strtotime($value['ngay_vao_lam'])); ?></h2>
                                                <h2 style="color: brown;">Lương: <?php echo number_format($value['luong'], 0, ',', '.') . ' VND'; ?></h2>
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
                    <div style="float: right">
                        <?php include('Utils/paginate.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    <?php include('Modules/quanLyNhanVien/Public/js/delete.js') ?>
    <?php include('Public/js/showInformation.js') ?>
</script>

</body>
<?php include "Views/admin/layouts/footer.php"; ?>
</html>