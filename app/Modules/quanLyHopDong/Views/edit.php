<?php
// cấu hình một số nội dung gọi chung ở file config.php
include "Public/config/config.php";
// add 1 số thư viện ở file header.php
include "Views/admin/layouts/header.php";
?>

<!--<script>
    $(document).ready(function () {
        function createPaymentGroup(number) {
            var paymentGroup = $('<div class="payment-group">' +
                '<hr style="margin-top: 35px">' +
                '<button style="font-size: 30px" class="close" type="button">\n' +
                '&times;\n' +
                '</button>' +
                '<h4>Thanh Toán lần ' + number + '</h4>' +
                '<div style="display: flex">' +
                '<div class="form-group col-4">' +
                '<label>Thời gian thanh toán</label>' +
                '<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>' +
                '</div>' +
                '<input type="text" name="thoi_gian_thanh_toan[]" id="thoi_gian_thanh_toan[]" class="form-control" autocomplete="off" placeholder="dd/mm/yyyy">' +
                '</div>' +
                '</div>' +
                '<div class="form-group col-4">' +
                '<label>Nội Dung Thanh Toán</label>' +
                '<input type="text" name="noi_dung_thanh_toan[]" id="noi_dung_thanh_toan[]" class="form-control" placeholder="Nội Dung Thanh Toán">' +
                '</div>' +
                '<div class="form-group col-4">' +
                '<label>Giá Trị Thanh Toán</label>' +
                '<div class="input-group">' +
                '<input type="number" name="gia_tri_thanh_toan[]" class="form-control" placeholder="Nhập Giá Trị Thanh Toán" oninput="calculateRemainingValue(this)">' +
                '<div class="input-group-prepend">' +
                '<span class="input-group-text">đ</span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>');
            return paymentGroup;
        }
        $('#payment-section').on('click', '.close', function () {
            var paymentGroupElement = $(this).closest('.payment-group');
            paymentGroupElement.slideUp(400, function () {
                paymentGroupElement.remove(); // Remove the payment group when the slideUp animation is complete
                calculateRemainingValue(); // Recalculate the remaining value
            });
        });

        $('#add-payment-btn').click(function () {
            var paymentGroups = $('.payment-group'); // Get all existing payment groups

            if (paymentGroups.length === 0) {
                // Create the first payment group if none exists
                var newPaymentGroup = createPaymentGroup(1);
                $('#payment-section').append(newPaymentGroup);
            } else {
                var lastPaymentGroup = paymentGroups.last();
                var lastPaymentGroupNumber = parseInt(lastPaymentGroup.find('h4').text().match(/\d+/)[0]);
                var newPaymentGroupNumber = lastPaymentGroupNumber + 1;
                var newPaymentGroup = createPaymentGroup(newPaymentGroupNumber);
                lastPaymentGroup.after(newPaymentGroup);
            }
        });
    });

    function calculateRemainingValue() {
        var kinhPhiValue = parseFloat($('#kinh_phi').val());
        var totalgiaTriThanhToanValue = 0;

        // Calculate the total value of giaTriThanhToanInputs
        $('input[name="gia_tri_thanh_toan[]"]').each(function () {
            var giaTriThanhToanValue = parseFloat($(this).val());

            // Check if the value is empty, if so, use the value from the database
            if (isNaN(giaTriThanhToanValue)) {
                giaTriThanhToanValue = parseFloat($(this).data('database-value'));
            }

            totalgiaTriThanhToanValue += isNaN(giaTriThanhToanValue) ? 0 : giaTriThanhToanValue;
        });

        var giaTriConLaiValue = kinhPhiValue - totalgiaTriThanhToanValue;
        var formattedGiaTriConLai = numberFormat.format(giaTriConLaiValue);

        $('#gia_tri_kinh_phi').val(numberFormat.format(kinhPhiValue));
        $('#thanh_toan').val(numberFormat.format(totalgiaTriThanhToanValue));
        $('#gia_tri_con_lai').val(formattedGiaTriConLai);
    }

    const numberFormat = new Intl.NumberFormat('vi-VN', {currency: 'VND'});

    var giaTriThanhToanInputs = document.querySelectorAll('input[name="gia_tri_thanh_toan[]"]');


</script>-->
<style>
    <?php include "Modules/quanLyHopDong/Public/css/style.css";?>
</style>


