$(document).ready(function () {
    var paymentGroup = $('.payment-group'); // Clone the payment group element initially
    var paymentCount = 2; // Initialize the payment count

    $('#add-payment-btn').click(function () {
        var clonedPaymentGroup = paymentGroup.clone(); // Create cloned form group

        // Add close button to each cloned form group
        var closeButton = $('<button style="font-size: 30px" class="close" type="button">&times;</button>');

        clonedPaymentGroup.prepend(closeButton);
        clonedPaymentGroup.find('h4').text('Thanh Toán lần ' + paymentCount);

        // Event listener for closing the selected cloned form group
        closeButton.click(function () {
            clonedPaymentGroup.slideUp(400, function () {
                clonedPaymentGroup.remove(); // Remove the cloned element after it's hidden
                calculateRemainingValue(); // Recalculate the remaining value
                paymentCount--;
            });
        });

        $('#payment-section').append(clonedPaymentGroup);
        clonedPaymentGroup.slideDown(400); // Use slideDown animation to show the cloned element
        paymentCount++; // Increment the payment count
    });
});

const numberFormat = new Intl.NumberFormat('vi-VN', {  currency: 'VND' });

function calculateRemainingValue() {
        var kinhPhiValue = parseFloat($('#kinh_phi').val());
    var totalgiaTriThanhToanValue = 0;

    // Calculate the total value of giaTriThanhToanInputs
    $('input[name="gia_tri_thanh_toan[]"]').each(function() {
        var giaTriThanhToanValue = parseFloat($(this).val());

        totalgiaTriThanhToanValue += isNaN(giaTriThanhToanValue) ? 0 : giaTriThanhToanValue;
    });

    var giaTriConLaiValue = kinhPhiValue - totalgiaTriThanhToanValue;
    var formattedGiaTriConLai = numberFormat.format(giaTriConLaiValue);


    $('#gia_tri_kinh_phi').val(numberFormat.format(kinhPhiValue));
    $('#thanh_toan').val(numberFormat.format(totalgiaTriThanhToanValue));
    $('#gia_tri_con_lai').val(formattedGiaTriConLai);
}