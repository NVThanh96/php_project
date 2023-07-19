<?php
include "Public/config/config.php";
include "Views/admin/layouts/header.php";
?>

<style>
    <?php include "Modules/quanLyHopDong/Public/css/list.css";?>
</style>

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
                        <li class="breadcrumb-item active"><?php echo $node['ten'] ?? ''  ?></li>
                    </ol>
                </div><!-- /.col -->

            </div>

            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><?php echo $node['ten'] ?? '' ?></h1>
                    <a href="create" type="button"
                       class="btn btn-outline-primary btn-flat"
                       style="margin: 0 20px;">
                        <i class="fa-solid fa-plus"></i></a>
                    <a id="search_hidden"></a>
                </div>

                <div id="search" style="display: none">
                    <?php include "search.php"; ?>
                </div>

                <?php
                $t = time();
                $now = date("Y-m-d", $t);
                ?>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">STT</th>
                            <th>Tên Hợp Đồng</th>
                            <th>Số Hợp Đồng</th>
                            <th>Ngày Ký</th>
                            <th>Phòng Thực Hiện</th>
                            <th>Khách Hàng</th>
                            <th>Kinh Phí</th>
                            <th>Thời Gian Thực Hiện</th>
                            <th>Ngày Kết Thúc</th>
                            <th>Trạng Thái</th>
                            <th colspan="3" class="text-center">Tùy Chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($list_hop_dong) && !empty($list_hop_dong)): ?>
                            <?php foreach ($list_hop_dong as $key => $value): ?>
                                <?php if ($value['daxoa'] == 0): ?>
                                    <tr>
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $value['ten_hop_dong']; ?></td>
                                        <td><?php echo $value['so_hop_dong']; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($value['ngay_ky'])); ?></td>
                                        <td>
                                            <?php $a = HopDongDB::getListPhongBan();
                                            foreach ($a as $value1) {
                                                if ($value1['id'] === $value['id_phong_ban']) {
                                                    echo $value1['ten_phong'];
                                                }
                                                echo " ";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $value['khach_hang']; ?></td>
                                        <td><?php echo number_format($value['kinh_phi'], 0, ',', '.') . ' VND'; ?></td>
                                        <td><?php echo $value['thoi_gian_thuc_hien']; ?></td>
                                        <td>
                                            <?php
                                            $ngay_ket_thuc = date('d/m/Y', strtotime($value['ngay_ket_thuc']));
                                            echo ($t >= strtotime($value['ngay_ket_thuc']) && $value['trang_thai'] === 2) ? '<span style="color: red;">' . $ngay_ket_thuc . '</span>' : $ngay_ket_thuc
                                            ?>
                                        </td>


                                        <td>
                                            <?php echo $value['trang_thai'] == '1' ?
                                                "Đã Hoàn Thành" : ($value['trang_thai'] == '2' ?
                                                    "Đang Thực Hiện" : ($value['trang_thai'] == '3' ? "Tạm Dừng" : '')); ?>
                                        </td>

                                        <td class="text-center">
                                            <a href="/quanLyHopDong/edit?id=<?= $value['id'] ?>"><i
                                                        class="fa-solid fa-pen"></i></a>
                                        </td>

                                        <td class="text-center">
                                            <button style="color:red; border: none;background-color: transparent"
                                                    id="delete-btn-<?= $value['id'] ?>">
                                                <i class="fa-solid fa-trash"></i>
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
                                            <div style="display: flex">
                                                <div class="left col-6">
                                                    <h3>Hợp Đồng Thứ: <?php echo $value['id'] ?></h3>
                                                    <h3>Tên Hợp Đồng: <?php echo $value['ten_hop_dong']; ?></h3>
                                                    <h3>Số Hợp Đồng: <?php echo $value['so_hop_dong']; ?></h3>
                                                    <h3>Ngày Ký: <?php echo date('d/m/Y', strtotime($value['ngay_ky'])); ?></h3>
                                                    <h3>Phòng Ban: <?php echo $value['id_phong_ban']; ?></h3>
                                                    <h3>Tên Khách Hàng: <?php echo $value['khach_hang']; ?></h3>
                                                    <h3>Kinh Phí: <?php echo number_format($value['kinh_phi'], 0, ',', '.') . ' VND'; ?></h3>
                                                    <h3>Thời Gian Thực Hiện: <?php echo $value['thoi_gian_thuc_hien']; ?></h3>
                                                    <h3>Ngày Kết Thúc: <?php echo date('d/m/Y', strtotime($value['ngay_ket_thuc'])); ?></h3>
                                                    <h3>
                                                        <?php echo $value['trang_thai'] == '1' ?
                                                            "<span style='color: green;'>Đã Hoàn Thành</span>" :
                                                            ($value['trang_thai'] == '2' ?
                                                                "<span style='color: yellow;'>Đang Thực Hiện</span>" :
                                                                ($value['trang_thai'] == '3' ? "<span style='color: Red;'>Tạm Dừng</span>" : '')); ?>
                                                    </h3>

                                                </div>
                                                <div class="right col-6">

                                                </div>
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

<script>
    <?php include "Modules/quanLyHopDong/Public/js/hideAndShowFormSearch.js";?>
</script>

</body>
<?php include "Views/admin/layouts/footer.php"; ?>