<body class="hold-transition sidebar-mini layout-fixed">
<div>

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

                    <?php foreach ($list_hop_dong as $values): ?>
                        <form action="update" method="POST" enctype="multipart/form-data">

                            <div class="row col-12 text-center">
                                <div class="col-8 row left">
                                    <div class="form-group row col-md-6">
                                        <label class="label" for="exampleInputPassword1">Số Hợp Đồng </label>
                                        <input style="width: 70%" name="so_hop_dong" id="so_hop_dong" type="text"
                                               class="form-control"
                                               placeholder="Nhập Số Hợp Đồng"
                                               value="<?php echo $values['so_hop_dong'] ?>"

                                        >
                                        <span class="validation-message" id="error-so-hop-dong"></span>
                                    </div>

                                    <div class="form-group row col-6">
                                        <label class="label">Phòng Thực Hiện</label>
                                        <select style="width: 71%" name="id_phong_ban" id="id_phong_ban"
                                                class="form-control">
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
                                        <span class="validation-message"
                                              id="error-id-phong-ban"></span>
                                    </div>

                                    <div class="form-group row col-12" style="margin-top: 1%">
                                        <label style="margin-top: .7%;margin-left: 1.1%; margin-right: .8%"
                                               for="exampleInputPassword1">Tên Hợp Đồng</label>
                                        <input style="width: 87%" name="ten_hop_dong" id="ten_hop_dong" type="text"
                                               class="form-control"
                                               placeholder="Nhập Tên Hợp Đồng"
                                               value="<?php echo $values['ten_hop_dong'] ?>"
                                        >
                                        <span class="validation-message" id="error-ten-hop-dong"></span>
                                    </div>

                                    <div class="form-group row col-12" style="margin-top: 1%">
                                        <label style="margin-top: .7%;margin-left: 1.3%; margin-right: 1.7%"
                                               for="khach_hang">Khách Hàng</label>
                                        <input style="width: 87%" name="khach_hang" id="khach_hang" type="text"
                                               class="form-control" placeholder="Nhập Tên Khách Hàng"
                                               value="<?php echo $values['khach_hang'] ?>"
                                        >
                                        <span class="validation-message" id="error-khach-hang"></span>
                                    </div>
                                </div>

                                <div class="col-md-4 row right" style="margin-top: 1.5%">
                                    <div class="form-group row col-5" style="margin-right: 1.5%">
                                        <div class="input-group form-group inputDate">
                                            <label style="padding-top: 4%;margin-right: 3%">Ngày ký</label>
                                            <input type="text" name="ngay_ky" id="ngay_ky"
                                                   class="form-control"
                                                   autocomplete="off"
                                                   value="<?php echo date('d/m/Y', strtotime($values['ngay_ky'])); ?>">
                                            <span type="button" class="input-group-text" style="height: 85%"
                                                  id="datepicker-trigger">
                                                <i class="far fa-calendar-alt"></i>
                                                </span>
                                        </div>
                                        <span class="validation-message" id="error-ngay-ky"></span>
                                    </div>

                                    <div class="form-group row col-7">
                                        <div class="input-group form-group inputDate">
                                            <label style="margin-top: 2.5%;margin-right: 3%">Thời gian kết thúc</label>
                                            <input type="text" name="ngay_ket_thuc" id="ngay_ket_thuc"
                                                   class="form-control" autocomplete="off"
                                                   value="<?php echo date('d/m/Y', strtotime($values['ngay_ket_thuc'])) ?>">
                                            <span type="button" style="height: 85%"
                                                  class="input-group-text datepicker-trigger2"
                                                  id="datepicker-trigger2">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <span class="validation-message" id="error-ngay-ket-thuc"></span>
                                    </div>

                                    <div class="form-group row col-12">
                                        <div class="input-group inputDate">
                                            <label style="margin-right: 3%">Thời gian thực hiện (ngày): </label>
                                            <input type="text" name="thoi_gian_thuc_hien" id="thoi_gian_thuc_hien"
                                                   class="form-control" style="border-top: none;border-right: none;
                                                                                border-left: none;margin: -9px;font-size:17px"
                                                   autocomplete="off" placeholder="Nhập số ngày thực hiện"
                                                   value="<?php echo $values['thoi_gian_thuc_hien'] ?>">
                                        </div>
                                        <span class="validation-message"
                                              id="error-thoi-gian-thuc-hien"></span>
                                    </div>


                                    <div class="form-group row col-12">
                                        <div class="input-group">
                                            <label style="margin-top: 1.5%;margin-right: 3%" for="kinh_phi">Kinh
                                                Phí:</label>
                                            <input type='number' name="kinh_phi" id="kinh_phi" class="form-control"
                                                   style="border-top: none;border-right: none;
                                                                                border-left: none; font-size:17px"
                                                   placeholder="Nhập Kinh Phí" oninput="calculateRemainingValue(this)"
                                                   value="<?php echo $values['kinh_phi'] ?>"/>
                                        </div>
                                        <span class="validation-message"
                                              id="error-kinh-phi"></span>
                                    </div>

                                </div>
                            </div>

                            <div class="card-body" style="padding-top: 0">
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
                                        <h3 style="color: white;padding: 2% 1% 0 1%">Thanh Toán
                                            <button style="color: white" id="add-payment-btn" type="button" class="btn">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </h3>
                                    </div>

                                    <div class="contentRight col-md-4">
                                        <div class="form-group content_TT">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá trị còn lại</label>
                                                <button type="submit" class="btn btn-success"
                                                        style="float: right; padding: 5px 20px">Lưu
                                                </button>
                                            </div>
                                            <div>
                                                <div style="display: flex;">
                                                    <p> Kinh phí</p>
                                                    <input style="background-color: transparent"
                                                           id="gia_tri_kinh_phi"
                                                           name="gia_tri_kinh_phi" class="form-control" readonly>
                                                </div>
                                                <div style="display: flex;">
                                                    <p> Thanh toán</p>
                                                    <input style="background-color: transparent" id="thanh_toan"
                                                           name="Thanh_toan" class="form-control" readonly>
                                                </div>
                                                <div style="display: flex;">
                                                    <p> Còn lại</p>
                                                    <input style="background-color: transparent"
                                                           id="gia_tri_con_lai"
                                                           name="gia_tri_con_lai" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div id="payment-section">
                                            <?php for ($i = 0; $i < count($totalThanhToan); $i++): ?>
                                                <?php $record = $totalThanhToan[$i]; ?>

                                                <div class="payment-group">
                                                    <button style="font-size: 30px" class="close" type="button">
                                                        &times;
                                                    </button>

                                                    <hr>
                                                    <h4>Thanh toán lần <?php echo $i + 1; ?></h4>

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
                                                            <label>Nội dung thanh toán</label>
                                                            <input type="text" name="noi_dung_thanh_toan[]"
                                                                   id="noi_dung_thanh_toan[]" class="form-control"
                                                                   placeholder="Nội Dung Thanh Toán"
                                                                   value="<?php echo $record['noi_dung_thanh_toan']; ?>">
                                                        </div>

                                                        <div class="form-group col-4">
                                                            <label>Giá trị thanh toán</label>
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
                                            <?php endfor; ?>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group col-8" style="margin-top: 30px ">
                                    <label>Trạng thái</label>
                                    <select name="trang_thai" class="form-control">
                                        <option value="1" <?php echo ($values['trang_thai'] == '1') ? 'selected' : ''; ?>>
                                            Đã hoàn thành
                                        </option>
                                        <option value="2" <?php echo ($values['trang_thai'] == '2') ? 'selected' : ''; ?>>
                                            Đang thực hiện
                                        </option>
                                        <option value="3" <?php echo ($values['trang_thai'] == '3') ? 'selected' : ''; ?>>
                                            Chưa thực hiện
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
    <?php include "Modules/quanLyHopDong/Public/js/uploadFile.js"?>
    <?php include "Modules/quanLyHopDong/Public/js/editThanhToan.js"?>
    <?php include "Modules/quanLyHopDong/Public/js/showAndDeleteFile.js"?>
    <?php include "Modules/quanLyHopDong/Public/js/datePicker.js"?>
    <?php include "Modules/quanLyHopDong/Public/js/validation.js"?>
