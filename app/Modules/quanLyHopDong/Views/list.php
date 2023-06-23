<?php
include "Public/config/config.php";
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
                       class="btn btn-outline-primary btn-flat"
                       style="margin: 0 20px;"><i
                                class="fa-solid fa-plus"></i></a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tên Hợp Đồng</th>
                            <th>Khách Hàng</th>
                            <th>Lĩnh Vực</th>
                            <th>Số Hợp Đồng</th>
                            <th>Ngày Ký</th>
                            <th>Giá Trị</th>
                            <th>Thời Gian Thực Hiện</th>
                            <th>File Hợp Đồng</th>
                            <th>Trạng Thái Hợp Đồng</th>

                            <th colspan="3" class="text-center">Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($list_hop_dong)): ?>
                            <?php foreach ($list_hop_dong as $key => $value): ?>
                                <?php if ($value['flag_delete'] == 1): ?>
                                    <tr>
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $value['ten_hop_dong']; ?></td>
                                        <td><?php echo $value['khach_hang']; ?></td>
                                        <td><?php echo $value['ten_linh_vuc']; ?></td>
                                        <td><?php echo $value['so_hop_dong']; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($value['ngay_ky'])); ?></td>
                                        <td><?php echo number_format($value['gia_tri'], 0, ',', '.') . ' VND'; ?></td>
                                        <td><?php echo $value['Thoi_gian_thuc_hien']; ?></td>
                                        <td><?php echo $value['file_hop_dong']; ?></td>
                                        <td><?php echo $value['tinh_trang_hop_dong'] == 'Hoan thanh' ? "Hoàn Thành" : ($value['tinh_trang_hop_dong'] == 'Dang thuc hien' ? "Đang Thực Hiện" : "Chưa Thực hiện"); ?></td>

                                            <td class="text-center">
                                                <a href="edit?id=<?= $value['id'] ?>"><i
                                                            class="fa-solid fa-pen"></i></a>
                                            </td>

                                            <td class="text-center">
                                                <button style="color:red; border: none;background-color: transparent"
                                                        id="delete-btn-<?= $value['id'] ?>"><i
                                                            class="fa-solid fa-trash"></i>
                                                </button>
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
                                            <div  class="container">
                                                <h3>Mã số hợp đồng: <?php echo $value['so_hop_dong']; ?></h3>
                                                <h3>Tên hợp đồng: <?php echo $value['ten_hop_dong']; ?></h3>
                                                <h3>Khách hàng: <?php echo $value['khach_hang']; ?></h3>
                                                <h3>Tên lĩnh vực: <?php echo $value['ten_linh_vuc']; ?></h3>
                                                <h3>Ngày ký kết: <?php echo date('d/m/Y', strtotime($value['ngay_ky'])); ?></h3>
                                                <h3>Trị Giá: <?php echo number_format($value['gia_tri'], 0, ',', '.') . ' VND'; ?></h3>
                                                <h3>Thời gian thực hiện: <?php echo $value['Thoi_gian_thuc_hien']  ; ?> Tiếng</h3>
                                                <h3>File hợp đồng: <?php echo $value['file_hop_dong'] ?? 'Không có'; ?></h3>
                                                <h3>Tình trạng hiện nay: <?php echo $value['tinh_trang_hop_dong'] == 'Hoan thanh' ? "Hoàn Thành" : ($value['tinh_trang_hop_dong'] == 'Dang thuc hien' ? "Đang Thực Hiện" : "Chưa Thực hiện"); ?></h3>
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
    <?php include('Modules/quanLyHopDong/Public/js/delete.js') ?>
    <?php include('Public/js/showInformation.js') ?>
</script>

</body>
<?php include "Views/admin/layouts/footer.php"; ?>
</html>