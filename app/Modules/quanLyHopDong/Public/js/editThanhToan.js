$(document).ready(function () {
    var paymentGroup = $('.payment-group').first(); // Get the first payment group element
    var paymentCountNext = $('.payment-group').length + 1; // Initialize the payment count based on existing elements


    // Add click event listener to the close buttons
    var closeButtons = document.querySelectorAll(".payment-group .close");
    closeButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var paymentGroup = this.parentNode;
            $(paymentGroup).slideUp(400, function () {
                paymentGroup.remove(); // Remove the payment group when the slideUp animation is complete
                calculateRemainingValue(); // Recalculate the remaining value
            });
        });
    });



    $('#add-payment-btn').click(function () {

        var clonedPaymentGroup = paymentGroup.clone(); // Create cloned form group

        // Remove existing close buttons from the cloned group, if any
        clonedPaymentGroup.find('.close').remove();

        // Add close button to the cloned form group
        var closeButton = $('<button style="font-size: 30px" class="close" type="button">&times;</button>');

        clonedPaymentGroup.prepend(closeButton);
        clonedPaymentGroup.find('h4').text('Thanh Toán lần ' + paymentCountNext);

        // Event listener for closing the selected cloned form group
        closeButton.click(function () {
            var paymentGroup = $(this).closest('.payment-group');
            paymentGroup.slideUp(400, function () {
                paymentGroup.remove(); // Remove the cloned element after it's hidden
                calculateRemainingValue(); // Recalculate the remaining value
                paymentCountNext--;
            });
        });

        $('#payment-section').append(clonedPaymentGroup);
        clonedPaymentGroup.hide().slideDown(400); // Use slideDown animation to show the cloned element
        paymentCountNext++; // Increment the payment count
    });

});



const numberFormat = new Intl.NumberFormat('vi-VN', {  currency: 'VND' });



function calculateRemainingValue() {
    var kinhPhiValue = parseFloat($('#kinh_phi').val());
    var totalgiaTriThanhToanValue = 0;

    // Calculate the total value of giaTriThanhToanInputs
    $('input[name="gia_tri_thanh_toan[]"]').each(function() {
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


// Get the input element by its name
var kinhPhiInput = document.querySelector('input[name="kinh_phi"]');
var kinhPhiValue = kinhPhiInput['value']
// Check if the input field has a value
if (kinhPhiInput.value.trim() !== '' ) {

    $('#gia_tri_kinh_phi').val(numberFormat.format(kinhPhiInput['value']));
} else {
    console.log('The input field is empty.');
}

var giaTriThanhToanInputs = document.querySelectorAll('input[name="gia_tri_thanh_toan[]"]');
var totalgiaTriThanhToanValue = 0;
giaTriThanhToanInputs.forEach(function(input) {
    var giaTriThanhToanValue = parseFloat(input.value);

    // Check if the value is a valid number
    if (!isNaN(giaTriThanhToanValue)) {
        totalgiaTriThanhToanValue += giaTriThanhToanValue;
    }
});


// Iterate over each input field
giaTriThanhToanInputs.forEach(function(input) {
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
