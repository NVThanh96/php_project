// Function to apply border and padding to elements when there are values
import {isNull} from "../../../../Public/plugins/pdfmake/pdfmake";

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
    if (!isNull(filesToDelete)){

        var fileIDs = filesToDelete.split(',');
    }

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