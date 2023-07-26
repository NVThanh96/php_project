document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#ngay_ky", {
        dateFormat: "d/m/Y",
        allowInput: true,
        parseDate: function (datestr, format) {
            const parts = datestr.split("/");
            return new Date(parts[2], parts[1] - 1, parts[0]);
        },
    });

    flatpickr("#ngay_ket_thuc", {
        dateFormat: "d/m/Y",
        allowInput: true,
        parseDate: function (datestr, format) {
            const parts = datestr.split("/");
            return new Date(parts[2], parts[1] - 1, parts[0]);
        },
    });
    flatpickr("#thoi_gian_thanh_toan\\[\\]", {
        dateFormat: "d/m/Y",
        allowInput: true,
        parseDate: function (datestr, format) {
            const parts = datestr.split("/");
            return new Date(parts[2], parts[1] - 1, parts[0]);
        },
    });

    flatpickr("#tu_ngay_thuc_hien", {
        dateFormat: "d/m/Y",
        allowInput: true,
        parseDate: function (datestr, format) {
            const parts = datestr.split("/");
            return new Date(parts[2], parts[1] - 1, parts[0]);
        },
    });
    flatpickr("#den_ngay_thuc_hien", {
        dateFormat: "d/m/Y",
        allowInput: true,
        parseDate: function (datestr, format) {
            const parts = datestr.split("/");
            return new Date(parts[2], parts[1] - 1, parts[0]);
        },
    });

    flatpickr("#tu_ngay_ket_thuc", {
        dateFormat: "d/m/Y",
        allowInput: true,
        parseDate: function (datestr, format) {
            const parts = datestr.split("/");
            return new Date(parts[2], parts[1] - 1, parts[0]);
        },
    });
});

// Datepicker for "#thoi_gian_thanh_toan[]

$(document).ready(function () {
    // Function to calculate the ngay_ket_thuc and thoi_gian_thuc_hien
    function calculateNgayKetThuc() {
        var ngayKy = $("#ngay_ky").val();
        var thoiGianThucHien = parseInt($("#thoi_gian_thuc_hien").val());
        var ngayKetThuc = $("#ngay_ket_thuc").val();

        if (ngayKy && ngayKetThuc) {
            var datePartsNgayKy = ngayKy.split("/");
            var datePartsNgayKetThuc = ngayKetThuc.split("/");
            var ngayKyDate = new Date(datePartsNgayKy[2], datePartsNgayKy[1] - 1, datePartsNgayKy[0]);
            var ngayKetThucDate = new Date(datePartsNgayKetThuc[2], datePartsNgayKetThuc[1] - 1, datePartsNgayKetThuc[0]);

            var thoiGianThucHien = Math.floor((ngayKetThucDate - ngayKyDate) / (1000 * 60 * 60 * 24));
            $("#thoi_gian_thuc_hien").val(thoiGianThucHien);
        } else if (ngayKy && !isNaN(thoiGianThucHien)) {
            var dateParts = ngayKy.split("/");
            var ngayKyDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);
            ngayKyDate.setDate(ngayKyDate.getDate() + thoiGianThucHien);
            var formattedNgayKetThuc = ngayKyDate.toLocaleDateString("en-GB"); // Format the date as dd/mm/yyyy

            $("#ngay_ket_thuc").val(formattedNgayKetThuc);
        }
    }

    // Call the calculateNgayKetThuc function when either ngay_ky, ngay_ket_thuc, or thoi_gian_thuc_hien input changes
    $("#ngay_ky, #thoi_gian_thuc_hien, #ngay_ket_thuc").on("input", calculateNgayKetThuc);
});
