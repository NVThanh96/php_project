$(document).ready(function() {
    $("#datepicker-trigger").on("click", function() {
        $("#ngay_ky").datepicker("show");
    });

    $("#ngay_ky").datepicker({
        dateFormat: "dd/mm/yy"
    });
});

/*
$(document).ready(function() {
    $("#datepicker-trigger1").on("click", function() {
        $("#thoi_gian_thuc_hien").datepicker("show");
    });

    $("#thoi_gian_thuc_hien").datepicker({
        dateFormat: "dd/mm/yy"
    });
});
*/

$(document).ready(function() {
    $("#datepicker-trigger2").on("click", function() {
        $("#ngay_ket_thuc").datepicker("show");
    });

    $("#ngay_ket_thuc").datepicker({
        dateFormat: "dd/mm/yy"
    });
});


/*at list.php*/
$(document).ready(function () {
    $("#thoi_gian_thanh_toan\\[\\]").datepicker({
        dateFormat: "dd/mm/yy"
    });
});
