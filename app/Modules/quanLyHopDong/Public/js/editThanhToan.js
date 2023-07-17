const fileThanhToanJson = <?php echo $fileThanhToanJson;?>;

$(document).ready(function () {
    var paymentGroup = $('.payment-group').first(); // Get the first payment group element
    var paymentCountNext = $('.payment-group').length + 1; // Initialize the payment count based on existing elements

    $('#payment-section').on('click', '.close', function () {
        var paymentGroupElement = $(this).closest('.payment-group');
        paymentGroupElement.slideUp(400, function () {
            paymentGroupElement.remove(); // Remove the payment group when the slideUp animation is complete
            calculateRemainingValue(); // Recalculate the remaining value
        });
    });

    $('#add-payment-btn').click(function () {
        var paymentGroups = $('.payment-group'); // Get all existing payment groups
        console.log(paymentGroups)

        if (paymentGroups.length === 0) {
            // Create the first payment group if none exists
            var newPaymentGroup = createPaymentGroup(1);
            $('#payment-section').append(newPaymentGroup);
        } else {
            if (Array.isArray(fileThanhToanJson)) {
                let foundDeleted = false;

                for (let i = 0; i < fileThanhToanJson.length; i++) {
                    const $checkDaXoa = fileThanhToanJson[i]['daxoa'];

                    if ($checkDaXoa === 0) {
                        foundDeleted = true;
                        break;
                    }
                }

                if (foundDeleted) {
                    var lastPaymentGroup = paymentGroups.last();
                    var lastPaymentGroupNumber = extractPaymentGroupNumber(lastPaymentGroup);
                    var newPaymentGroupNumber = lastPaymentGroupNumber + 1;
                    var newPaymentGroup = createPaymentGroup(newPaymentGroupNumber);
                    lastPaymentGroup.after(newPaymentGroup);
                }
            } else {
                console.log('fileThanhToanJson is not an array.');
            }
        }

        paymentCountNext++; // Increment the payment count
    });

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

    function extractPaymentGroupNumber(paymentGroup) {
        var text = paymentGroup.find('h4').text();
        var number = parseInt(text.match(/\d+/)[0]);
        return number;
    }
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

// Get the input element by its name
var kinhPhiInput = document.querySelector('input[name="kinh_phi"]');
var kinhPhiValue = kinhPhiInput['value']

// kiểm tra nên input có giá trị
if (kinhPhiInput.value.trim() !== '') {
    $('#gia_tri_kinh_phi').val(numberFormat.format(kinhPhiInput['value']));
} else {
    console.log('The input field is empty.');
}

var giaTriThanhToanInputs = document.querySelectorAll('input[name="gia_tri_thanh_toan[]"]');
var totalgiaTriThanhToanValue = 0;
giaTriThanhToanInputs.forEach(function (input) {
    var giaTriThanhToanValue = parseFloat(input.value);
    // kiểm tra nó có phải là số không
    if (!isNaN(giaTriThanhToanValue)) {
        totalgiaTriThanhToanValue += giaTriThanhToanValue;
    }
});


// Iterate over each input field
giaTriThanhToanInputs.forEach(function (input) {
    // Check if the input field has a value
    if (input.value.trim() !== '') {
        $('#thanh_toan').val(numberFormat.format(totalgiaTriThanhToanValue));
    } else {
        console.log('The input field is empty.');
    }
});

var giaTriConLaiValue = kinhPhiValue - totalgiaTriThanhToanValue;
var formattedGiaTriConLai = numberFormat.format(giaTriConLaiValue);
$('#gia_tri_con_lai').val(formattedGiaTriConLai);
