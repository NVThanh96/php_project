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
                            <li class="breadcrumb-item active"><?php echo $node1['ten'] ?? '' ?></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="card">
                    <div class="card-header">
                        <a style="margin-left:-15px;margin-top: -2px;font-size: 24px; "
                           class="btn hover btn-flat float-left" href="list"><i
                                    class="fa-solid fa-arrow-left"></i></a>
                        <h1 class="card-title"><?php echo $node1['ten'] ?? "" ?></h1>

                    </div>

                    <form action="add" method="POST" enctype="multipart/form-data" onsubmit="return onSubmitForm()">

                        <div class="row col-12 text-center">
                            <div class="col-8 row left">
                                <div class="form-group col-6 inputSoHD">
                                    <div class="row">
                                        <div class="col-3"><label class="label" for="exampleInputPassword1">Số Hợp Đồng </label></div>
                                        <div class="col-9">
                                            <input name="so_hop_dong" id="so_hop_dong"
                                                   type="text" class="form-control"
                                                   placeholder="Nhập Số Hợp Đồng"
                                                   onblur="checkEmptySoHD(this, 'error-so-hop-dong')">
                                        </div>
                                        <span class="validation-message" id="error-so-hop-dong"></span>
                                    </div>
                                </div>

                                <div class="form-group row col-6 inputPhongThucHien">
                                    <div class="row" >
                                    <div class="col-5"><label class="label" for="exampleInputPassword1">Phòng Thực Hiện</label></div>
                                        <div class="col-7">
                                            <select name="id_phong_ban" id="id_phong_ban"
                                                    class="form-control"
                                                    onblur="checkEmptyPhongBan(this, 'error-id-phong-ban')">
                                                <option value="0">-- Chọn --</option>
                                                <?php if (isset($list_phong_ban) && !empty($list_phong_ban)): ?>
                                                    <?php foreach ($list_phong_ban as $phong_ban): ?>
                                                        <option value="<?php echo $phong_ban['id']; ?>"><?php echo $phong_ban['ten_phong']; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <span class="validation-message" id="error-id-phong-ban"></span>
                                    </div>
                                </div>

                                <div class="form-group row col-12" style="margin-top: 1%">
                                    <label style="margin-top: .7%;margin-left: 2%; margin-right: 2%"
                                           for="exampleInputPassword1">Tên Hợp Đồng</label>
                                    <input style="width: 85%" name="ten_hop_dong" id="ten_hop_dong"
                                           type="text"
                                           class="form-control"
                                           placeholder="Nhập Tên Hợp Đồng"
                                           onblur="checkEmptyTenHD(this, 'error-ten-hop-dong')">
                                    <span class="validation-message" id="error-ten-hop-dong"></span>
                                </div>

                                <div class="form-group row col-12" style="margin-top: 1%">
                                    <label style="margin-top: .7%;margin-left: 2.1%; margin-right: 3%"
                                           for="khach_hang">Khách Hàng</label>
                                    <input style="width: 85%" name="khach_hang" id="khach_hang" type="text"
                                           class="form-control" placeholder="Nhập Tên Khách Hàng"
                                           onblur="checkEmptyKhachHang(this, 'error-khach-hang')">
                                    <span class="validation-message" id="error-khach-hang"></span>
                                </div>
                            </div>

                            <div class="col-md-4 row right" style="margin-top: 1.5%">
                                <div class="form-group row col-5" style="margin-right: 1.5%">
                                    <div class="input-group form-group inputDate">
                                        <label style="padding-top: 4%;margin-right: 3%">Ngày ký</label>
                                        <input type="text" name="ngay_ky" id="ngay_ky" placeholder="dd/mm/yyyy"
                                               class="form-control" autocomplete="off"
                                               onblur="checkEmptyNgayKy(this, 'error-ngay-ky')">
                                    </div>
                                    <span class="validation-message ngayKy" id="error-ngay-ky"></span>
                                </div>

                                <div class="form-group row col-7">
                                    <div class="input-group form-group inputDate">
                                        <label style="margin-top: 2.5%;margin-right: 3%">Thời gian kết thúc</label>
                                        <input type="text" name="ngay_ket_thuc" placeholder="dd/mm/yyyy"
                                               id="ngay_ket_thuc" class="form-control" autocomplete="off"
                                               onchange="checkNgayKetThuc()"
                                               onblur="checkEmptyNgayKetThuc(this, 'error-ngay-ket-thuc')">
                                    </div>
                                    <span class="validation-message ngayKetThuc" id="error-ngay-ket-thuc"></span>
                                </div>


                                <div class="form-group row col-12">
                                    <div class="input-group inputDate">
                                        <label style="margin-right: 3%">Thời gian thực hiện (ngày): </label>
                                        <input type="text" name="thoi_gian_thuc_hien" id="thoi_gian_thuc_hien"
                                               class="form-control rmBoder" style="margin: -1%" autocomplete="off"
                                               placeholder="Nhập số ngày thực hiện"
                                               onblur="checkThoiGianThucHien(this,'error-thoi-gian-thuc-hien')">
                                    </div>
                                    <span class="validation-message" id="error-thoi-gian-thuc-hien"></span>
                                </div>


                                <div class="form-group row col-12">
                                    <div class="input-group">
                                        <label style="margin-top: 1.5%;margin-right: 3%" for="kinh_phi">Kinh
                                            Phí:</label>
                                        <input type='number' name="kinh_phi" id="kinh_phi"
                                               class="form-control rmBoder"
                                               placeholder="Nhập Kinh Phí" oninput="calculateRemainingValue(this)"
                                               onblur="checkEmptyKinhPhi(this, 'error-kinh-phi')">
                                    </div>
                                    <span class="validation-message kinhPhi" id="error-kinh-phi"></span>

                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <hr>
                            <div class="form-group ">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tập tin đính kèm</label>
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

                            <hr>
                            <div class="row">
                                <div class="col-md-8" style="float: left; background-color: rgb(23,162,184) ">
                                    <h3 style="color: white;padding: 1% 1% 0 1%">Thanh Toán
                                        <button style="color: white" id="add-payment-btn" type="button"
                                                class="btn">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </h3>
                                </div>

                                <div class="contentRight col-md-4">
                                    <div style="margin-left: 5%; height: 20px" class="content_TT form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Giá Trị Còn Lại</label>
                                            <button type="submit" class="btn btn-success"
                                                    style="float: right; padding: 5px 20px">Lưu
                                            </button>
                                        </div>
                                        <div>
                                            <div style="display: flex;">
                                                <p> Kinh Phí</p>
                                                <input style="background-color: transparent"
                                                       id="gia_tri_kinh_phi"
                                                       name="gia_tri_kinh_phi" class="form-control" readonly>
                                            </div>
                                            <div style="display: flex;">
                                                <p> Thanh Toán</p>
                                                <input style="background-color: transparent" id="thanh_toan"
                                                       name="Thanh_toan" class="form-control" readonly>
                                            </div>
                                            <div style="display: flex;">
                                                <p> còn lại</p>
                                                <input style="background-color: transparent"
                                                       id="gia_tri_con_lai"
                                                       name="gia_tri_con_lai" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div id="payment-section">
                                        <div class="payment-group">
                                            <hr style="margin-top: 1%">
                                            <h4>Thanh Toán lần 1</h4>

                                            <div style="display: flex">
                                                <div class="form-group col-4">
                                                    <label>Thời gian thanh toán</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="datepicker-trigger8"><i
                                                                    class="far fa-calendar-alt datepicker-trigger8"></i></span>
                                                        </div>
                                                        <input type="text" name="thoi_gian_thanh_toan[]"
                                                               id="thoi_gian_thanh_toan[]" class="form-control"
                                                               autocomplete="off" placeholder="dd/mm/yyyy">
                                                    </div>
                                                </div>

                                                <div class="form-group col-4">
                                                    <label>Nội Dung Thanh Toán</label>
                                                    <input type="text" name="noi_dung_thanh_toan[]"
                                                           id="noi_dung_thanh_toan[]" class="form-control"
                                                           placeholder="Nội Dung Thanh Toán">
                                                </div>

                                                <div class="form-group col-4">
                                                    <label>Giá Trị Thanh Toán</label>
                                                    <div class="input-group">
                                                        <input type="number" name="gia_tri_thanh_toan[]"
                                                               class="form-control"
                                                               placeholder="Nhập Giá Trị Thanh Toán"
                                                               oninput="calculateRemainingValue(this)">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">đ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group col-8 inputTT" style="margin-top: 30px ">
                                <label>Trạng Thái</label>
                                <select name="trang_thai" class="form-control"
                                        onblur="checkEmptyTrangThai(this, 'error-trang-thai')">
                                    >
                                    <option value="null">-- Chọn --</option>
                                    <option value="1">Đã Hoàn Thành</option>
                                    <option value="2">Đang Thực Hiện</option>
                                    <option value="3">Chưa Thực Hiện</option>
                                </select>
                                <span class="validation-message" id="error-trang-thai"></span>
                            </div>
                        </div>
                    </form>
                </div>

            </div><!-- /.container-fluid -->

        </div>
        <!-- /.content-header -->
    </div>