</script>


<script>
    // ... (Your existing JavaScript code)

    // Function to apply border and padding to elements when there are values
    function applyBorderAndPaddingToElements() {
        // Retrieve the file IDs to be deleted from the input value
        var filesToDelete = $('#sexoafile').val();

        // Split the input value into an array of file IDs
        var fileIDs = filesToDelete.split(',');

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

    // Event listener for the form submission
    $('form').submit(function (event) {
        event.preventDefault();

        // Retrieve the file IDs to be deleted from the input value
        var filesToDelete = $('#sexoafile').val();

        // Split the input value into an array of file IDs
        var fileIDs = filesToDelete.split(',');

        // Call the function to apply border and padding based on whether there are values to be deleted or not
        applyBorderAndPaddingToElements();

        // Call the function to update the database with the file IDs
        updateDeletedFiles(fileIDs);

        // Submit the form
        this.submit();
    });

    // Event listener for changes to the input field
    $('#sexoafile').on('change', function () {
        // Call the function to apply border and padding based on whether there are values to be deleted or not
        applyBorderAndPaddingToElements();
    });

    // Event listener for changes to the file input
    $('#attachment').on('change', function () {
        // Call the function to apply border and padding based on whether there are files selected or not
        applyBorderAndPaddingToElements();
    });

    // Call the function on document ready to apply the border and padding on initial page load
    $(document).ready(function () {
        applyBorderAndPaddingToElements();
    });
</script>

<script>
    function updateDeletedFiles(files) {
        $.ajax({
            url: 'deleteFile.php', // Replace with the actual path to your PHP script
            method: 'POST',
            data: {files: files},
            success: function (response) {
                console.log(response); // Optional: handle the response from the server
                // Show success message using SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Form successfully saved!',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            error: function (xhr, status, error) {
                console.log(error); // Optional: handle any errors
            }
        });
    }
</script>

<footer>
    <?php include "./Views/admin/layouts/footer.php" ?>
</footer>


