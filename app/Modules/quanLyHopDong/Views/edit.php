<?php
// cấu hình một số nội dung gọi chung ở file config.php
include "Public/config/config.php";
// add 1 số thư viện ở file header.php
include "Views/admin/layouts/header.php";
?>

<style>
    <?php include "Modules/quanLyHopDong/Public/css/style.css";?>
</style>


<body class="hold-transition sidebar-mini layout-fixed">
<div>

    <div class="content-wrapper" style="margin-bottom: 30px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $node['ten'] ?? '' ?></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="card">
                    <div class="card-header">
                        <a style="margin-left:-15px;margin-top: -2px;font-size: 24px; "
                           class="btn hover btn-flat float-left" href="list"><i
                                    class="fa-solid fa-arrow-left"></i></a>
                        <h1 class="card-title"><?php echo $node['ten'] ?? "" ?></h1>
                    </div>

                    <?php foreach ($list_hop_dong as $values): ?>
                        <form action="update" method="POST" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-success" style="float: right; padding: 5px 20px">Lưu
                            </button>
                            <div class="card-body" style="    margin-top: 17px;">
                                <div style="display: flex">

                                    <div class="form-group col-6">
                                        <label for="exampleInputPassword1">Tên Hợp Đồng</label>
                                        <input name="ten_hop_dong" id="ten_hop_dong" type="text" class="form-control"
                                               placeholder="Nhập Tên Hợp Đồng"
                                               value="<?php echo $values['so_hop_dong'] ?>">
                                    </div>

                                    <div style="margin-left: -5px; margin-right: 10px" class="form-group col-6">
                                        <label for="exampleInputPassword1">Số Hợp Đồng</label>
                                        <input name="so_hop_dong" id="so_hop_dong" type="text" class="form-control"
                                               placeholder="Nhập Số Hợp Đồng"
                                               value="<?php echo $values['so_hop_dong'] ?>">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label>Phòng Thực Hiện</label>
                                    <select name="id_phong_ban" class="form-control">
                                        <option value="0">-- Chọn --</option>
                                        <?php if (isset($list_phong_ban) && !empty($list_phong_ban)): ?>
                                            <?php foreach ($list_phong_ban as $phong_ban): ?>
                                                <?php $selected = ($values['id_phong_ban'] == $phong_ban['id']) ? 'selected' : ''; ?>
                                                <option value="<?php echo $phong_ban['id']; ?>" <?php echo $selected; ?>>
                                                    <?php echo $phong_ban['ten_phong']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Khách Hàng</label>
                                    <input name="khach_hang" id="khach_hang" type="text" class="form-control"
                                           placeholder="Nhập Tên Khách Hàng"
                                           value="<?php echo $values['khach_hang'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kinh Phí</label>
                                    <div class="input-group">
                                        <input type='number' name="kinh_phi" id="kinh_phi" class="form-control"
                                               placeholder="Nhập Kinh Phí" oninput="calculateRemainingValue(this)"
                                               value="<?php echo $values['kinh_phi'] ?>"/>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">đ</span>
                                        </div>
                                    </div>
                                </div>


                                <hr>
                                <div class="datepicker" style="display: flex;">

                                    <div class="form-group col-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">File Đính Kèm</label>
                                            <label for="attachment">
                                                <a class="btn " role="button" aria-disabled="false">
                                                    <i class="fa-solid fa-file-arrow-up" style="font-size: 20px"></i>
                                                </a>
                                            </label>
                                            <input type="file" name="file[]" accept=".pdf,.docx,.xlsx" id="attachment"
                                                   style="visibility: hidden; position: absolute;" multiple/>
                                            <p id="files-area">
                                <span id="filesList">
                                    <span id="files-names"></span>
                                </span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group col-3">
                                        <label>Ngày ký</label>
                                        <div class="contentDate">
                                            <div class="input-group-prepend inputDate">
                                                <input type="text" name="ngay_ky" id="ngay_ky" class="form-control"
                                                       autocomplete="off" placeholder="dd/mm/yyyy"
                                                       value="<?php echo date('d/m/Y', strtotime($values['ngay_ky'])); ?>">
                                                <span type="button" style="left: -20px" class="input-group-text"
                                                      id="datepicker-trigger"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-3">
                                        <label>Thời gian thực hiện</label>
                                        <div class="contentDate">
                                            <div class="input-group-prepend inputDate">
                                                <input type="number" name="thoi_gian_thuc_hien" id="thoi_gian_thuc_hien"
                                                       class="form-control" autocomplete="off"
                                                       placeholder="Nhập số giờ thực hiện"
                                                       value="<?php echo $values['thoi_gian_thuc_hien'] ?>">
                                                <span type="button" style="left: -20px"
                                                      class="input-group-text datepicker-trigger2"
                                                      id="datepicker-trigger2">Giờ</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-3">
                                        <label>Ngày kết thúc</label>
                                        <div class="contentDate">
                                            <div class="input-group-prepend inputDate">
                                                <input type="text" name="ngay_ket_thuc" id="ngay_ket_thuc"
                                                       class="form-control" autocomplete="off" placeholder="dd/mm/yyyy"
                                                       value="<?php echo date('d/m/Y', strtotime($values['ngay_ket_thuc'])) ?>">
                                                <span type="button" style="left: -20px"
                                                      class="input-group-text datepicker-trigger2"
                                                      id="datepicker-trigger2"><i
                                                            class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 style="float: left">Thanh Toán
                                            <button id="add-payment-btn" type="button" class="btn">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </h2>
                                            <div id="payment-section">
                                            <?php for ($i = 0; $i < count($totalThanhToan); $i++): ?>
                                                <?php $record = $totalThanhToan[$i]; ?>
                                                <?php if ($record['daxoa'] !== 1): ?>

                                                    <div class="payment-group">
                                                        <button style="font-size: 30px" class="close" type="button">
                                                            &times;
                                                        </button>

                                                        <hr style="margin-top: 35px">
                                                        <h4>Thanh Toán lần <?php echo $i + 1; ?></h4>

                                                        <div style="display: flex">
                                                            <div class="form-group col-4">
                                                                <label>Thời gian thanh toán</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                    class="far fa-calendar-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" name="thoi_gian_thanh_toan[]"
                                                                           id="thoi_gian_thanh_toan[]"
                                                                           class="form-control"
                                                                           autocomplete="off" placeholder="dd/mm/yyyy"
                                                                           value="<?php echo date('d/m/Y', strtotime($record['thoi_gian'])) ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-4">
                                                                <label>Nội Dung Thanh Toán</label>
                                                                <input type="text" name="noi_dung_thanh_toan[]"
                                                                       id="noi_dung_thanh_toan[]" class="form-control"
                                                                       placeholder="Nội Dung Thanh Toán"
                                                                       value="<?php echo $record['noi_dung_thanh_toan']; ?>">
                                                            </div>

                                                            <div class="form-group col-4">
                                                                <label>Giá Trị Thanh Toán</label>
                                                                <div class="input-group">
                                                                    <input type="number" name="gia_tri_thanh_toan[]"
                                                                           class="form-control"
                                                                           placeholder="Nhập Giá Trị Thanh Toán"
                                                                           oninput="calculateRemainingValue(this)"
                                                                           value="<?php echo $record['gia_tri_thanh_toan']; ?>"
                                                                           data-database-value="<?php echo $record['gia_tri_thanh_toan']; ?>">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">đ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                    </div>

                                    <div class="contentRight col-md-4">
                                        <div  class="form-group content_TT">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá Trị Còn Lại</label>
                                            </div>
                                            <div>
                                                <div style="display: flex;">
                                                    <p> Kinh Phí</p>
                                                    <input style="background-color: transparent" id="gia_tri_kinh_phi"
                                                           name="gia_tri_kinh_phi" class="form-control" readonly>
                                                </div>
                                                <div style="display: flex;">
                                                    <p> Thanh Toán</p>
                                                    <input style="background-color: transparent" id="thanh_toan"
                                                           name="Thanh_toan" class="form-control" readonly>
                                                </div>
                                                <div style="display: flex;">
                                                    <p> còn lại</p>
                                                    <input style="background-color: transparent" id="gia_tri_con_lai"
                                                           name="gia_tri_con_lai" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-8">
                                    <label>Select</label>
                                    <select name="trang_thai" class="form-control">
                                        <option value="1" <?php echo ($values['trang_thai'] == '1') ? 'selected' : ''; ?>>
                                            Đã Hoàn Thành
                                        </option>
                                        <option value="2" <?php echo ($values['trang_thai'] == '2') ? 'selected' : ''; ?>>
                                            Đang Thực Hiện
                                        </option>
                                        <option value="3" <?php echo ($values['trang_thai'] == '3') ? 'selected' : ''; ?>>
                                            Chưa Thực Hiện
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <input id="sexoafile" hidden name="seXoaFile">

                        </form>
                    <?php endforeach; ?>

                </div>

            </div><!-- /.container-fluid -->

        </div>
        <!-- /.content-header -->
    </div>

</div>
</body>

<script>
    <?php include "Modules/quanLyHopDong/Public/js/editThanhToan.js"?>
    <?php include "Modules/quanLyHopDong/Public/js/uploadFile.js"?>
    <?php include "Modules/quanLyHopDong/Public/js/showAndDeleteFile.js"?>
    <?php include "Modules/quanLyHopDong/Public/js/datePicker.js"?>

</script>


<footer>
    <?php include "./Views/admin/layouts/footer.php" ?>
</footer>


