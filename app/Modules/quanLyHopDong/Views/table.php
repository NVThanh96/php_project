<?php
$t = time();
$now = date("Y-m-d", $t);
?>
<table id="table-bordered" class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 10px">STT</th>
        <th>Tên hợp đồng</th>
        <th>Số hợp đồng</th>
        <th>Ngày ký</th>
        <th>Phòng thực hiện</th>
        <th>Khách hàng</th>
        <th>Kinh phí</th>
        <th>Thời gian thực hiện</th>
        <th>Ngày kết thúc</th>
        <th>Trạng thái</th>
        <th colspan="3" class="text-center">Tùy chọn</th>
    </tr>
    </thead>
    <tbody id="table-container">
    <?php if (isset($results) && !empty($results)): ?>
        <?php foreach ($results as $key => $value): ?>
            <?php if ($value['daxoa'] == 0): ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $value['ten_hop_dong']; ?></td>
                    <td><?php echo $value['so_hop_dong']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($value['ngay_ky'])); ?></td>
                    <td>
                        <?php $list_phong_ban = HopDongDB::getListPhongBan();
                        foreach ($list_phong_ban as $value1) {
                            if ($value1['id'] === $value['id_phong_ban']) {
                                echo $value1['ten_phong'];
                            }
                            echo "";
                        }
                        ?>
                    </td>
                    <td><?php echo $value['khach_hang']; ?></td>
                    <td><?php echo number_format($value['kinh_phi'], 0, ',', '.') . ' VND'; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($value['thoi_gian_thuc_hien'])); ?></td>
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
                                <h3>Ngày
                                    Ký: <?php echo date('d/m/Y', strtotime($value['ngay_ky'])); ?></h3>
                                <h3>Phòng Ban: <?php echo $value['id_phong_ban']; ?></h3>
                                <h3>Tên Khách Hàng: <?php echo $value['khach_hang']; ?></h3>
                                <h3>Kinh
                                    Phí: <?php echo number_format($value['kinh_phi'], 0, ',', '.') . ' VND'; ?></h3>
                                <h3>Thời Gian Thực
                                    Hiện: <?php echo $value['thoi_gian_thuc_hien']; ?></h3>
                                <h3>Ngày Kết
                                    Thúc: <?php echo date('d/m/Y', strtotime($value['ngay_ket_thuc'])); ?></h3>
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
<div id="paginate1">
    <?php
    if (empty($enter_tu_ngay_ket_thuc) && empty($enter_den_ngay_ket_thuc)
        && empty($enter_tu_ngay_thuc_hien) && empty($enter_den_ngay_thuc_hien)
        && empty($enter_phong_ban) && empty($enter_trang_thai) && empty($enter_search)) {
        include('Utils/paginate.php');
    }
    ?>
</div>