</div>
</body>

<script>
    function applyBorderAndPaddingToElements() {


        // Check if there are any files selected
        var filesSelected = fileIDs.length > 0 || $('#attachment').val().length > 0;

        // Apply the border and padding to the file input and container if there are files selected
        if (filesSelected) {
            $('#attachment').css({
                'border': 'dashed 1px rgba(213, 205, 205, 0.84)',
                'padding': '5px' // Add the desired padding value
            });
            $('#filesList').css({
                'border': 'dashed 1px rgba(213, 205, 205, 0.84)',
                'padding': '10px' // Add the desired padding value
            });
        } else {
            $('#attachment').css('border', 'none');
            $('#filesList').css('border', 'none');
        }
    }


    // Call the function on document ready to apply the border and padding on initial page load
    $(document).ready(function () {
        applyBorderAndPaddingToElements();
    });

</script>

<script>
    <?php include "Modules/quanLyHopDong/Public/js/thanhToan.js"?>
    <?php include "Modules/quanLyHopDong/Public/js/uploadFile.js"?>
    <?php include "Modules/quanLyHopDong/Public/js/validation.js"?>
    <?php include "Modules/quanLyHopDong/Public/js/datePicker.js"?>
</script>

<footer>
    <?php include "./Views/admin/layouts/footer.php" ?>
</footer>
</body>


